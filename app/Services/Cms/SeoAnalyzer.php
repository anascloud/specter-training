<?php

namespace App\Services\Cms;

use App\Models\Cms\Page;
use Illuminate\Support\Str;

class SeoAnalyzer
{
    public function analyze(Page $page, string $combinedHtml): array
    {
        $metaTitle = trim((string) $page->meta_title);
        $metaDescription = trim((string) $page->meta_description);
        $text = $this->toText($combinedHtml);

        $checks = [];
        $score = 0;

        $metaTitleLen = mb_strlen($metaTitle);
        $checks['meta_title_length'] = [
            'value' => $metaTitleLen,
            'ok' => $metaTitleLen >= 30 && $metaTitleLen <= 60,
        ];
        $score += $checks['meta_title_length']['ok'] ? 15 : 0;

        $metaDescLen = mb_strlen($metaDescription);
        $checks['meta_description_length'] = [
            'value' => $metaDescLen,
            'ok' => $metaDescLen >= 50 && $metaDescLen <= 160,
        ];
        $score += $checks['meta_description_length']['ok'] ? 15 : 0;

        $hasH1 = (bool) preg_match('/<h1\b[^>]*>/i', $combinedHtml);
        $checks['has_h1'] = [
            'ok' => $hasH1,
        ];
        $score += $hasH1 ? 30 : 0;

        $contentLen = mb_strlen($text);
        $checks['content_length'] = [
            'value' => $contentLen,
            'ok' => $contentLen >= 300,
        ];
        $score += $checks['content_length']['ok'] ? 20 : 0;

        $keyword = $this->pickKeyword($page);
        $occurrences = $keyword === '' ? 0 : substr_count(mb_strtolower($text), mb_strtolower($keyword));
        $checks['keyword_usage'] = [
            'keyword' => $keyword,
            'occurrences' => $occurrences,
            'ok' => $keyword !== '' && $occurrences >= 2,
        ];
        $score += $checks['keyword_usage']['ok'] ? 20 : 0;

        return [
            'score' => min(100, $score),
            'checks' => $checks,
        ];
    }

    private function pickKeyword(Page $page): string
    {
        $metaTitle = trim((string) $page->meta_title);

        if ($metaTitle !== '') {
            $tokens = preg_split('/\s+/', Str::lower($metaTitle)) ?: [];
            foreach ($tokens as $token) {
                $token = trim($token, " \t\n\r\0\x0B,.;:!?()[]{}'\"");
                if (mb_strlen($token) >= 4) {
                    return $token;
                }
            }
        }

        $slug = trim((string) $page->slug);
        $slug = str_replace(['-', '_'], ' ', $slug);
        $token = trim((string) Str::of($slug)->lower()->explode(' ')->first());

        return mb_strlen($token) >= 4 ? $token : '';
    }

    private function toText(string $html): string
    {
        $text = strip_tags($html);
        $text = preg_replace('/\s+/', ' ', $text) ?? '';

        return trim($text);
    }
}

