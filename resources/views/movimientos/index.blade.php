@extends('adminlte::page')

@section('title', 'Movimientos')

@section('content_header')

@stop

@section('content')

<div class="col-md-12"><br>
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Movimientos</h3>
        </div>
        <div class="card-body">
            @csrf
            <div class="card-content">

            </div>

            <table id="clientes" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>DESCRIPCION</th>
                        <th>RETIROS</th>
                        <th>DEPOSITOS</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($movimientos as $movimiento)
                    <tr>
                        <td>{{$movimiento->fecha}}</td>
                        <td>{{$movimiento->descripcion}}</td>
                        <td>L {{number_format($movimiento->retiros,2)}} </td>
                        <td>L {{number_format($movimiento->debitos,2)}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('dashboard.index') }}">
                <i class="fas fa-arrow-circle-left"></i> Regresar
            </a>
        </div>
    </div>
    <!-- /.card -->
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {

        var table = $('#clientes').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            responsive: false,
            paging: false,
            info: false

        });
    });
</script>

<!-- generate datatable on our table -->
<!-- <script>
$(function(){
	//inialize datatable
    var myTable = $('#clientes').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
 
    //assign a new searchbox for out table
    $('#searchBox').on('keyup', function(){
    	myTable.search(this.value).draw();
	});
});

</script> -->

<script>
    @if(Session::has('agregado'))
    toastr.options = {
        "closeButton": false,
        "progressBar": true,
        "timeOut": 3000

    }
    toastr.success("{{ session('agregado') }}");
    @endif
</script>
@stop