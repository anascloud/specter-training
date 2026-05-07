@extends('backend.layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Admin Dashboard</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">SEO Audit summary and page-level scores</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            @if (!empty($seoAuditReportFile))
                <a href="{{ route('admin.seo-audits.download-csv', ['filename' => $seoAuditReportFile]) }}"
                    class="inline-flex items-center gap-2 rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-800 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-200">
                    Download CSV (Excel)
                </a>
            @endif
        </div>
    </div>

    @if (empty($seoAuditReport))
        <div class="rounded-xl border border-gray-200 bg-white p-5 text-sm text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-200">
            <div class="font-medium">No SEO audit report found.</div>
            <div class="mt-2 text-gray-600 dark:text-gray-400">
                Run: <span class="font-mono">php artisan seo:audit</span>
                <span class="mx-2">|</span>
                Reports are saved in <span class="font-mono">storage/app/private/seo-audits</span>
            </div>
        </div>
    @else
        @php
            $summary = $seoAuditReport['summary'] ?? [];
            $avg = $summary['average_scores'] ?? [];
            $sev = $summary['severity_breakdown'] ?? [];
            $pages = $seoAuditReport['pages'] ?? [];
            $pages = is_array($pages) ? $pages : [];
            $duplicates = $seoAuditReport['duplicates'] ?? [];
            $dupTitles = $duplicates['titles'] ?? [];
            $dupDescriptions = $duplicates['meta_descriptions'] ?? [];
        @endphp

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-5">
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="text-sm text-gray-500 dark:text-gray-400">Avg SEO</div>
                <div class="mt-2 text-2xl font-semibold text-gray-900 dark:text-white">{{ $avg['seo'] ?? '-' }}</div>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="text-sm text-gray-500 dark:text-gray-400">Avg Performance</div>
                <div class="mt-2 text-2xl font-semibold text-gray-900 dark:text-white">{{ $avg['performance'] ?? '-' }}</div>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="text-sm text-gray-500 dark:text-gray-400">Avg Accessibility</div>
                <div class="mt-2 text-2xl font-semibold text-gray-900 dark:text-white">{{ $avg['accessibility'] ?? '-' }}</div>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="text-sm text-gray-500 dark:text-gray-400">Avg Mobile SEO</div>
                <div class="mt-2 text-2xl font-semibold text-gray-900 dark:text-white">{{ $avg['mobile_seo'] ?? '-' }}</div>
            </div>
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="text-sm text-gray-500 dark:text-gray-400">Avg Schema</div>
                <div class="mt-2 text-2xl font-semibold text-gray-900 dark:text-white">{{ $avg['structured_data'] ?? '-' }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="text-sm font-medium text-gray-900 dark:text-white">Severity breakdown</div>
                <div class="mt-4 grid grid-cols-2 gap-3 text-sm">
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                        <span>Critical</span><span class="font-semibold">{{ $sev['Critical'] ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                        <span>High</span><span class="font-semibold">{{ $sev['High'] ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                        <span>Medium</span><span class="font-semibold">{{ $sev['Medium'] ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                        <span>Low</span><span class="font-semibold">{{ $sev['Low'] ?? 0 }}</span>
                    </div>
                </div>
                <div class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                    Generated: {{ $seoAuditReport['generated_at'] ?? '-' }}
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="text-sm font-medium text-gray-900 dark:text-white">Duplicate titles</div>
                <div class="mt-4 space-y-2 text-sm">
                    @forelse (array_slice($dupTitles, 0, 5) as $dup)
                        <div class="flex items-start justify-between gap-3 rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                            <div class="min-w-0 break-words text-gray-700 dark:text-gray-200">{{ $dup['value'] ?? '-' }}</div>
                            <div class="shrink-0 font-semibold text-gray-900 dark:text-white">{{ $dup['count'] ?? 0 }}</div>
                        </div>
                    @empty
                        <div class="text-gray-600 dark:text-gray-400">No duplicates detected</div>
                    @endforelse
                </div>
            </div>

            <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-900">
                <div class="text-sm font-medium text-gray-900 dark:text-white">Duplicate meta descriptions</div>
                <div class="mt-4 space-y-2 text-sm">
                    @forelse (array_slice($dupDescriptions, 0, 5) as $dup)
                        <div class="flex items-start justify-between gap-3 rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                            <div class="min-w-0 break-words text-gray-700 dark:text-gray-200">{{ $dup['value'] ?? '-' }}</div>
                            <div class="shrink-0 font-semibold text-gray-900 dark:text-white">{{ $dup['count'] ?? 0 }}</div>
                        </div>
                    @empty
                        <div class="text-gray-600 dark:text-gray-400">No duplicates detected</div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            <div class="flex items-center justify-between gap-3 border-b border-gray-200 px-5 py-4 dark:border-gray-800">
                <div>
                    <div class="text-sm font-medium text-gray-900 dark:text-white">All pages summary</div>
                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ count($pages) }} pages</div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                        <tr>
                            <th class="px-5 py-3">URL</th>
                            <th class="px-5 py-3">Status</th>
                            <th class="px-5 py-3">SEO</th>
                            <th class="px-5 py-3">Perf</th>
                            <th class="px-5 py-3">A11y</th>
                            <th class="px-5 py-3">Mobile</th>
                            <th class="px-5 py-3">Schema</th>
                            <th class="px-5 py-3">Severity</th>
                            <th class="px-5 py-3">Top issues</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @foreach ($pages as $page)
                            @php
                                $issues = $page['issues'] ?? [];
                                $topIssues = array_slice(array_map(fn($i) => $i['code'] ?? null, $issues), 0, 3);
                                $topIssues = array_values(array_filter($topIssues));
                                $sevLabel = $page['severity'] ?? 'Low';
                                $sevClass = match ($sevLabel) {
                                    'Critical' => 'bg-red-50 text-red-700 dark:bg-red-500/10 dark:text-red-300',
                                    'High' => 'bg-orange-50 text-orange-700 dark:bg-orange-500/10 dark:text-orange-300',
                                    'Medium' => 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/10 dark:text-yellow-300',
                                    default => 'bg-green-50 text-green-700 dark:bg-green-500/10 dark:text-green-300',
                                };
                            @endphp
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-white/[0.01] transition-colors">
                                <td class="px-5 py-3 font-mono text-xs text-gray-900 dark:text-gray-100">{{ $page['uri'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['status'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['seo'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['performance'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['accessibility'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['mobile_seo'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['structured_data'] ?? '-' }}</td>
                                <td class="px-5 py-3">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium {{ $sevClass }}">{{ $sevLabel }}</span>
                                </td>
                                <td class="px-5 py-3 text-xs text-gray-600 dark:text-gray-300">
                                    {{ $topIssues !== [] ? implode(', ', $topIssues) : '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    @endif
</div>
@endsection
