@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        @foreach ($chirps as $chirp)
            <div class="p-6 flex space-x-2">
                <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $chirp->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                        </div>
                        @if ($chirp->user->is(auth()->user()))
                            <x-dropdown class="hidden">
                                <x-slot name="trigger">
                                    <button>
                                        <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('chirps.edit', $chirp)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
