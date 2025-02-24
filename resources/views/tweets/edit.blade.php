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
                        @auth
                            @if ($tweet->user_id !== Auth::id())
                                <div class="alert alert-danger">You are not authorized to edit this tweet.</div>
                                @return
                            @endif
                        @endauth

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
                                <label for="tweetText" class="form-label">What's on your mind? (Max 280 characters)</label>
                                <textarea id="tweetText" name="new_text" class="form-control" rows="4" maxlength="280" required>{{ old("new_text", $tweet["text"]) }}</textarea>
                                <small class="text-muted float-end"><span id="charCount">280</span> characters remaining</small>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Update Tweet</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                            </div>

                            @push('scripts')
                            <script>
                                document.getElementById('tweetText').addEventListener('input', function() {
                                    const maxLength = 280;
                                    const remaining = maxLength - this.value.length;
                                    document.getElementById('charCount').textContent = remaining;
                                });
                            </script>
                            @endpush
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
