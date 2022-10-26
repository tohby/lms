<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name', 'author', 'genre', 'price', 'image', 'description', 'number_of_books'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'bookId');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}
