<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tweet') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <!-- Form to edit tweet -->
                        <form action="{{ route('tweets.update', $tweet->id) }}" method='POST'>
                            @csrf 
                            @method("PUT")

                            <div class="mb-3">
                                <label for="tweetText" class="form-label">What's on your mind?</label>
                                <textarea id="tweetText" name="new_text" class="form-control" rows="4">{{ old("new_text", $tweet["text"]) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Tweet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
<<<<<<< Updated upstream
</x-app-layout>
=======
</x-app-layout> 
>>>>>>> Stashed changes
=======
</x-app-layout>
>>>>>>> 9b75894c09fc5dcc9e3068ca2e79a8e28a320a49
