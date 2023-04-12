@extends('layouts.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">INVENTORY</h3>

            {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div> --}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ $url_form }}">
                @csrf
                {!! (isset($in))? method_field('PUT') : ''!!}
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($in)? $in->nama : old('nama') }}" name="nama" type="text" />
                  @error('nama')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input class="form-control @error('harga') is-invalid @enderror" value="{{ isset($in)? $in->harga : old('harga') }}" name="harga" type="text"/>
                  @error('harga')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input class="form-control @error('stok') is-invalid @enderror" value="{{ isset($in)? $in->stok : old('stok') }}" name="stok" type="text"/>
                  @error('stok')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Satuan</label>
                  <input class="form-control @error('satuan') is-invalid @enderror" value="{{ isset($in)? $in->satuan : old('satuan') }}" name="satuan" type="text"/>
                  @error('satuan')
                    <span class="error invalid-feedback">{{ $message }} </span>
                  @enderror
                </div>
                
    
    
                <div class="form-group">
                  <button class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>    
    </div>
    <!-- /.card -->

    </section>
@endsection