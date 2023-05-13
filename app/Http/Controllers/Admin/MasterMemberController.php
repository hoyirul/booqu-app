<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;

class MasterMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Member Packages';
        $data = Membership::withCount('user')->where('id', '!=', 1)->get();
        return view('app.mastermembers.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Member Packages';
        return view('app.mastermembers.create', compact('title'));
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
            'package' => 'required',
            'description' => 'required',
            'price' => 'required',
            'max_device' => 'required',
        ]);

        Membership::create([
            'package' => $request->package,
            'description' => $request->description,
            'price' => $request->price,
            'max_device' => $request->max_device,
            'unit' => 'tahun',
        ]);

        return redirect('/v1/mastermembers')->with('success', "Data added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Member Packages';
        $data = Membership::where('id', $id)->first();
        return view('app.mastermembers.show', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Member Packages';
        $data = Membership::where('id', $id)->first();
        return view('app.mastermembers.edit', compact('title', 'data'));
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
            'package' => 'required',
            'description' => 'required',
            'price' => 'required',
            'max_device' => 'required',
        ]);

        Membership::where('id', $id)->update([
            'package' => $request->package,
            'description' => $request->description,
            'price' => $request->price,
            'max_device' => $request->max_device,
            'unit' => 'tahun',
        ]);

        return redirect('/v1/mastermembers')->with('success', "data changed successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Membership::where('id', $id)->delete();
        return redirect('/v1/mastermembers')->with('success', "data deleted successfully");
    }
}
