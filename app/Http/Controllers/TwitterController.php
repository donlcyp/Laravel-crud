<?php

namespace App\Http\Controllers;

use App\Models\Tweet;   
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function index()
    {
        $tweets = Tweet::latest()->get(); 
        return view('dashboard', compact('tweets')); 
    }

    public function create()
    {
        // Logic to show the form for creating a new tweet
    }

    public function store(Request $request) {
        Tweet::create(['text' => $request->input("text")]);
        return redirect()->route("tweets.index")->withSuccess("Tweet posted successfully.");
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
