@extends('layouts.app')

      @section('content')
      <div class="page-wrapper">
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
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Detail Tender</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Superadmin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Detail Tender
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-md">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center">-- Tahap Tender --</h3>
                  <table class="table table-striped table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Tahapan</th>
                            <th>Mulai</th>
                            <th>Berkahir</th>
                            <th>Aksi</th>
                        </tr>
                        <tr> 
                          <form action="{{route('superadmin.tender.post')}}" method="POST">
                            @csrf
                            <td><input type="text" name="step"  class="form-control " ></td>   
                            <td><input type="text" name="awal" placeholder="mm/dd/yyyy" class="form-control mydatepicker" /></td>  
                            <td><input type="text" name="akhir" placeholder="mm/dd/yyyy" class="form-control mydatepicker" /></td>  
                            <td><button type="submit" class="btn btn-success"><i class="mdi mdi-plus-circle-outline"></i></button></td>  
                          </form>
                        </tr>  
                  </table>
                  <a href="{{route('superadmin.tender.index')}}" class="btn btn-info">Kembali</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md">
              <div class="card">
                <div class="card-body">
                  <p class="text-center">Kode Lelang : {{$datas->kodeTender}}</p>
                  <table class="table table-striped table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Tahapan</th>
                            <th>Mulai</th>
                            <th>Berkahir</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach ($datas as $key => $data )
                        <tr> 
                          <td>2</td>   
                          <td>2</td>  
                          <td>3</td>  
                          <td>4</td>  
                      </tr>  
                        @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script type="text/javascript">
   
            var i = 0;
               
            $("#add-btn").click(function(){
           
                ++i;
           
                $("#dynamicAddRemove").append(
                    '<tr>'+
                    '<td>'+
                    '<input type="text" name="moreFields['+i+'][Tahapan]" placeholder="Tahapan Lelang" class="form-control " /></td>'+
                    '<td>'+
                    '<input type="text" name="moreFields['+i+'][Awal]" placeholder="mm/dd/yyyy" class=form-control mydatepicker" /></td>' +
                    '<td>'+
                    '<input type="text" name="moreFields['+i+'][akhir]" placeholder="mm/dd/yyyy" class="form-control mydatepicker" /></td>'+
                    '<td>'+
                    '<button type="button" class="btn btn-danger remove-tr">'+  
                    '<i class="mdi mdi-close-circle-outline"></i></button></td></tr>');
            });
           
            $(document).on('click', '.remove-tr', function(){  
                 $(this).parents('tr').remove();
            });  
           
        </script> --}}
        @endsection