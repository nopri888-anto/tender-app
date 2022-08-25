
      @extends('layouts.app')

      @section('content')
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">User</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Superadmin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      User
                    </li>
                  </ol>
                  
                </nav>
              </div>
            </div>
          </div>
          <a href="{{route('superadmin.user.create')}}" class="btn btn-primary">Add User</a>
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
                          <th>Username</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $key=> $user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>@if ($user->is_role == 1)Superadmin @elseif($user->is_role == 2)Admin @elseif($user->is_role == 3)Penyedia
                                @endif</td>
                            <td><a href="{{route('superadmin.user.edit',$user->id)}}" class="btn btn-sm btn-warning">Edit</a></td>
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
      
      