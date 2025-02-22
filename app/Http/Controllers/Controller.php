<?php

namespace App\Http\Controllers;

use App\Models\Tweet; // Importing the Tweet model

abstract class Controller
{
    public function index() {
        return view('dashboard', [
            'tweets' => Tweet::latest()->get(),
        ]);
    }
}
