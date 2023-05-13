<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::all();
        return view('member.home.index', compact([
            'banners'
        ]));
    }
}
