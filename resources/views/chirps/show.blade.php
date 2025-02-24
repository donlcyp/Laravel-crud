@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="bg-white shadow-sm rounded-lg p-6">
        <div class="flex items-center space-x-2">
            <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            <div>
                <span class="text-gray-800">{{ $chirp->user->name }}</span>
                <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
            </div>
        </div>
        <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
    </div>
</div>
@endsection
