<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'author', 'genre', 'price', 'image', 'description'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'bookId');
    }
}
