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
                  Send User Access
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          
        </div>
      </div>
    </div>

  <div class="container-fluid">
    <div class="row">
        <div class="col-8">
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
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <form action="{{route('superadmin.vendor.email')}}" method="POST">
                    @csrf
                  <div class="modal-body">
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" readonly value="{{$data->email}}"/>
                        <input type="hidden" class="form-control" name="id_company" readonly value="{{$data->id}}"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-3 text-end control-label col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" placeholder="Username" value="{{$data->username}}"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-3 text-end control-label col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="password" placeholder="Password"/>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 text-end control-label col-form-label">Status Vendor</label>
                        <div class="col-sm-9">
                            <select class="select2 form-select shadow-none" id="status" name="status" style="width: 100%; height: 36px">
                                <option>-- Pilih --</option>
                                <option value="1">Aktif</option>
                                <option value="2">Pending</option>
                                <option value="3">Blok</option>
                            </select>
                        </div>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="notif" class="col-sm-3 text-end control-label col-form-label">Notif</label>
                    <div class="col-sm-9">
                      <textarea type="text" class="form-control" name="remark" id="remark" placeholder="Isikan notif"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send Email</button>
                  </div>
                </form>
                </div>
              </div>
        </div>
    </div>
  </div>

@endsection