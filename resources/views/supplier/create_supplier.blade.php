@extends('layouts.template')

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Add Data Supplier</h3>

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
        <form method="POST" action="{{$url_form}}">
          @csrf
          {!! (isset($sp))?  method_field('PUT') : '' !!}
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($sp)? $sp->nama : old('nama') }}" name="nama" type="text"/>
            @error('nama')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input class="form-control @error('alamat') is-invalid @enderror" value="{{ isset($sp)? $sp->alamat : old('alamat') }}" name="alamat" type="text"/>
            @error('alamat')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>
          <div class="form-group">
            <label>No Telepon</label>
            <input class="form-control @error('no_tlp') is-invalid @enderror" value="{{ isset($sp)? $sp->no_tlp : old('no_tlp') }}" name="no_tlp" type="text"/>
            @error('no_tlp')
              <span class="error invalid-feedback">{{ $message }} </span>
            @enderror
          </div>

          <div class="form-group">
            <button class="btn btn-sm btn-primary">Save</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
@endsection
