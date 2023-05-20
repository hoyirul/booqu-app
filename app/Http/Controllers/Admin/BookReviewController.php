<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookReview;
use Illuminate\Http\Request;

class BookReviewController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Book Reviews';
        $data = BookReview::all();
        return view('app.bookreviews.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Book Reviews';
        return view('app.bookreviews.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'embeded_link' => 'required',
        ]);

        BookReview::create([
            'title' => $request->title,
            'author' => $request->author,
            'embeded_link' => $request->embeded_link,
        ]);

        return redirect('/v1/bookreviews')->with('success', "Data added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Book Reviews';
        $data = BookReview::where('id', $id)->first();
        return view('app.bookreviews.show', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Book Reviews';
        $data = BookReview::where('id', $id)->first();
        return view('app.bookreviews.edit', compact('title', 'data'));
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
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'embeded_link' => 'required',
        ]);

        BookReview::where('id', $id)->update([
            'title' => $request->title,
            'author' => $request->author,
            'embeded_link' => 'https://www.youtube.com/embed/'.$request->embeded_link,
        ]);

        return redirect('/v1/bookreviews')->with('success', "data changed successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BookReview::where('id', $id)->delete();
        return redirect('/v1/bookreviews')->with('success', "data deleted successfully");
    }
}
