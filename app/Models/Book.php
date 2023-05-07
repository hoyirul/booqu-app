<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'title', 'author', 'publisher', 'embeded_link', 'book_cover'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function most_viewed_book(){
        return $this->hasMany(MostViewedBook::class, 'book_id', 'id');
    }

    public function book_rating(){
        return $this->hasMany(BookRating::class, 'book_id', 'id');
    }
}
