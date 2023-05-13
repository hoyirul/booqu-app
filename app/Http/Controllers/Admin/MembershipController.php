<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Membership';
        $data = User::with('membership')->with('role')->where('role_id', 2)->get();
        return view('app.memberships.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Membership';
        $roles = Role::where('id', '!=', 1)->orderBy('id', 'DESC')->get();
        $memberships = Membership::where('id', '!=', 1)->get();
        return view('app.memberships.create', compact('title', 'roles', 'memberships'));
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
            'name' => 'required',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|min:6|same:password',
            'membership_id' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'membership_id' => $request->membership_id,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active,
        ]);

        return redirect('/v1/memberships')->with('success', "Data added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Membership';
        $data = User::where('id', $id)->first();
        return view('app.memberships.show', compact('title', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Membership';
        $roles = Role::where('id', '!=', 1)->orderBy('id', 'DESC')->get();
        $memberships = Membership::where('id', '!=', 1)->get();
        $data = User::where('id', $id)->first();
        return view('app.memberships.edit', compact('title', 'data', 'roles', 'memberships'));
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
            'name' => 'required',
            'email' => 'required|string|max:255',
            'membership_id' => 'required',
            'role_id' => 'required',
            'is_active' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'membership_id' => $request->membership_id,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active,
        ]);

        return redirect('/v1/memberships')->with('success', "data changed successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('/v1/memberships')->with('success', "data deleted successfully");
    }
}
