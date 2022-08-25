<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:20|min:5',
            'email' => 'required',
            'password' => 'required|min:6',
            'is_role' => 'required',
        ]);

        $validate = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_role' => $request->is_role,
        ]);

        if ($validate) {
            return redirect()->route('superadmin.user.index')->with([
                'toast_success' => 'Success Add New User!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'toast_error' => 'Failed Add New User!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('superadmin.user.edit', compact('user'));
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
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_role' => 'required',
        ]);

        $update = User::find($id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_role' => $request->is_role,
        ]);

        if ($update) {
            return redirect()->route('superadmin.user.index')->with([
                'toast_success' => 'Success Update New User!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'toast_error' => 'Failed Update New User!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
