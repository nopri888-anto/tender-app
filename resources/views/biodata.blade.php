@extends('layouts.landing')

@section('content')

<div class="container-fluid bg-dark overflow-hidden px-lg-0" style="margin: 6rem 0;">
    <div class="container contact px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-8 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-lg ps-lg-0">
                    <h6 class="text-primary">Data Company</h6>
                    <form method="POST" action="{{route('updateData',$data->id)}}"> 
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="namaPerusahaan" id="namaPerusahaan" value="{{$data->namaPerusahaan}}" readonly>
                                    <label for="namaPerusahaan">Nama Perusahaan</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="email" id="email" required placeholder="E-mail">
                                    <label for="email">E-mail</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="alamat" id="alamat" required placeholder="Alamat">
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="kab" id="kab" required placeholder="Kabupaten / Kota">
                                    <label for="kab">Kabupaten / Kota</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="provinsi" id="provinsi" required placeholder="Provinsi">
                                    <label for="provinsi">Povinsi</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="kodepos" id="kodepos" required placeholder="Kode Pos">
                                    <label for="kodepos">Kodepos</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="notelp" id="notelp" required placeholder="No Telp">
                                    <label for="notelp">No Telp</label>
                                    <input type="hidden" class="form-control" name="id_user" id="id_user" required value="{{$data->id_user}}">
                                    
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