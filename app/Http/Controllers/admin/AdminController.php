<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataCompany;
use App\Models\DokumenCompany;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listTender()
    {
        $companys = DataCompany::all();
        return view('admin.Penyedia.index',compact('companys'));
    }

    public function validasi(Request $request, $id)
    {
        $dokumen = DataCompany::where('id', '=' , $id)->first();
        return view('admin.Penyedia.validate',compact('dokumen'));
    }

    public function preview($id)
    {
        $dokumen = DokumenCompany::find($id);
        return view('admin.Penyedia.preview', compact('dokumen'));
    }

    public function download(Request $request, $npwp)
    {
        return response()->download(public_path('dokumen/'.$npwp));
    }

    public function updateUser($id_user)
    {
        $dataUser = User::where('id', '=' , $id_user)->first();
        return view('admin.Penyedia.edit', compact('dataUser'));
    }

    public function sendEmail(Request $request, $id)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);

        $email = [
            'title' => 'Akses Login',
            'username' => $request->username,
            'password' => $request->password,
        ];

        $to = $request->email;
        
        $update = User::findOrFail($id);
        $update->username = $request->username;
        $update->password = bcrypt($request->password);
        $update->update();

        if($update){
            $send = Mail::to($to)->send(new SendEmail($email));
            return redirect()->route('admin.penyedia.index')->with([
                'toast_success' => 'Data Success Send Email!'
            ]);
        }else{
            return redirect()->back()->withInput()->with([
                'toast_error' => 'E-Mail Failed!'
            ]);
        }
    }
}
