@extends('backend.layouts.app')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-white/90">
                {{ $title ?? 'Admin Dashboard' }}
            </h1>
        </div>
    </div>
@endsection
