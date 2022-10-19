<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Burrow extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'studentId', 'bookId', 'burrow_date', 'return_date', 'status'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */

    public function book()
    {
        return $this->belongsTo(Book::class, 'bookId');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'studentId');
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}
