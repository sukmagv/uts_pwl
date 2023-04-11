@extends('layout.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Halo</h3>
            <br>
            <h4 class="card-title">Selamat Mumet</h4>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div> 
        </div>
        <div class="card-body">
            Start creating your amazing application!
        </div> 

        <!-- /.card-body -->
         <div class="card=footer">
            Footer
        </div> 

        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

</section>

@endsection
@push('js')
    <script>
        alert('Welcome to home!!')
    </script>
@endpush