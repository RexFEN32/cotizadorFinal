@extends('adminlte::page')

@section('title', 'MIEMBROS DE COMISIÓN')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp; Miembros de Comisión</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                <h2 class="font-bold text-lg text-center">
                    Sucursal: {{$Sucursal->company}}
                </h2>
            </div>
            <div class="col-sm-12 text-right">
                <a href="{{ route('miembros.nuevo', $Sucursal->id)}}" class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Nuevo
                </a>
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tablemiembros table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Puesto</th>
                            <th>Móvil</th>
                            <th>E-mail</th>
                            <th>Teléfono</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Miembros as $row)
                            <tr class="uppercase">
                                <td>{{$row->member}}</td>
                                <td>{{$row->place}}</td>
                                <td>{{$row->mobile}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->telephone}}</td>
                                <td class="w-20">
                                    <div class="row">
                                        <div class="col-6 text-center w-10">
                                            <a href="{{ route('miembros.edit', $row->id)}}" class="btn btn-blue w-9 h-9">
                                                <i class="fas fa-edit"></i></span>
                                            </a>
                                        </div>
                                        <div class="col-6 text-center w-10">
                                            <form class="DeleteReg" action="{{ route('miembros.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-red h-9 w-9">
                                                    <i class="fas fa-trash items-center"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablemiembros.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/alert_delete_reg.js') }}"></script>

@if (session('create_reg') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/confirm_create_reg.js') }}"></script>
@endif

@if (session('eliminar') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/confirm_delete_reg.js') }}"></script>
@endif

@if (session('error_delete') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/error_delete_reg.js') }}"></script>
@endif

@if (session('update_reg') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/update_reg.js') }}"></script>
@endif
@stop