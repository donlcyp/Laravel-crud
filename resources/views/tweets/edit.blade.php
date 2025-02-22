<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tweet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Form to edit tweet -->
                    @if (session('success'))
                        {{ session('success') }}
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    @endif
                
                    <form action="{{ route('tweets.update', $tweet->id) }}" method='POST'>
                        @csrf 
                        @method("PUT")

                        <label for="tweetText">What's on your mind?</label><br>
                        <textarea id="tweetText" name="new_text" rows="4" cols="60">{{ old("new_text", $tweet["text"]) }}</textarea><br><br>

                        <button type="submit">Update Tweet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
