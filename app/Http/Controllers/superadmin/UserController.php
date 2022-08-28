<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('superadmin.user.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:20|min:5',
            'email' => 'required',
            'password' => 'required|min:6',
            'is_role' => 'required',
            'name' => 'required|max:20',
        ]);

        $validate = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_role' => $request->is_role,
            'name' => $request->name,
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


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('superadmin.user.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_role' => 'required',
            'name' => 'required',
        ]);

        $update = User::find($id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_role' => $request->is_role,
            'name' => $request->name,
        ]);

        if ($update) {
            return redirect()->route('superadmin.user.index')->with([
                'toast_success' => 'Success Update User!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'toast_error' => 'Failed Update User!'
            ]);
        }
    }


    public function destroy($id)
    {
        //
    }
}
