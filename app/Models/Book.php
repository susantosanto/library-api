<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Borrowing;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'title'
    ];

    public function authors() {
        return $this->belongsTo(Author::class);
    }

    public function borrowings() {
        return $this->hashMany(Borrowing::class);
    }
}
