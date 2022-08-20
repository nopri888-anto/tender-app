
      @extends('layouts.app')

      @section('content')

      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Dashboard</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Dashboard
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
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
            </div>
          </div>
        </div>

      <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                      <div class="table-responsive">
                        <table
                          id="zero_config"
                          class="table table-striped table-bordered"
                        >
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Perusahaan</th>
                              <th>NPWP</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{$dokumen->namaPerusahaan}}</td>
                                <td>{{$dokumen->dokumen->npwp}}</td>
                                <td>
                                    {{-- <a href="{{route('admin.penyedia.preview',$dokumen->dokumen->id)}}" target="_blank" class="btn btn-sm btn-success">View</a> --}}
                                    <a href="{{route('admin.penyedia.download',$dokumen->dokumen->npwp)}}" class="btn btn-sm btn-info">Download</a>
                                    <a href="{{route('admin.penyedia.edit',$dokumen->id_user)}}" class="btn btn-sm btn-primary">Validate</a>
                                </td>
                            </tr>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
      </div>

      @endsection
      
      