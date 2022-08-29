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
            'unique' => 'NPWP ini Sudah digunakan',
        ];

        $this->validate($request, [
            'nameVendor' => 'required',
            'noNpwp' => 'required|numeric|unique:data_companies,noNpwp',
        ], $messages);

        $dataCompany = DataCompany::create([
            'kodeVendor' => '',
            'nameVendor' => $request->nameVendor,
            'alamat' => '',
            'kab' => '',
            'provinsi' => '',
            'kodepos' => '',
            'notelp' => '',
            'email' => '',
            'noNpwp' => $request->noNpwp,
            'noKtp' => '',
            'status' => 2,
        ]);

        dd($dataCompany);

        if ($dataCompany) {
            return redirect()->route('regis')
                ->with('toast_error', 'NPWP Sudah Digunakan.');
        } else {


            if ($dataCompany) {
                $id = $dataCompany->id;
                $data = DataCompany::find($id);
                return redirect()->route('biodata', compact('data'))->with([
                    'toast_success' => 'Mohon isi data perusahaan!'
                ]);
            } else {
                return redirect()->back()->withInput()->with([
                    'toast_error' => 'Gagal Registrasi!'
                ]);
            }
        }
    }

    public function updateData(Request $request, $id)
    {

        $this->validate($request, [
            'alamat' => 'required',
            'kab' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required',
            'notelp' => 'required',
            'email' => 'required',
            'noKtp' => 'required|numeric',
        ]);

        $data = DataCompany::find($id);
        $ktp = $data->noKtp;

        if ($ktp) {
            return redirect()->back()->withInput()->with([
                'toast_error' => 'KTP Sudah digunakan!'
            ]);
        } else {
            $update = DataCompany::findOrFail($id);

            $update->update([
                'alamat' => $request->alamat,
                'kab' => $request->kab,
                'provinsi' => $request->provinsi,
                'kodepos' => $request->kodepos,
                'notelp' => $request->notelp,
                'email' => $request->email,
                'noKtp' => $request->noKtp,
            ]);

            if ($update) {
                $id = $update->id;
                $data = DataCompany::where('id', '=', $id)->first();
                return redirect()->route('dokumen', compact('data'))->with([
                    'toast_success' => 'Mohon isi Dokumen Perusahaan!'
                ]);
            } else {
                return redirect()->back()->withInput()->with([
                    'toast_error' => 'Gagal Registrasi!'
                ]);
            }
        }
    }


    public function uploadDokumen(Request $request)
    {
        $this->validate($request, [
            'aktaUsaha' => 'required|mimes:pdf,jpg,png,jpeg|max:2048',
            'dokumenIndukUsaha' => 'required|mimes:pdf,jpg,png,jpeg|max:2048',
            'nomorIndukUsaha' => 'required',
            'npwp' => 'required|mimes:pdf,jpg,png,jpeg|max:2048',
            'fotoWorkshop' => 'required|mimes:jpg,png,jpeg|max:2048',
            'suratPernyataan' => 'required|mimes:pdf,jpg,png,jpeg|max:2048',
            'suratPendaftaran' => 'required|mimes:pdf,jpg,png,jpeg|max:2048',
            'id_biodata' => 'required',
        ]);

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
