@extends('layouts.landing')

@section('content')

<div class="container-fluid bg-dark overflow-hidden px-lg-0" style="margin: 6rem 0;">
    <div class="container contact px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-8 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                @if (count($errors)>0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif


@if(\Session::has('success'))
<div class="alert alert-success">
<p>{{\Session::get('success')}}</p>
</div>
@endif
                <div class="p-lg ps-lg-0">
                    <h6 class="text-primary">Document Company</h6>
                    <span class="text-danger fst-italic fw-lighter">*Format Dokumen PDF,JPG dan PNG (Maksimal 2 MB)</span>
                    <form method="POST" action="{{route('uploadDokumen')}}" enctype="multipart/form-data"> 
                        @csrf
                        <div class="row g-3 mt-3">
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="namaPerusahaan" id="namaPerusahaan" value="{{$data->nameVendor}}" readonly>
                                    <label for="namaPerusahaan">Nama Perusahaan</label>

                                    <input type="hidden" class="form-control" name="id_biodata" id="id_biodata" value="{{$data->id}}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="aktaUsaha" id="aktaUsaha">
                                    <label for="aktaUsaha">AKTA Usaha</label>
                                    <span class="text-danger fst-italic fw-lighter">*Wajib masih berlaku</span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="dokumenIndukUsaha" id="dokumenIndukUsaha">
                                    <label for="dokumenIndukUsaha">Dokumen Induk Berusaha</label>
                                    <span class="text-danger fst-italic fw-lighter">* KBLI 73100 dan KBLI 42102</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nomorIndukUsaha" id="nomorIndukUsaha">
                                    <label for="nomorIndukUsaha">Nomor Induk Berusaha</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="npwp" id="npwp">
                                    <label for="npwp">NPWP Perusahaan</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="noNpwp" id="noNpwp" readonly value="{{$data->noNpwp}}">
                                    <label for="noNpwp">Nomor NPWP</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="fotoWorkshop" id="fotoWorkshop">
                                    <label for="fotoWorkshop">Foto Workshop</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="suratPernyataan" id="suratPernyataan">
                                    <label for="suratPernyataan">Surat Pernyataan</label>
                                    <span class="text-danger fst-italic fw-lighter">*Bermaterai cukup</span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="suratPendaftaran" id="suratPendaftaran">
                                    <label for="suratPendaftaran">Surat Pendaftaran</label>
                                    <span class="text-danger fst-italic fw-lighter">*Bukti Pendaftaran Reklame di BPD</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection