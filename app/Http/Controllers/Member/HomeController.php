<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Book;
use App\Models\BookRating;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::all();
        $books = Book::all();
        $descbooks = Book::orderBy('id', 'DESC')->get();
        return view('member.home.index', compact([
            'banners',
            'books',
            'descbooks',
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
