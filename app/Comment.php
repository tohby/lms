<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId', 'comment', 'bookId'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'bookId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
