@extends('adminlte::page')

@section('title', 'PRODUCTOS')

@section('content_header')
<h1 class="font-bold"><i class="fa-solid fa-barcode"></i>&nbsp; Producto (Materia Prima / Materiales)</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                {{-- @can('CREAR PRODUCTOS') --}}
                <a href="{{ route('prime_materials.create')}}" class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Nuevo
                </a>
                {{-- @endcan --}}
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tableprimematerials table-striped text-xs">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>SKU</th>
                            <th>Producto</th>
                            <th>Especificaciones</th>
                            <th>UM</th>
                            <th>Descripción</th>
                            <th>Costo</th>
                            <th>Código Barras</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($Productos as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->sku}}</td>
                            <td>{{$row->product}}</td>
                            <td>{{$row->especifications}}</td>
                            <td>{{$row->measurement_unit}}</td>
                            <td>{{$row->description}}</td>
                            <td>${{number_format($row->cost, 2)}}</td>
                            <td>{!! DNS1D::getBarcodeHTML($row->sku, "C128",1.4,22) !!}</td>
                            <td class="w-5">
                                <div class="row">
                                    <div class="col-6 text-center w-10">
                                        {{-- @can('EDITAR PRODUCTOS') --}}
                                        <a href="{{ route('prime_materials.edit', $row->id)}}" class="btn btn-blue w-9 h-9">
                                            <i class="fas fa-edit"></i></span>
                                        </a>
                                        {{-- @endcan --}}
                                    </div>
                                    <div class="col-6 text-center w-10">
                                        {{-- @can('BORRAR PRODUCTOS') --}}
                                        <form class="DeleteReg" action="{{ route('prime_materials.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <input name="user_id" type="hidden" value="{{ $row->id }}" /> --}}
                                            <button type="submit" class="btn btn-red h-9 w-9">
                                                <i class="fas fa-trash items-center"></i>
                                            </button>
                                        </form>
                                        {{-- @endcan --}}
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
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablecatalogoprime_materials.js') }}"></script>

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