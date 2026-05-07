<?php

namespace App\SEO\Audit;

use Illuminate\Support\Facades\Storage;

class SeoAuditReportRepository
{
    public function bestReportFilename(int $maxToInspect = 30): ?string
    {
        $reports = $this->listReports();
        if ($reports === []) {
            return null;
        }

        $best = null;
        $bestCount = -1;

        foreach (array_slice($reports, 0, max(1, $maxToInspect)) as $item) {
            $filename = $item['filename'] ?? null;
            if (!is_string($filename) || $filename === '') {
                continue;
            }

            $report = $this->loadReport($filename);
            if (!is_array($report)) {
                continue;
            }

            $count = (int) ($report['page_count'] ?? 0);
            if ($count === 0) {
                $pages = $report['pages'] ?? [];
                $count = is_array($pages) ? count($pages) : 0;
            }

            if ($count > $bestCount) {
                $bestCount = $count;
                $best = $filename;
            }
        }

        return $best ?? ($reports[0]['filename'] ?? null);
    }

    public function listReports(): array
    {
        $disk = Storage::disk('local');
        $files = $disk->files('seo-audits');

        if ($files === []) {
            return [];
        }

        $items = collect($files)
            ->map(function (string $path) use ($disk) {
                return [
                    'filename' => basename($path),
                    'path' => $path,
                    'last_modified' => $disk->lastModified($path),
                ];
            })
            ->sortByDesc('last_modified')
            ->values()
            ->all();

        return $items;
    }

    public function latestReportFilename(): ?string
    {
        $reports = $this->listReports();
        if ($reports === []) {
            return null;
        }

        return $reports[0]['filename'] ?? null;
    }

    public function loadReport(string $filename): ?array
    {
        $filename = basename($filename);
        $path = 'seo-audits/'.$filename;

        $disk = Storage::disk('local');
        if (!$disk->exists($path)) {
            return null;
        }

        $decoded = json_decode($disk->get($path), true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($decoded)) {
            return null;
        }

        return $decoded;
    }

    public function downloadPath(string $filename): ?array
    {
        $filename = basename($filename);
        $path = 'seo-audits/'.$filename;

        $disk = Storage::disk('local');
        if (!$disk->exists($path)) {
            return null;
        }

        return [
            'filename' => $filename,
            'path' => $path,
            'absolute_path' => $disk->path($path),
        ];
    }
}
