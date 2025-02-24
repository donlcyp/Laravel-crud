<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwitterController extends Controller
{
    public function index()
    {
        // Get and combine tweets and chirps
        $tweets = Tweet::latest()->get()->map(function($item) {
            $item->type = 'tweet';
            return $item;
        });
        
        $chirps = Chirp::latest()->get()->map(function($item) {
            $item->type = 'chirp';
            return $item;
        });

        // Combine and sort by creation date
        $posts = $tweets->concat($chirps)->sortByDesc('created_at');

        return view('dashboard', compact('posts'));
    }

    public function store(Request $request) {
        // Validate the request
        $request->validate([
                'text' => 'required|string|max:280'
        ]);

        // Create the tweet
        Tweet::create([
            'text' => $request->input('text'),
            'user_id' => Auth::id()
        ]);

        return redirect()->route('dashboard')->with('success', 'Tweet posted successfully!');
    }

    public function edit(Tweet $tweet) {
        return view('tweets.edit', ['tweet' => $tweet]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'new_text' => 'required|string|max:280',
        ]);

        $tweet = Tweet::findOrFail($id);
        $tweet->text = $request->input('new_text');
        $tweet->save();

        return redirect()->route('dashboard')->with('success', 'Tweet updated successfully.');
    }

    public function destroy($id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->delete();

        return redirect()->route('dashboard')->with('success', 'Tweet deleted successfully.');
    }
}
