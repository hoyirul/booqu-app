<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Book;
use App\Models\BookRating;
use App\Models\BookReview;
use App\Models\MostViewedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::all();
        $books = Book::limit(4)->get();
        $descbooks = Book::orderBy('id', 'DESC')->limit(4)->get();
        $descbookreviews = BookReview::orderBy('id', 'DESC')->first();
        if($descbookreviews != null){
            $bookreviews = BookReview::orderBy('id', 'ASC')->where('id', '!=', $descbookreviews->id)->limit(3)->get();
        }else{
            $bookreviews = BookReview::orderBy('id', 'ASC')->limit(3)->get();
        }
        return view('member.home.index', compact([
            'banners',
            'books',
            'descbooks',
            'bookreviews',
            'descbookreviews',
        ]));
    }

    public function book_review(Request $request){
        $key = $request->key;
        $bookreviews = [];
        if($key != null){
            $bookreviews = BookReview::where('title', 'like', "%{$key}%")->paginate(12);
        }else{
            $bookreviews = BookReview::paginate(12);
        }
        return view('member.reviews.index', compact([
            'bookreviews', 'key'
        ]));
    }

    public function book(Request $request){
        $key = $request->key;
        $books = [];
        if($key != null){
            $books = Book::with('category')
                ->where('title', 'like', "%{$key}%")->paginate(12);
        }else{
            $books = Book::with('category')->paginate(12);
        }
        return view('member.books.index', compact([
            'books', 'key'
        ]));
    }

    public function show($id){
        $books = Book::with('category')->where('id', $id)->first();
        MostViewedBook::create([
            'book_id' => $books->id,
            'user_id' => Auth::user()->id
        ]);
        return view('member.books.show', compact([
            'books'
        ]));
    }

    public function about(){
        return view('member.abouts.index');
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
