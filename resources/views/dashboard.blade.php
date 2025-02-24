<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mb-4">
            {{ __('Tweet Life') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border rounded-lg p-5 bg-light">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="tweetText" class="font-weight-bold d-block text-center">What's on your mind?</label>
                            <form action="{{ route('tweets.store') }}" method="POST" class="mb-4">
                                @csrf
                                <textarea id="tweetText" name="text" class="form-control" rows="3" placeholder="Write something..." style="border-radius: 10px; width: 100%; height: 150px; resize: none;"></textarea>
                                <button type="submit" class="btn btn-primary btn-block mt-3 shadow">Post Tweet</button>
                            </form>
                        </div>
                        <hr class="my-4">

                        <h3 class="text-center text-primary mb-3">Your Posts:</h3>
                        <ul class="list-group mt-4" style="position: relative;">
                            @foreach ($posts as $post)
                                <li class="list-group-item d-flex justify-content-between align-items-center shadow-sm p-4 mb-3 rounded-lg">
                                    <div class="post-item" style="position: relative;">
                                        <span class="badge bg-transparent text-dark mb-2 fs-6">
                                            {{ $post->type == 'tweet' ? (auth()->user() ? auth()->user()->name : 'Guest') : 'Chirp' }}
                                        </span>
                                        <p class="mb-2 font-weight-bold post-text">
                                            {{ $post->type == 'tweet' ? $post->text : $post->message }}
                                        </p>
                                        @if ($post->type == 'tweet')
                                            <a href="{{ route('tweets.edit', $post->id) }}" class="btn btn-sm btn-outline-info me-2">Edit</a>
                                            <form action="{{ route('tweets.destroy', $post->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        @endif
                                        <small class="text-muted">Posted on: {{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
