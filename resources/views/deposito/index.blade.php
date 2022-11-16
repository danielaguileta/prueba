@extends('adminlte::page')

@section('title', 'Depositos')

@section('content_header')
@stop

@section('content')
<form action="{{route('deposito.index')}}" method="post">
    @csrf
    <div class="col-md-3"><br>
        <div class="card text-white bg-dark mb-3">
            <div class="card-header">
                <h4 class="card-title">Depositar</h4>
            </div>
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad_deposito" name="cantidad_deposito" placeholder="" value="{{old('cantidad_deposito')}}">
                            @error('cantidad_deposito')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-1">
                                <div class="form-group">
                                    <strong><span class="hide" id="" style="color:white;position: absolute;margin-top: 38px;">Lps</span></strong>
                                </div>
                            </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control" rows="3" name="desc" id="desc" placeholder="">{{old('desc')}}</textarea>
                            @error('desc')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Depositar</button>
                </div>

            </div>
</form>
<!-- /.card-body -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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