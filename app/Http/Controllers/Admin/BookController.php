<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Master Books';
        $data = Book::with('category')->get();
        return view('app.books.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Master Books';
        $categories = Category::all();
        return view('app.books.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'embeded_link' => 'required',
            'book_cover' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($request->file('book_cover')){
            $book_cover = $request->file('book_cover')->store('books', 'public');
        }

        Book::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'embeded_link' => $request->embeded_link.'?preview',
            'book_cover' => $book_cover
        ]);

        return redirect('/v1/books')->with('success', "Data added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Master Books';
        $data = Book::where('id', $id)->first();
        return view('app.books.show', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Master Books';
        $categories = Category::all();
        $data = Book::where('id', $id)->first();
        return view('app.books.edit', compact('title', 'data', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $books = Book::where('id', $id)->first();
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'embeded_link' => 'required',
            'book_cover' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($books->book_cover || file_exists(storage_path('app/public/'. $books->book_cover))){
            Storage::delete(['public/', $books->book_cover]);
        }

        $book_cover = null;

        if($request->book_cover != null){
            $book_cover = $request->file('book_cover')->store('books', 'public');
        }

        Book::where('id', $id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'embeded_link' => $request->embeded_link,
            'book_cover' => ($book_cover == null) ? $books->book_cover : $book_cover
        ]);

        return redirect('/v1/books')->with('success', "data changed successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id', $id)->delete();
        return redirect('/v1/books')->with('success', "data deleted successfully");
    }
}
