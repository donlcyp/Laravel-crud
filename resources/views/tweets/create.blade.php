<form action="{{ route ('_tweets.store') }}" method="POST">
    @csrf
        
    <label>Text:</label>
    <textarea name="text"></textarea>
    
    <button type="submit">Post</button>
        
    </form>  
    