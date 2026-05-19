<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Movie $movie)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'text' => 'required|string',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        $movie->reviews()->create($request->all());

        return redirect()->route('movies.show', $movie);
    }
}