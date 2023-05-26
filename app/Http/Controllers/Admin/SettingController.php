<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function setting()
    {
        $title = 'Settings';
        $id = Auth::user()->id;
        $data = User::where('id', $id)->first();
        return view('app.settings.index', compact('data', 'title'));
    }

    public function account()
    {
        $title = 'Accounts';
        $id = Auth::user()->id;
        $data = User::where('id', $id)->first();
        return view('app.accounts.index', compact('data', 'title'));
    }

    public function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
            'password_confirmation' => 'same:password|min:6'
        ]);

        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/v1/settings')->with('success', 'Password successfully changed at '.Carbon::now());
    }
}
