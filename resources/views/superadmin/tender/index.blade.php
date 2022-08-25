
      @extends('layouts.app')

      @section('content')
      <div class="page-wrapper">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Tender</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Superadmin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Tender
                    </li>
                  </ol>
                  
                </nav>
              </div>
            </div>
          </div>
          <a href="{{route('superadmin.tender.create')}}" class="btn btn-primary">Add Tender</a>
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
                          <th>Kode Tender</th>
                          <th>Tender</th>
                          <th>Nilai Pagu</th>
                          <th>Nilai HPS</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tenders as $key=> $tender)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><a href="{{route('superadmin.tender.detail',$tender->id)}}">{{$tender->kodeTender}}</a></td>
                            <td>{{$tender->namaTender}}
                            <p class="text-primary" style="text-size: 8px;">Satuan Kerja : {{$tender->satuanKerja}}</p>
                            </td>
                            <td>@currency($tender->nilaiPagu);</td>
                            <td>@currency($tender->nilaiHps);</td>
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
      
      