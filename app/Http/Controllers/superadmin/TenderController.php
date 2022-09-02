<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TenderModal;
use App\Models\StepBinnding;

class TenderController extends Controller
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
        $datetime = Carbon::now()->format('Y-m-d');
        $date = Carbon::now();

        $tender = TenderModal::count('kodeTender');
        $formatDate = $date->year;
        if ($tender == 0) {
            $nomor = 10001;
            $kode = 'TDR' . $formatDate . $nomor;
        } else {
            $lastTender = TenderModal::all()->last();
            $urut = (int)substr($lastTender->kodeTender, -5) + 1;
            $kode = 'TDR' . $formatDate . $urut;
        }
        return view('superadmin.tender.create', compact('kode'));
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
            'kodeTender' => 'required',
            'namaTender' => 'required',
            'satuanKerja' => 'required',
            'lokasiLelang' => 'required',
            'kab' => 'required',
            'provinsi' => 'required',
            'nilaiPagu' => 'required',
            'nilaiHps' => 'required',
            'jenisKontrak' => 'required',
        ]);

        $tender = TenderModal::create([
            'kodeTender' => $request->kodeTender,
            'namaTender' => $request->namaTender,
            'satuanKerja' => $request->satuanKerja,
            'lokasiLelang' => $request->lokasiLelang,
            'kab' => $request->kab,
            'provinsi' => $request->provinsi,
            'nilaiPagu' => $request->nilaiPagu,
            'nilaiHps' => $request->nilaiHps,
            'jenisKontrak' => $request->jenisKontrak,

            'tanggalTender' => '',
            'tanggalMulaiTender' => '',
            'tanggalSelesaiTender' => '',
            'statusTender' => '',
        ]);

        if ($tender) {
            return redirect()->route('superadmin.tender.index')->with([
                'toast_success' => 'Sukses tambah tender baru!'
            ]);
        } else {
            return redirect()->back()->withInput()->with([
                'toast_error' => 'Gagal tambah tender baru!'
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
        $tender = TenderModal::find($id);
        return view('superadmin.tender.detail', compact('tender'));
    }


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


    public function destroy($id)
    {
        //
    }

    public function step($id)
    {
        // $datas = TenderModal::find($id);
        $datas = TenderModal::find($id);
        return view('superadmin.tender.step', compact('datas'));
    }

    public function storeStep(Request $request)
    {
        $messages = [
            'step.required' => 'Tahapan harus diisi.',
            'awal.required' => 'Tanggal Mulai harus diisi.',
            'akhir.required' => 'Tanggal Akhir diisi.',
        ];
        $this->validate($request, [
            'step' => 'required',
            'awal' => 'required',
            'akhir' => 'required',
        ], $messages);
    }
}
