<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function actionLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array(
            'username' => $request['username'],
            'password' => $request['password']
        ))) {
            if (auth()->user()->is_role == 1) {
                return redirect()->route('superadmin.index')
                    ->with('toast_success', 'Login as superadmin.');
            } elseif (auth()->user()->is_role == 2) {
                return redirect()->route('admin.index')
                    ->with('toast_success', 'Login as admin.');
            } else {
                return redirect()->route('login')
                    ->with('toast_error', 'No Access Menu.');
            }
        } else {
            return redirect()->route('AuthLogin')
                ->with('toast_error', 'Email-Address And Password Are Wrong.');
        }
    }
}
