<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'movie_id',
        'author',
        'text',
        'rating',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}