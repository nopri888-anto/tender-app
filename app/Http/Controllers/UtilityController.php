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
            } elseif (auth()->user()->is_role == 3) {
                return redirect()->route('penyedia.index')
                    ->with('toast_success', 'Login as Tender.');
            } else {
                return redirect()->route('login')
                    ->with('toast_error', 'No Access Menu.');
            }
        } else {
            return redirect()->route('login')
                ->with('toast_error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function regAuth(Request $request)
    {
        $messages = [
            'required'=> 'Mohon Data diisi',
            'unique' => 'NIK KTP ini Sudah digunakan',
        ];

        $this->validate($request, [
            'nameVendor' => 'required',
            'noKtp' => 'required|numeric|unique:data_companies,noKtp',
        ], $messages);

        $save = DataCompany::create([
            'kodeVendor' => '',
            'nameVendor' => $request->nameVendor,
            'alamat' => '',
            'kab' => '',
            'provinsi' => '',
            'kodepos' => '',
            'notelp' => '',
            'email' => '',
            'noNpwp' => '',
            'noKtp' => $request->noKtp,
            'status' => 2,
        ]);

        if ($save) {
            $id = $save->id;
            $data = DataCompany::findOrFail($id);

            if($data){
                return redirect()->route('biodata', compact('data'))->with([
                    'toast_success' => 'Mohon isi data perusahaan!'
                ]);
            }else{
                return redirect()->route('regis')
            ->with('error', 'Data Tidak Di temukan.');
            }
            
        } else {
            return redirect()->route('regis')
                ->with('toast_error', 'NIK KTP Sudah digunakan.');
        }
    }
    

    public function updateData(Request $request, $id)
    {
        $messages = [
            'required'=> 'Mohon Data diisi',
            'unique'=> 'NPWP sudah terdaftar',
            'numeric' => 'Harus diisi angka',
        ];

        $this->validate($request, [
            'alamat' => 'required',
            'kab' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required',
            'notelp' => 'required',
            'email' => 'required',
            'noNpwp' => 'required|numeric|unique:data_companies,noNpwp',
        ],$messages);

        $update = DataCompany::find($id)->update([
            'alamat' => $request->alamat,
            'kab' => $request->kab,
            'provinsi' => $request->provinsi,
            'kodepos' => $request->kodepos,
            'notelp' => $request->notelp,
            'email' => $request->email,
            'noNpwp' => $request->noNpwp,
        ]);
        $data = DataCompany::findOrFail($id);

        if ($data) {
                return redirect()->route('dokumen', compact('data'))->with([
                    'toast_success' => 'Mohon isi Dokumen Perusahaan!'
                ]);
        } else {
            return redirect()->back()->withInput()->with([
                'toast_error' => 'Data tidak ditemukan!'
            ]);
        }
    }


    public function uploadDokumen(Request $request)
    {

        $messages = [
            'aktaUsaha.required'=> 'Akta harus diisi',
            'dokumenIndukUsaha.required'=> 'Induk Usaha harus diisi',
            'nomorIndukUsaha.required'=> 'Nomor Induk Usaha harus diisi',
            'npwp.required'=> 'NPWP harus diisi',
            'fotoWorkshop.required'=> 'Workshop harus diisi',
            'suratPernyataan.required'=> 'Surat Pernyataan harus diisi',
            'suratPendaftaran.required'=> 'Surat Pendaftaraan harus diisi',

            'aktaUsaha.mimes'=> 'Format Dokumen Harus PDF',
            'aktaUsaha.max'=> 'Ukuran dokumen lebih besar',

            'dokumenIndukUsaha.mimes'=> 'Format Dokumen Harus PDF',
            'dokumenIndukUsaha.max'=> 'Ukuran dokumen lebih besar',

            'npwp.mimes'=> 'Format harus Foto',
            'npwp.max'=> 'Ukuran dokumen lebih besar',

            'fotoWorkshop.mimes'=> 'Format harus Foto',
            'fotoWorkshop.max'=> 'Ukuran dokumen lebih besar',

            'suratPernyataan.mimes'=> 'Format Dokumen Harus PDF',
            'suratPernyataan.max'=> 'Ukuran dokumen lebih besar',

            'suratPendaftaran.mimes'=> 'Format Dokumen Harus PDF',
            'suratPendaftaran.max'=> 'Ukuran dokumen lebih besar',

        ];

        $this->validate($request, [
            'aktaUsaha' => 'required|mimes:pdf|max:2048',
            'dokumenIndukUsaha' => 'required|mimes:pdf|max:2048',
            'nomorIndukUsaha' => 'required',
            'npwp' => 'required|mimes:jpg,png,jpeg|max:2048',
            'fotoWorkshop' => 'required|mimes:jpg,png,jpeg|max:2048',
            'suratPernyataan' => 'required|mimes:pdf|max:2048',
            'suratPendaftaran' => 'required|mimes:pdf|max:2048',
            'id_biodata' => 'required',
        ],$messages);

        $npwp = 'N' . time() . '.' . $request->npwp->getClientOriginalExtension();
        $request->npwp->move(public_path('dokumen/npwp'), $npwp);

        $akta = 'A' . time() . '.' . $request->aktaUsaha->getClientOriginalExtension();
        $request->aktaUsaha->move(public_path('dokumen/akta'), $akta);

        $dokIndukUsaha = 'D' . time() . '.' . $request->dokumenIndukUsaha->getClientOriginalExtension();
        $request->dokumenIndukUsaha->move(public_path('dokumen/induk'), $dokIndukUsaha);

        $workshop = 'W' . time() . '.' . $request->fotoWorkshop->getClientOriginalExtension();
        $request->fotoWorkshop->move(public_path('dokumen/workshop'), $workshop);

        $pernyataan = 'PR' . time() . '.' . $request->suratPernyataan->getClientOriginalExtension();
        $request->suratPernyataan->move(public_path('dokumen/pernyataan'), $pernyataan);

        $pendaftaran = 'PD' . time() . '.' . $request->suratPendaftaran->getClientOriginalExtension();
        $request->suratPendaftaran->move(public_path('dokumen/pendaftaran'), $pendaftaran);


        $dokumen = DokumenCompany::create(
            [
                'aktaUsaha' => $akta,
                'npwp' => $npwp,
                'dokumenIndukUsaha' => $dokIndukUsaha,
                'nomorIndukUsaha' => $request->nomorIndukUsaha,
                'workshop' => $workshop,
                'suratPeryantaan' => $pernyataan,
                'suratPendaftaran' => $pendaftaran,
                'id_biodata' => $request->id_biodata,
            ]
        );

        if ($dokumen) {
            return redirect()->route('login')->with([
                'toast_success' => 'Data Completed!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'toast_error' => 'Gagal Upload Dokumen!'
            ]);
        }
    }
}
