<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MostViewedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MostViewedBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Most Viewed Books';
        $data = MostViewedBook::with('book')->with('user')
                ->select('book_id', DB::raw('count(book_id) as count_book'))
                ->groupBy('book_id')
                ->get();
        return view('app.most_viewed_books.index', compact('data', 'title'));
    }
}
