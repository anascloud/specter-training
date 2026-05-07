@extends('backend.layouts.app')

@section('content')
<div class="space-y-6" x-data="{
    seoAuditModalOpen: false,
    seoAuditPage: null,
    openSeoAuditModal(page) {
        this.seoAuditPage = page;
        this.seoAuditModalOpen = true;
    },
    closeSeoAuditModal() {
        this.seoAuditModalOpen = false;
    },
}" x-init="$watch('seoAuditModalOpen', v => document.body.style.overflow = v ? 'hidden' : 'unset')" @keydown.escape.window="closeSeoAuditModal()">
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
                            <th class="px-5 py-3">SEO</th>
                            <th class="px-5 py-3">Performance</th>
                            <th class="px-5 py-3">A11y</th>
                            <th class="px-5 py-3">Mobile</th>
                            <th class="px-5 py-3">Severity</th>
                            <th class="px-5 py-3">Top issues</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Action</th>
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

                                $modalPayload = [
                                    'uri' => $page['uri'] ?? null,
                                    'status' => $page['status'] ?? null,
                                    'severity' => $page['severity'] ?? null,
                                    'scores' => $page['scores'] ?? [],
                                    'issues' => array_slice($page['issues'] ?? [], 0, 20),
                                    'analysis' => [
                                        'meta' => $page['analysis']['meta'] ?? [],
                                        'headings' => $page['analysis']['headings'] ?? [],
                                        'schema' => $page['analysis']['schema'] ?? [],
                                        'images' => $page['analysis']['images'] ?? [],
                                        'link_quality' => $page['analysis']['link_quality'] ?? [],
                                        'mixed_content' => $page['analysis']['mixed_content'] ?? [],
                                        'performance_signals' => $page['analysis']['performance_signals'] ?? [],
                                        'server_processing_ms' => $page['analysis']['server_processing_ms'] ?? null,
                                    ],
                                ];
                            @endphp
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-white/[0.01] transition-colors">
                                <td class="px-5 py-3 font-mono text-xs text-gray-900 dark:text-gray-100">{{ $page['uri'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['seo'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['performance'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['accessibility'] ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-700 dark:text-gray-200">{{ $page['scores']['mobile_seo'] ?? '-' }}</td>
                                <td class="px-5 py-3">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium {{ $sevClass }}">{{ $sevLabel }}</span>
                                </td>
                                <td class="px-5 py-3 text-xs text-gray-600 dark:text-gray-300">
                                    {{ $topIssues !== [] ? implode(', ', $topIssues) : '-' }}
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="#" @click.prevent="openSeoAuditModal(@js($modalPayload))"
                                            class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div x-show="seoAuditModalOpen" x-cloak class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto p-5">
            <div @click="closeSeoAuditModal()" class="fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            </div>

            <div @click.stop
                class="relative w-full max-w-4xl rounded-3xl bg-white dark:bg-gray-900 shadow-xl"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95">

                <button @click="closeSeoAuditModal()"
                    class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fillRule="evenodd" clipRule="evenodd"
                            d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                            fill="currentColor" />
                    </svg>
                </button>

                <div class="p-6 sm:p-8 space-y-6">
                    <div>
                        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-white">Comprehensive SEO Audit &amp; Performance Report</h2>
                        <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            <span class="font-mono" x-text="seoAuditPage?.uri ?? '-'"></span>
                            <span class="mx-2">|</span>
                            <span class="text-gray-700 dark:text-gray-200">Severity:</span>
                            <span class="font-medium" x-text="seoAuditPage?.severity ?? '-'"></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-5">
                        <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-950">
                            <div class="text-xs text-gray-500 dark:text-gray-400">SEO</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-white" x-text="seoAuditPage?.scores?.seo ?? '-'"></div>
                        </div>
                        <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-950">
                            <div class="text-xs text-gray-500 dark:text-gray-400">Performance</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-white" x-text="seoAuditPage?.scores?.performance ?? '-'"></div>
                        </div>
                        <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-950">
                            <div class="text-xs text-gray-500 dark:text-gray-400">A11y</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-white" x-text="seoAuditPage?.scores?.accessibility ?? '-'"></div>
                        </div>
                        <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-950">
                            <div class="text-xs text-gray-500 dark:text-gray-400">Mobile</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-white" x-text="seoAuditPage?.scores?.mobile_seo ?? '-'"></div>
                        </div>
                        <div class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-950">
                            <div class="text-xs text-gray-500 dark:text-gray-400">Schema</div>
                            <div class="mt-1 text-lg font-semibold text-gray-900 dark:text-white" x-text="seoAuditPage?.scores?.structured_data ?? '-'"></div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-950">
                        <div class="text-sm font-medium text-gray-900 dark:text-white">1. Meta Tags &amp; Content Health</div>
                        <div class="mt-3 space-y-2 text-sm text-gray-700 dark:text-gray-200">
                            <div>
                                <span class="font-medium">Meta Title &amp; Description:</span>
                                Analyzes visibility and length, flagging items that are missing, too long, or exceeding pixel limits to ensure optimal search appearance.
                            </div>
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Title</div>
                                    <div class="mt-1 break-words" x-text="seoAuditPage?.analysis?.meta?.title ?? '-'"></div>
                                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-400" x-text="(seoAuditPage?.analysis?.meta?.title || '').length ? ('Length: ' + (seoAuditPage.analysis.meta.title || '').length) : 'Length: 0'"></div>
                                </div>
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Description</div>
                                    <div class="mt-1 break-words" x-text="seoAuditPage?.analysis?.meta?.description ?? '-'"></div>
                                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-400" x-text="(seoAuditPage?.analysis?.meta?.description || '').length ? ('Length: ' + (seoAuditPage.analysis.meta.description || '').length) : 'Length: 0'"></div>
                                </div>
                            </div>
                            <div>
                                <span class="font-medium">Meta Keywords:</span>
                                Evaluates keyword presence and density, categorizing them as missing, healthy, or perfect for ranking.
                            </div>
                            <div>
                                <span class="font-medium">Canonical URL &amp; Slug Quality:</span>
                                Verifies if URLs are valid and clean, ensuring the correct version of a page is indexed to avoid duplicate content penalties.
                            </div>
                            <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                <div class="text-xs text-gray-500 dark:text-gray-400">Canonical</div>
                                <div class="mt-1 break-words font-mono text-xs" x-text="seoAuditPage?.analysis?.meta?.canonical ?? '-'"></div>
                            </div>
                            <div>
                                <span class="font-medium">Content Readability:</span>
                                Assesses how easily users can consume information, ensuring the content is engaging and well-structured.
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-950">
                        <div class="text-sm font-medium text-gray-900 dark:text-white">2. Keyword Strategy &amp; CTR Optimization</div>
                        <div class="mt-3 space-y-2 text-sm text-gray-700 dark:text-gray-200">
                            <div><span class="font-medium">Keyword Integrity:</span> Identifies issues like missing primary keywords, duplicate usage, or "keyword stuffing" which can trigger search engine penalties.</div>
                            <div><span class="font-medium">Keyword Precision:</span> Monitors for keywords that are too short or too long, ensuring they align with user search intent.</div>
                            <div><span class="font-medium">CTR Enhancement:</span> Reviews non-optimized metadata and poor click-through rate (CTR) elements to improve the attractiveness of search snippets.</div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-950">
                        <div class="text-sm font-medium text-gray-900 dark:text-white">3. Technical SEO &amp; Social Integration</div>
                        <div class="mt-3 space-y-2 text-sm text-gray-700 dark:text-gray-200">
                            <div><span class="font-medium">Site Architecture:</span> Audits heading structures (H1/H2 hierarchy) and semantic HTML quality for better machine understanding.</div>
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">H1</div>
                                    <div class="mt-1 font-semibold" x-text="(seoAuditPage?.analysis?.headings?.h1 || []).length"></div>
                                </div>
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">H2</div>
                                    <div class="mt-1 font-semibold" x-text="(seoAuditPage?.analysis?.headings?.h2 || []).length"></div>
                                </div>
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">DOM elements</div>
                                    <div class="mt-1 font-semibold" x-text="seoAuditPage?.analysis?.performance_signals?.dom_elements ?? '-'"></div>
                                </div>
                            </div>
                            <div><span class="font-medium">Media Optimization:</span> Checks for missing image alt attributes and ensures "Lazy Loading" is implemented to boost page speed.</div>
                            <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                <div class="text-xs text-gray-500 dark:text-gray-400">Images missing alt</div>
                                <div class="mt-1 font-semibold" x-text="seoAuditPage?.analysis?.images?.missing_alt ?? 0"></div>
                            </div>
                            <div><span class="font-medium">Social Connectivity:</span> Validates OpenGraph and Twitter Card tags to ensure the website looks professional when shared on social platforms.</div>
                            <div><span class="font-medium">Internationalization:</span> Reviews hreflang implementation for sites targeting multiple languages or regions.</div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-950">
                        <div class="text-sm font-medium text-gray-900 dark:text-white">4. Linking &amp; Technical Integrity</div>
                        <div class="mt-3 space-y-2 text-sm text-gray-700 dark:text-gray-200">
                            <div><span class="font-medium">Link Hygiene:</span> Scans for broken links, mixed content (HTTP/HTTPS) issues, and evaluates the quality of both internal and external linking structures.</div>
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Broken internal links</div>
                                    <div class="mt-1 font-semibold" x-text="(seoAuditPage?.analysis?.link_quality?.broken_internal_links || []).length"></div>
                                </div>
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Mixed content URLs</div>
                                    <div class="mt-1 font-semibold" x-text="seoAuditPage?.analysis?.mixed_content?.mixed_content_url_count ?? 0"></div>
                                </div>
                            </div>
                            <div><span class="font-medium">Schema &amp; Structured Data:</span> Checks for the presence and technical correctness of Schema markup to help generate rich search snippets.</div>
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Schema blocks</div>
                                    <div class="mt-1 font-semibold" x-text="seoAuditPage?.analysis?.schema?.count ?? 0"></div>
                                </div>
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Valid JSON-LD</div>
                                    <div class="mt-1 font-semibold" x-text="seoAuditPage?.analysis?.schema?.valid_json ?? 0"></div>
                                </div>
                            </div>
                            <div><span class="font-medium">Redirect Management:</span> Identifies redirect loops or issues that negatively impact crawl budget and user experience.</div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-gray-950" x-show="(seoAuditPage?.issues || []).length">
                        <div class="text-sm font-medium text-gray-900 dark:text-white">Top issues detected</div>
                        <div class="mt-3 space-y-2 text-sm text-gray-700 dark:text-gray-200">
                            <template x-for="issue in (seoAuditPage?.issues || []).slice(0, 10)" :key="issue.code">
                                <div class="rounded-lg bg-gray-50 px-3 py-2 dark:bg-white/[0.03]">
                                    <div class="flex items-center justify-between gap-3">
                                        <div class="font-mono text-xs text-gray-900 dark:text-gray-100" x-text="issue.code"></div>
                                        <div class="text-xs font-medium text-gray-600 dark:text-gray-300" x-text="issue.severity"></div>
                                    </div>
                                    <div class="mt-1" x-text="issue.message"></div>
                                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-400" x-text="issue.recommendation"></div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
</div>
@endsection

<style>
    [x-cloak] {
        display: none;
    }
</style>
