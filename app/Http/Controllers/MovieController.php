<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        $movies = $query->latest()->get();
        $genres = Movie::distinct()->pluck('genre');

        return view('movies.index', compact('movies', 'genres'));
    }

    public function show(Movie $movie)
    {
        $movie->load('reviews');
        return view('movies.show', compact('movie'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer|min:1888|max:2100',
            'genre' => 'required|string|max:100',
            'director' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index');
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer|min:1888|max:2100',
            'genre' => 'required|string|max:100',
            'director' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.show', $movie);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}