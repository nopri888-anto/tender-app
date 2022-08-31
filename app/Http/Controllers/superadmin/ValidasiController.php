<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataCompany;
use App\Models\userVendor;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class ValidasiController extends Controller
{
    public function validasiVendor($id)
    {
        $data = DataCompany::findOrFail($id);
        return view('superadmin.vendor.validasi',compact('data'));
    }


    public function email(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'status' => 'required',
            'remark' => '',
            'id_company' => '',
        ]);

        $email = [
            'title' => 'Akses Login',
            'username' => $request->username,
            'password' => $request->password,
            'status' => $request->status,
            'remark' => $request->remark,
        ];

        $to = $request->email;

        $save = userVendor::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'status' => $request->status,
            'remark' => $request->remark,
            'id_company' => $request->id_company,
        ]);

        if ($save) {
            $send = Mail::to($to)->send(new SendEmail($email));
            return redirect()->route('superadmin.vendors.index')->with([
                'toast_success' => 'Data Success Send Email!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'toast_error' => 'E-Mail Failed!'
            ]);
        }
    }
}
