
      @extends('layouts.app')

      @section('content')
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Create User</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Superadmin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Create User
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
                <div class="col">
                    <div class="card">
                        <form action="{{route('superadmin.user.update',$user->id)}}" method="POST">
                            @csrf
                          <div class="modal-body">
                            <div class="form-group row">
                              <label for="name" class="col-sm-2 control-label col-form-label">Name</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}"/>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="username" class="col-sm-2 control-label col-form-label">Username</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" name="username" value="{{$user->username}}"/>
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2  control-label col-form-label">E-mail</label>
                                <div class="col-sm-4">
                                  <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
                                </div>
                              </div>
                            <div class="form-group row">
                              <label for="password" class="col-sm-2 control-label col-form-label">Password</label>
                              <div class="col-sm-4">
                                <input type="password" class="form-control" name="password" placeholder="Password"/>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="role" class="col-sm-2 control-label col-form-label">Role</label>
                              <div class="col-sm-3">
                                  <select class="select2 form-select shadow-none"
                                  style="width: 100%; height:36px;" name="is_role">
                                      <option>-- Role --</option>
                                      <option value="1" {{$user->is_role == 1 ? 'selected' : ''}}>Superadmin</option>
                                      <option value="2" {{$user->is_role == 2 ? 'selected' : ''}}>Admin</option>
                                  </select>
                              </div>
                            </div>
                            <a href="{{route('superadmin.user.index')}}" type="submit" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success text-white">Save Data</button>
                          </div>
                        </form> 
                    </div>
                </div>
            </div>
      </div>

      @endsection
      
      