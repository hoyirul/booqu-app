<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Book;
use App\Models\BookRating;
use App\Models\BookReview;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::all();
        $books = Book::all();
        $descbooks = Book::orderBy('id', 'DESC')->get();
        $descbookreviews = BookReview::orderBy('id', 'DESC')->first();
        $bookreviews = BookReview::orderBy('id', 'ASC')->where('id', '!=', $descbookreviews->id)->get();
        return view('member.home.index', compact([
            'banners',
            'books',
            'descbooks',
            'bookreviews',
            'descbookreviews',
        ]));
    }

    public static function rating($id){
        $avg = BookRating::where('book_id', $id)->avg('star');
        return ($avg == null) ? 0 : $avg;
    }

    public static function reviews_from_rating($id){
        $count = BookRating::where('book_id', $id)->count('book_id');
        return ($count == null) ? 0 : $count;
    }
}
