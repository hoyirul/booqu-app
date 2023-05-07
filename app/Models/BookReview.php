<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'embeded_link'
    ];

    public function most_viewed_review(){
        return $this->hasMany(MostViewedReview::class, 'book_review_id', 'id');
    }
}
