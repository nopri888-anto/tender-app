
      @extends('layouts.app')

      @section('content')
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Create Tender</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Superadmin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Create Tender
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>

        

      <div class="container-fluid">
        
            <div class="row">
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
                <form action="{{route('superadmin.tender.store')}}" method="POST">
                    @csrf
                <div class="col">
                    <div class="card">
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="kodeTender" class="col-sm-2 control-label col-form-label">Kode Tender</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="kodeTender" value="{{$kode}}" readonly/>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="namaTender" class="col-sm-2  control-label col-form-label">Name Tender</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="namaTender" placeholder="Name Tender"/>
                                </div>
                              </div>
                            <div class="form-group row">
                              <label for="satuanKerja" class="col-sm-2 control-label col-form-label">Satuan Kerja</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="satuanKerja" placeholder="Satuan Kerja"/>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="lokasiLelang" class="col-sm-2 control-label col-form-label">Lokasi Lelang</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="lokasiLelang" placeholder="Lokasi Lelang"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kab" class="col-sm-2 control-label col-form-label">Kab / Kota</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="kab" placeholder="Kab / Kota"/>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="provinsi" placeholder="Provinsi"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilaiPagu" class="col-sm-2 control-label col-form-label">Nilai PAGU</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="nilaiPagu" placeholder="Nilai PAGU"/>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nilaiHps" placeholder="Nilai HPS"/>
                                  </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenisKontrak" class="col-sm-2 control-label col-form-label">Jenis Kontrak</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="jenisKontrak" placeholder="Jenis Kontrak"/>
                                </div>
                            </div>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success text-white">Save Data</button>
                          </div>
                    </div>
                </div>
                </form> 
            </div>
      </div>

      @endsection
      
      