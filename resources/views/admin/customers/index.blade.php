@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users-cog"></i>&nbsp; CLIENTES</h1>
@stop

@section('content')
    <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="col-sm-12 text-right">
                {{-- @can('CREAR CLIENTES') --}}
                <a href="{{ route('customers.create')}}" class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Nueva
                </a>
                {{-- @endcan --}}
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tablecustomers table-striped text-xs font-medium">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Clasificación</th>
                            <th>Tipo</th>
                            <th>Sede</th>
                            <th>RFC</th>
                            <th>Estado</th>
                            <th>Municipio</th>
                            <th>Colonia</th>
                            <th>Calle</th>
                            <th>Exterior</th>
                            <th>Interior</th>
                            <th>CP</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Sector</th>
                            <th>Vendedor</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Customers as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->customer}}</td>
                            <td>{{$row->customer_classification->customer_classification}}</td>
                            <td>{{$row->customer_type->customer_type}}</td>
                            <td>{{$row->campus}}</td>
                            <td>{{$row->rfc}}</td>
                            <td>{{$row->state}}</td>
                            <td>{{$row->city}}</td>
                            <td>{{$row->suburb}}</td>
                            <td>{{$row->address}}</td>
                            <td>{{$row->outdoor}}</td>
                            <td>{{$row->intdoor}}</td>
                            <td>{{$row->zip_code}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->telephone}}</td>
                            <td>{{$row->sector->sector}}</td>
                            <td>{{$row->user->name}}</td>
                            <td class="w-5">
                                <div class="row">
                                    <div class="col-6 text-center w-10">
                                        {{-- @can('EDITAR CLIENTES') --}}
                                        <a href="{{ route('customers.edit', $row->id)}}" class="btn btn-blue w-9 h-9">
                                            <i class="fas fa-edit"></i></span>
                                        </a>
                                        {{-- @endcan --}}
                                    </div>
                                    <div class="col-6 text-center w-10">
                                        {{-- @can('BORRAR CLIENTES') --}}
                                        <form class="DeleteReg" action="{{ route('customers.destroy', $row->id) }}" method="POST">
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
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablecatalogocustomers.js') }}"></script>

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