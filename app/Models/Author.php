<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $fillable = [
        'name',
        'biography',
    ];

    public function books() {
        return $this->hashMany(Book::class);
    }
}
