
      @extends('layouts.app')

      @section('content')
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Vendor</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Superadmin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Vendor
                    </li>
                  </ol>
                  
                </nav>
              </div>
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
                          <th>Vendor</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($companys as $key=> $company)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$company->namaPerusahaan}}
                                <p class="text-info" style="text-size-adjust: 8">NPWP : {{$company->npwp}}</p>
                            </td>
                            <td>{{$company->user->email}}</td>
                            <td>{{$company->alamat}}
                            <p class="text-info">{{$company->kab}}, {{$company->provinsi}}, {{$company->kodepos}}
                                <br>{{$company->notelp}}
                            </p>
                        </td>
                            <td><a href="{{route('superadmin.vendors.detail', $company->id)}}" class="btn btn-sm btn-info">Detail</a></td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
        </div>
      </div>

      @endsection
      
      