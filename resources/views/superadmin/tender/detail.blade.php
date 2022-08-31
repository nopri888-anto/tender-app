@extends('layouts.app')

      @section('content')
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Detail Tender</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Superadmin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Detail Tender
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center">-- Detail Tender --</h3>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>Kode Tender</td>
                        <td>{{$tender->kodeTender}}</td>
                      </tr>
                      <tr>
                        <td>Nama Tender</td>
                        <td>{{$tender->namaTender}}</td>
                      </tr>
                      <tr>
                        <td>Nilai PAGU</td>
                        <td>@currency($tender->nilaiPagu);</td>
                      </tr>
                      <tr>
                        <td>Nilai HPS</td>
                        <td>@currency($tender->nilaiHps);</td>
                      </tr>
                      <tr>
                        <td>Satuan Kerja</td>
                        <td>{{$tender->satuanKerja}}</td>
                      </tr>
                      <tr>
                        <td>Lokasi Kerja</td>
                        <td>{{$tender->lokasiLelang}}</td>
                      </tr>
                      <tr>
                        <td>Kab / Kota</td>
                        <td>{{$tender->kab}}</td>
                      </tr>
                      <tr>
                        <td>Provinci</td>
                        <td>{{$tender->provinsi}}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kontrak</td>
                        <td>{{$tender->jenisKontrak}}</td>
                      </tr>
                    </thead>
                  </table>
                  <a href="{{route('superadmin.tender.index')}}" class="btn btn-info">Kembali</a>
                  <a href="{{route('superadmin.tender.step',$tender->id)}}" class="btn btn-success text-white">Tambah Tahapan Lelang</a>
                </div>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>

        @endsection