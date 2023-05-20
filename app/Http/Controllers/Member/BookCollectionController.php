<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\BookCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookCollectionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($book_id)
    {
        BookCollection::create([
            'user_id' => Auth::user()->id,
            'book_id' => $book_id,
        ]);

        return redirect('/m1/books/'.$book_id.'/show')->with('success', "Data added successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id, $user_id)
    {
        BookCollection::where('book_id', $book_id)->where('user_id', $user_id)->delete();
        return redirect('/m1/books/'.$book_id.'/show')->with('success', "data deleted successfully");
    }
}
