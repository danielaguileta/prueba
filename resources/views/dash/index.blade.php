@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                @foreach($saldo as $saldo)
                <h4>L {{number_format($saldo->total,2)}}</h4>
                @endforeach
                <p>Saldo Disponible</p>

            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="{{route('movimientos.index')}}" class="small-box-footer">Movimientos<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                @foreach($pendientes as $pendientes)
                <h4>L {{number_format($pendientes->total,2)}}</h4>

                <p>Saldo Pendiente</p>
                @endforeach
            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#saldo_pendiente_modal">Saldo Pendiente<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                @foreach($depositos as $deposito)
                <h4 class="text-white">L {{number_format($deposito->total,2)}}</h4>
                @endforeach
                <p>Depositos</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#deposito_modal">Depositar<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                @foreach($retiros as $retiro)
                <h4>L {{number_format($retiro->total,2)}}</h4>
                @endforeach
                <p>Retiros</p>
            </div>
            <div class="icon">
                <i class="fas fa-cash-register"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#retiro_modal">Retirar<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- Modal RETIRO -->
    <div class="modal fade" id="retiro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">RETIRO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('retiro.store')}}" id="retiroM" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad a retirar" value="{{old('cantidad')}}">
                                    <div id="msgretiro" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <strong><span class="hide" id="" style="color:black;position: absolute;margin-top: 38px;">Lps</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <textarea class="form-control" rows="3" name="desc" id="desc" placeholder="Ingrese un comentario.(Puede dejarlo en blanco tambien)">{{old('desc')}}</textarea>
                                    @error('desc')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary">Retirar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal  DEPOSITO-->
    <div class="modal fade" id="deposito_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">DEPOSITO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('deposito.store')}}" id="depositoM" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad_deposito" name="cantidad_deposito" placeholder="Ingrese la cantidad a depositar" value="{{old('cantidad_deposito')}}">
                                    <div id="depositomsg" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <strong><span class="hide" id="" style="color:black;position: absolute;margin-top: 38px;">Lps</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <textarea class="form-control" rows="3" name="desc" id="desc" placeholder="Ingrese un comentario.(Puede dejarlo en blanco tambien)">{{old('desc')}}</textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary">Depositar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal SALDO PENDIENTE -->
    <div class="modal fade" id="saldo_pendiente_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SALDO PENDIENTE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('saldo_pendiente.store')}}" id="saldo_pendiente" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad_saldo" name="cantidad_saldo" placeholder="Ingrese cantidad" value="{{old('cantidad_saldo')}}">
                                    <div id="msgsaldo" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    <strong><span class="hide" id="" style="color:black;position: absolute;margin-top: 38px;">Lps</span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <textarea class="form-control" rows="3" name="desc" id="desc" placeholder="Ingrese un comentario.(Puede dejarlo en blanco tambien)">{{old('desc')}}</textarea>
                                    @error('desc')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@if(! $pendiente->isEmpty())
<div class="row">
    <section class="col-lg-12 connectedSortable ui-sortable">

        <div class="card-secondary" style="position: relative; left: 0px; top: 0px;">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fa fa-exclamation-circle"></i>
                    Pendiente
                </h3>

            </div>
            <div class="card-body">
                <!--  <style>
                    table.dataTable thead tr {
                        background-color: black;
                    }
                </style> -->
                <table id="clientes" class="display responsive nowrap" style="width:100%">
                    <thead class="">
                        <tr>
                            <th width="2%">FECHA</th>
                            <th width="2%">SALDO</th>
                            <th width="2%">Acciones</th>
                            <th>DESCRIPCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendiente as $pendiente)
                        <tr>
                            <td>{{$pendiente->fecha}}</td>
                            <td>{{$pendiente->cantidad}}</td>
                            <td>
                                <form action="{{route('saldo_pendiente.update' ,$pendiente->id)}}" method="POST" class="pagar">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-dark">
                                        PAGAR
                                    </button>
                                </form>

                            </td>
                            <td>{{$pendiente->descripcion}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @else
    @endif

</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>


<script>
    console.log('Hi!');
</script>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
<!-- <script>
    $(function() {

$("#newModalForm").validate({
  rules: {
    cantidad: {
      required: true,
    },
    action: "required"
  },
  messages: {
    cantidad: {
      required: "El campo cantidad es requerido",
      
    },
    action: "Please provide some data"
  }
});
});
</script>  -->
<script>
    $(document).ready(function() {
        $("#depositoM").submit(function() {
            var query = document.getElementById('cantidad_deposito');
            if (query.value == "") {
                $('#depositomsg').html("El campo es requerido")
                return false; //form will not submit and modal will remain open
            }
            return true; //form will get submitted and modal will close due to page being changed/reloaded
        })
    });
</script>
<script>
    $(document).ready(function() {
        $("#retiroM").submit(function() {
            var query = document.getElementById('cantidad');
            if (query.value == "") {
                $('#msgretiro').html("El campo es requerido")
                return false; //form will not submit and modal will remain open
            }
            return true; //form will get submitted and modal will close due to page being changed/reloaded
        })
    });
</script>

<script>
    $(document).ready(function() {
        $("#saldo_pendiente").submit(function() {
            var query = document.getElementById('cantidad_saldo');
            if (query.value == "") {
                $('#msgsaldo').html("El campo es requerido")
                return false; //form will not submit and modal will remain open
            }
            return true; //form will get submitted and modal will close due to page being changed/reloaded
        })
    });
</script>

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
<script>
    $(document).ready(function() {

        var table = $('#clientes').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            responsive: true,
            paging: false,
            info: false,
            searching: false,
        });
    });
</script>
<script>
    $('.pagar').submit(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Pagar?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5cb85c',
            cancelButtonText: 'No',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, pagar!'
        }).then((result) => {
            if (result.isConfirmed) {
                /*     Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                ) */

                this.submit();
            }
        })

    });
</script>

@stop