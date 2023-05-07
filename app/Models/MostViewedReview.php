<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MostViewedReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_review_id', 'user_id'
    ];

    public function book_review(){
        return $this->belongsTo(BookReview::class, 'book_review_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
