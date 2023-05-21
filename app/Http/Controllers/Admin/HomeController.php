<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Book;
use App\Models\BookRating;
use App\Models\BookReview;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $members = User::where('id', '!=', 1)->count();
        $books = Book::count();
        $bookreviews = BookReview::count();
        $ratings = BookRating::count();
        $packages = Membership::count();
        $banners = Banner::count();
        return view('app.home.index', compact([
            'title', 'members', 'books', 'bookreviews', 'ratings', 'packages', 'banners'
        ]));
    }
}
