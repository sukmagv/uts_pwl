@extends('layouts.template')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">SUPPLIER</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Kios Sahabat Tani</a></li>
                <li class="breadcrumb-item active">Supplier</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tabel Data Supplier</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <a href="{{url('supplier/create')}}" class="btn btn-sm btn-success my-2">Add Data</a>
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Action</th>
          </tr>
          </thead>

          <tbody>
          @if($sp->count()>0)
                @foreach ($sp as $i => $s)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$s->nama}}</td>
                    <td>{{$s->alamat}}</td>
                    <td>{{$s->no_tlp}}</td>
                    <td>
                      <a href="{{url('/supplier/'. $s->id.'/edit/')}}"
                      class="btn btn-sm btn-warning">Edit</a>

                      <form method="POST" action="{{url('/supplier/'.$s->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              @else
                <tr><td colspan="6" class="text-center">Data Tidak Ada</td></tr>
              @endif
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection