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
                    <form method="POST" action="{{route('uploadDokumen')}}" enctype="multipart/form-data"> 
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="namaPerusahaan" id="namaPerusahaan" value="{{$data->namaPerusahaan}}" readonly>
                                    <label for="namaPerusahaan">Nama Perusahaan</label>

                                    <input type="hidden" class="form-control" name="id_biodata" id="id_biodata" value="{{$data->id}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="file" class="form-control" name="npwp" id="npwp">
                                    <label for="npwp">NPWP Perusahaan</label>
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