<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Banners';
        $data = Banner::with('user')->get();
        return view('app.banners.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Banners';
        return view('app.banners.create', compact('title'));
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
            'numbers' => 'required',
            'is_active' => 'required',
            'banner_photo' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($request->file('banner_photo')){
            $banner_photo = $request->file('banner_photo')->store('banners', 'public');
        }

        Banner::create([
            'user_id' => Auth::user()->id,
            'numbers' => $request->numbers,
            'is_active' => $request->is_active,
            'banner_photo' => $banner_photo
        ]);

        return redirect('/v1/banners')->with('success', "Data added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Banners';
        $data = Banner::where('id', $id)->first();
        return view('app.banners.show', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Banners';
        $data = Banner::where('id', $id)->first();
        return view('app.banners.edit', compact('title', 'data'));
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
        $banners = Banner::where('id', $id)->first();
        $request->validate([
            'numbers' => 'required',
            'is_active' => 'required',
            'banner_photo' => 'required',
        ]);

        if($banners->banner_photo || file_exists(storage_path('app/public/'. $banners->banner_photo))){
            Storage::delete(['public/', $banners->banner_photo]);
        }

        $banner_photo = null;

        if($request->banner_photo != null){
            $banner_photo = $request->file('banner_photo')->store('banners', 'public');
        }

        Banner::where('id', $id)->update([
            'user_id' => Auth::user()->id,
            'numbers' => $request->numbers,
            'is_active' => $request->is_active,
            'banner_photo' => ($banner_photo == null) ? $banners->banner_photo : $banner_photo
        ]);

        return redirect('/v1/banners')->with('success', "data changed successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::where('id', $id)->delete();
        return redirect('/v1/banners')->with('success', "data deleted successfully");
    }
}
