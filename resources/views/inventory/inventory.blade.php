@extends('layouts.template')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">INVENTORY</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Kios Sahabat Tani</a></li>
                <li class="breadcrumb-item active">Inventory</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tabel Data Inventory</h3>

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
        <a href="{{url('inventory/create')}}" class="btn btn-sm btn-success my-2">Add Data</a>
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Satuan</th>
          </tr>
          </thead>

          <tbody>
          @if($inventory->count() >0)
                @foreach ($inventory as $i => $n)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$n->nama}}</td>
                    <td>{{$n->harga}}</td>
                    <td>{{$n->stok}}</td>
                    <td>{{$n->satuan}}</td>
                    <td>
                      <a href="{{url('/inventory/'. $n->id.'/edit/')}}"
                      class="btn btn-sm btn-warning">Edit</a>

                      <form method="POST" action="{{url('/inventory/'.$n->id)}}">
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
        {{ $inventory->links() }}
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection