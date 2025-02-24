
<h2>Tweets</h2>
<a href="{{ route('tweets.create') }}">Post New Tweet</a>

<ul>
    @if ($tweets->isEmpty())
        <li>No tweets available.</li>
    @else
        @foreach ($tweets as $tweet)
            <li>
                <strong>{{ $tweet->user->name }}:</strong> 
                {{ $tweet->text }}
            </li>

        @endforeach  
    @endif
</ul>
