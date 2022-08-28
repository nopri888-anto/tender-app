<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataCompany;
use Dflydev\DotAccessData\Data;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DataCompany::find($id);
        return view('superadmin.vendor.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function downloadDokumenNPWP(Request $request, $npwp)
    {
        return response()->download(public_path('dokumen/npwp/' . $npwp));
    }

    public function downloadDokumenAkta(Request $request, $akta)
    {
        return response()->download(public_path('dokumen/akta/' . $akta));
    }


    public function downloadDokumenIndukUsaha(Request $request, $induk)
    {
        return response()->download(public_path('dokumen/induk/' . $induk));
    }

    public function downloadDokumenPendaftaran(Request $request, $daftar)
    {
        return response()->download(public_path('dokumen/pendaftaran/' . $daftar));
    }

    public function downloadDokumenPernyataan(Request $request, $perynataan)
    {
        return response()->download(public_path('dokumen/pernyataan/' . $perynataan));
    }

    public function downloadDokumenImage(Request $request, $image)
    {
        return response()->download(public_path('dokumen/workshop/' . $image));
    }
}
