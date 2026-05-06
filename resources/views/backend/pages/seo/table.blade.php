<div x-data="{
    {{-- 1. Corrected Data Structure for SEO --}}
    tableRowData: [
        @foreach($items as $entry)
        {
            id: '{{ $entry->id }}',
            path: '{{ $entry->path }}',
            metaTitle: '{{ Str::limit($entry->meta_title, 40) }}',
            metaKeywords: '{{ Str::limit($entry->meta_keywords, 30) }}',
            ogImage: '{{ $entry->og_image ? asset('storage/' . $entry->og_image) : 'No Image' }}',
            {{-- Example Logic for Score --}}
            metaScore: {{ $entry->meta_description ? 80 : 40 }}, 
            googleScore: {{ $entry->schema_markup ? 95 : 60 }},
        },
        @endforeach
    ],
    selectedRows: [],
    selectAll: false,

    handleSelectAll() {
        this.selectAll = !this.selectAll;
        this.selectedRows = this.selectAll ? this.tableRowData.map(row => row.id) : [];
    },

    handleRowSelect(id) {
        if (this.selectedRows.includes(id)) {
            this.selectedRows = this.selectedRows.filter(rowId => rowId !== id);
        } else {
            this.selectedRows.push(id);
        }
    },

    deleteRow(id) {
        if (confirm('Are you sure you want to delete this SEO configuration?')) {
            {{-- Note: Add your actual fetch/form logic here to delete from DB --}}
            this.tableRowData = this.tableRowData.filter(row => row.id !== id);
        }
    },

    getScoreClass(score) {
        if (score >= 80) return 'bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-500';
        if (score >= 50) return 'bg-yellow-50 text-yellow-700 dark:bg-yellow-500/15 dark:text-yellow-400';
        return 'bg-red-50 text-red-700 dark:bg-red-500/15 dark:text-red-500';
    }
}">
   
        <div class="overflow-hidden rounded-xl border border-gray-100 dark:border-white/[0.05]">
            <div class="max-w-full overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 dark:bg-white/[0.02] border-b border-gray-100 dark:border-white/[0.05]">
                        <tr>
                            <th class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div @click="handleSelectAll()"
                                         class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px]"
                                         :class="selectAll ? 'border-blue-500 bg-blue-500' : 'bg-white dark:bg-transparent border-gray-300 dark:border-gray-700'">
                                        <svg :class="selectAll ? 'block' : 'hidden'" width="12" height="12" viewBox="0 0 14 14" fill="none">
                                            <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">Path/Route</span>
                                </div>
                            </th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Meta Title</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Keywords</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">Meta Score</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider">OG Image</th>
                            <th class="px-5 py-4 text-xs font-medium text-gray-500 uppercase tracking-wider text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-white/[0.05]">
                        <template x-for="row in tableRowData" :key="row.id">
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-white/[0.01] transition-colors">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div @click="handleRowSelect(row.id)"
                                             class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px]"
                                             :class="selectedRows.includes(row.id) ? 'border-blue-500 bg-blue-500' : 'bg-white dark:bg-transparent border-gray-300 dark:border-gray-700'">
                                            <svg :class="selectedRows.includes(row.id) ? 'block' : 'hidden'" width="12" height="12" viewBox="0 0 14 14" fill="none">
                                                <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <span class="px-2 py-1 bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 rounded text-xs font-mono" x-text="row.path"></span>
                                    </div>
                                </td>
                                <td class="px-5 py-4 text-sm text-gray-700 dark:text-gray-300" x-text="row.metaTitle"></td>
                                <td class="px-5 py-4 text-sm text-gray-500 dark:text-gray-400" x-text="row.metaKeywords"></td>
                                <td class="px-5 py-4">
                                    <span :class="getScoreClass(row.metaScore)" class="px-2.5 py-0.5 rounded-full text-xs font-medium" x-text="row.metaScore + '%'"></span>
                                </td>
                                <td class="px-5 py-4">
                                    <template x-if="row.ogImage !== 'No Image'">
                                        <img :src="row.ogImage" class="w-10 h-10 rounded border border-gray-200 object-cover">
                                    </template>
                                    <template x-if="row.ogImage === 'No Image'">
                                        <span class="text-xs text-gray-400 italic">None</span>
                                    </template>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        {{-- Edit Button --}}
                                        <a :href="'/admin/seo/' + row.id + '/edit'" class="p-2 text-gray-500 hover:text-blue-600 hover:bg-blue-50 dark:hover:bg-blue-500/10 rounded-lg transition-all">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        {{-- Delete Button --}}
                                        <button @click="deleteRow(row.id)" class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 rounded-lg transition-all">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    
</div>
