<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataCompany;
use App\Models\User;
use App\Models\DokumenCompany;

class UtilityController extends Controller
{
    public function actionAuth(Request $request)
    {

        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array(
            'username' =>$request['username'],
            'password' =>$request['password']
            ))){
                if(auth()->user()->is_role == 1){
                    return redirect()->route('superadmin.index')
                    ->with('toast_success','Login as superadmin.');
                }elseif(auth()->user()->is_role == 2){
                    return redirect()->route('admin.index')
                    ->with('toast_success','Login as admin.');
                }elseif(auth()->user()->is_role == 3){
                    return redirect()->route('penyedia.index')
                    ->with('toast_success','Login as Tender.');
                }else{
                    return redirect()->route('login')
                ->with('toast_error','No Access Menu.');
                }
            }else{
                return redirect()->route('login')
                ->with('toast_error','Email-Address And Password Are Wrong.');
            }
    }

    public function regAuth(Request $request)
    {
        $this->validate($request,[
            'namaPerusahaan' => 'required',
            'npwp' => 'required|numeric',
        ]);


        $npwp = DataCompany::where('npwp', '=' , $request->npwp)->first();

        if($npwp){
            return redirect()->route('regis')
                ->with('toast_error','NPWP has used.');
        }else{
            $company = DataCompany::where('namaPerusahaan', '=' , $request->namaPerusahaan)->first();

            if($company){
                return redirect()->route('regis')
                ->with('toast_error','Perusaahan sudah terdaftar.');
            }else{

                $dataUSer = user::create(
                    [
                        'username' => '',
                        'email' => '',
                        'password' => '',
                        'is_role' => 3,
                    ]
                );

                if ($dataUSer) {
                    $dataCompany = DataCompany::create(
                        [
                            'namaPerusahaan' => $request->namaPerusahaan,
                            'alamat' => '',
                            'kab' => '',
                            'provinsi' => '',
                            'kodepos' => '',
                            'notelp' => '',
                            'email' => '',
                            'npwp' => $request->npwp,
                            'status' => 0,
                            'id_user' => $dataUSer->id,
                        ]
                    );

                    if ($dataCompany) {
                        $id = $dataCompany->id;
                        return redirect()->route('biodata',compact('id'))->with([
                            'toast_success' => 'Mohon isi data perusahaan!'
                        ]);
                    } else {
                        return redirect()->back()->withInput()->with([
                            'toast_error' => 'Gagal daftarkan Data!'
                        ]);
                    }


                } else {
                    return redirect()->back()->withInput()->with([
                        'toast_error' => 'Gagal registrasi!'
                    ]);
                }
                
            }
        }
    }

    public function updateData(Request $request, $id)
    {
        $this->validate($request,[
            'alamat' => 'required',
            'kab' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required|numeric',
            'notelp' => 'required|numeric',
            'id_user' => 'required',
        ]);

        $dataCompany = DataCompany::findOrFail($id)->update($request->all());
       
        if($dataCompany){
            $id = $request->id_user;

            $this->validate($request,[
                'email' => 'required',
            ]);

            $user = User::findOrFail($id)->update($request->all());

            if($user){
                $company = $request->id_user;
                $id = DataCompany::where('id_user', '=' , $company)->first();
                return redirect()->route('dokumen',compact('id'))->with([
                    'toast_success' => 'Mohon isi Dokumen perusahaan!'
                ]);
            }else{
                return redirect()->back()->withInput()->with([
                    'toast_error' => 'Gagal Update Email!'
                ]);
            }

        }else{
            return redirect()->back()->withInput()->with([
                'toast_error' => 'Gagal registrasi data!'
            ]);
        }
    }

    public function uploadDokumen(Request $request)
    {
        $this->validate($request,[
            'npwp' => 'required|mimes:pdf,jpg,png,jpeg|max:2048',
            'id_biodata' => 'required',
        ]);

        $namaNpwp = time().'.'.$request->npwp->getClientOriginalExtension();
        $request->npwp->move(public_path('dokumen'),$namaNpwp);

        $dokumen = DokumenCompany::create(
            [
                'npwp' => $namaNpwp,
                'id_biodata' => $request->id_biodata,
            ]
        );

        if($dokumen){
            return redirect()->route('login')->with([
                'toast_success' => 'Data Completed!'
            ]);
        }else{
            return redirect()->back()->withInput()->with([
                'toast_error' => 'Gagal Upload Dokumen!'
            ]);
        }

    }
}
