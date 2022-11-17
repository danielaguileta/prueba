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
                <h5>L {{number_format($saldo->total,2)}}</h5>
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

                <h5>L </h5>

                <p>Saldo Disponible</p>

            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="{{route('movimientos.index')}}" class="small-box-footer">Movimientos<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                @foreach($depositos as $deposito)
                <h5 class="text-white">L {{number_format($deposito->total,2)}}</h5>
                @endforeach
                <p>Depositos</p>
            </div>
            <div class="icon">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#exampleModal2">Depositar<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                @foreach($retiros as $retiro)
                <h5>L {{number_format($retiro->total,2)}}</h5>
                @endforeach
                <p>Retiros</p>
            </div>
            <div class="icon">
                <i class="fas fa-cash-register"></i>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#exampleModal">Retirar<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic.min.css">


@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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


@stop