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
                    <h6 class="text-primary">Registrasi</h6>
                    <form method="POST" action="{{route('regAuth')}}"> 
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nameVendor" id="nameVendor" required placeholder="Nama Vendor">
                                    <label for="nameVendor">Nama Vendor</label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="noNpwp" id="noNpwp" maxlength="16" required placeholder="Nomor NPWP">
                                    <label for="noNpwp">Nomor NPWP</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Sign up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection