@extends('adminlte::page')

@section('title', 'VIÁTICOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-route"></i>&nbsp; VIÁTICOS</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                {{--@can('CREAR VIATICOS')--}}
                <a href="{{ route('travel_assignments.create')}}" class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Nuevo
                </a>
                {{-- @endcan --}}
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tabletravel_assignments table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>Descripción</th>
                            <th>Unidad</th>
                            <th>SKU</th>
                            <th>Costo</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($TravelAssignments as $row)
                        <tr>
                            <td class="w-70 text-start">{{$row->description}}</td>
                            <td class="w-70 text-start">{{$row->unit}}</td>
                            <td class="w-70 text-start">{{$row->sku}}</td>
                            <td class="w-70 text-end">$ {{$row->cost * $row->ftotal}}</td>
                            
                            <td class="w-20 text-center">
                                <div class="row">
                                    <div class="col-6 text-center w-10">
                                        {{--@can('EDITAR VIATICOS')--}}
                                            <a href="{{ route('travel_assignments.edit', $row->id)}}" class="btn btn-blue w-9 h-9">
                                                <i class="fas fa-edit"></i></span>
                                            </a>
                                        {{-- @endcan --}}
                                    </div>
                                    <div class="col-6 text-center w-10">
                                        {{-- @can('BORRAR VIATICOS')
                                        {!! Form::open(['method'=>'DELETE','route'=>['travel_assignments.destroy', $row->id], 'class'=>'DeleteReg' ]) !!}
                                            {!! Form::button('<i class="fa fa-trash items-center"></i>', ['class' => 'btn btn-red h-9 w-9', 'type' => 'submit']) !!}
                                        {!! Form::close() !!}
                                        @endcan --}}
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
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablecatalogotravel_assignments.js') }}"></script>

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