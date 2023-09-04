@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div  class="row bg-white p-4 shadow-lg rounded-lg m-3">
            <div class="card p-4">
                <div class="card-header">
                    <h3 class="font-bold text-lg">Protectores</h3>
                </div>
                <div class="card-body">
                    <div class="col-sm-12 text-right">
                        {{--@can('AGREGAR PROTECTORES')--}}
                        <a href="{{ route('selectivo_protectors.create', $Quotation_Id)}}" class="btn btn-green">
                            <i class="fas fa-plus-circle"></i>&nbsp; Agregar Protector
                        </a>
                        {{-- @endcan --}}
                    </div>
                    <div class="w-100">&nbsp;</div>
                    <div class="col-sm-12 table-responsive text-xs">
                        <table class="table table_quotation_protectors table-striped align-middle">
                            <thead class="text-center">
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Protector</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($QuotationProtectors as $row)
                                <tr>
                                    <td>{{$row->amount}}</td>
                                    <td>{{$row->protector}}</td>
                                    <td class="text-end">$ {{number_format(($row->unit_price),2)}}</td>
                                    <td class="text-end">$ {{number_format(($row->total_price),2)}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6 text-center w-10">
                                               {{-- @can('EDITAR PROTECTORES')--}}
                                                    <a href="{{ route('selectivo_protectors.edit', $row->id)}}" class="btn btn-blue w-9 h-9">
                                                        <i class="fas fa-edit"></i></span>
                                                    </a>
                                                {{-- @endcan --}}
                                            </div>
                                            <div class="col-6 text-center w-10">
                                                {{--@can('BORRAR PROTECTORES')--}}
                                                <a href="{{ route('selectivo_protectors.destroy', $row->id)}}" class="btn btn-red w-9 h-9">
                                                <i class="fa fa-trash items-center"></i></span>
                                                    </a>
                                                 
                                               
                                                {{-- @endcan --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-end font-bold text-sm">
                                        $ @if ($TotalProtectors <> "")
                                        {{number_format($TotalProtectors,2)}}
                                        @endif
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div>
                            <a href="{{route('shopping_cart.add_selectivo_protectors',$Quotation_Id)}}">
                        <button type="button" class="btn btn-outline-primary">Guardar</button>
                        </div></a>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group p-2 gap-2 flex items-center">
                        <a href="{{route('selectivo.show', $Quotation_Id)}}" class="btn btn-black mb-2">
                            <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Menú
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/table_quotation_protectors.js') }}"></script>

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