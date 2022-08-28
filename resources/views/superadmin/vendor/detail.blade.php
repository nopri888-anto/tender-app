
      @extends('layouts.app')

      @section('content')
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Detail Vendor</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Superadmin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Detail Vendor
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>

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
      <div class="container-fluid">
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <form action="#" method="POST">
                            @csrf
                          <div class="modal-body">
                            <p>Data</p>
                            <div class="form-group row">
                              <label for="username" class="col-sm-4 control-label col-form-label">Name Company</label>
                              <div class="col-sm">
                                <input type="text" class="form-control" value="{{$data->nameVendor}}" readonly/>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="npwp" class="col-sm-4  control-label col-form-label">NPWP</label>
                                <div class="col-sm">
                                  <input type="text" class="form-control" readonly value="{{$data->noNpwp}}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="address" class="col-sm-4  control-label col-form-label">Address</label>
                              <div class="col-sm">
                                <textarea type="text" class="form-control" readonly>{{$data->alamat}}, {{$data->kab}}, {{$data->provinsi}}, {{$data->kodepos}} </textarea>
                              </div>
                          </div>
                        <div class="form-group row">
                          <label for="address" class="col-sm-4  control-label col-form-label">E-Mail</label>
                          <div class="col-sm">
                            <input type="text" class="form-control" readonly value="{{$data->email}}"/>
                          </div>
                        </div>
                            <a href="{{route('superadmin.vendors.index')}}" type="button" class="btn btn-primary">Back</a>
                          </div>
                        </form> 
                    </div>
                </div>

                <div class="col-5">
                  <div class="card">
                        <div class="modal-body">
                          <p>Dokumen</p>
                          <div class="form-group row">
                            <label for="username" class="col-sm-6 control-label col-form-label">NPWP</label>
                            <div class="col-sm">
                              <a href="{{route('superadmin.npwp.download',$data->dokumen->npwp)}}" class="btn btn-info btn-sm">
                                <i class="mdi mdi-cloud-download">  Download</i>
                              </a>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="username" class="col-sm-6 control-label col-form-label">Akta Usaha</label>
                            <div class="col-sm">
                              <a href="{{route('superadmin.akta.download',$data->dokumen->aktaUsaha)}}" class="btn btn-info btn-sm">
                                <i class="mdi mdi-cloud-download">  Download</i>
                              </a>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="username" class="col-sm-6 control-label col-form-label">Dokumen Induk Usaha</label>
                            
                            <div class="col-sm">
                              <a href="{{route('superadmin.usaha.download',$data->dokumen->dokumenIndukUsaha)}}" class="btn btn-info btn-sm">
                                <i class="mdi mdi-cloud-download">  Download</i>
                              </a>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="username" class="col-sm-6 control-label col-form-label">Workshop</label>
                            <div class="col-sm">
                              <a href="{{route('superadmin.image.download',$data->dokumen->workshop)}}" class="btn btn-info btn-sm">
                                <i class="mdi mdi-cloud-download">  Download</i>
                              </a>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="username" class="col-sm-6 control-label col-form-label">Surat Pernyataan</label>
                            <div class="col-sm">
                              <a href="{{route('superadmin.pernyataan.download',$data->dokumen->suratPeryantaan)}}" class="btn btn-info btn-sm">
                                <i class="mdi mdi-cloud-download">  Download</i>
                              </a>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="username" class="col-sm-6 control-label col-form-label">Surat Pendaftaran</label>
                            <div class="col-sm">
                              <a href="{{route('superadmin.pendaftaran.download',$data->dokumen->suratPendaftaran)}}" class="btn btn-info btn-sm">
                                <i class="mdi mdi-cloud-download">  Download</i>
                              </a>
                            </div>
                          </div>
                        </div>
                  </div>
              </div>
            </div>
            <a href="{{route('superadmin.vendors.index')}}" type="button" class="btn btn-warning">Validasi</a>
      </div>
@endsection
      
      