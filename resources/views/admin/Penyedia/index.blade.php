
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
                              <th>Email</th>
                              <th>Role</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($companys as $key=> $company)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$company->namaPerusahaan}}</td>
                                <td>{{$company->npwp}}</td>
                                <td>{{$company->user->email}}</td>
                                <td>@if ($company->user->is_role == 1)Superadmin @elseif($company->user->is_role == 2)Admin @elseif($company->user->is_role == 3)Penyedia
                                    @endif</td>
                                <td>
                                    @if ($company->status == 0)Belum Validasi @elseif($company->status == 1)Aktif @elseif($company->status == 3)Pending
                                    @endif
                                </td>
                                <td><a href="{{route('admin.penyedia.validate',$company->id)}}" class="btn btn-sm btn-warning">Edit</a></td>
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
      
      