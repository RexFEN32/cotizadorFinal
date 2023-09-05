@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Fletes</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-sm-12 text-right">
                                        <a href="{{ route('selectivo_transports', $Quotation_Id)}}" class="btn btn-green">
                                            <i class="fas fa-plus-circle"></i>&nbsp; Agregar
                                        </a>
                                    </div>
                                    <div class="w-100">&nbsp;</div>
                                    <div class="col-sm-12 table-responsive text-xs">
                                        <table class="table tabletransports table-striped align-middle">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Cantidad</th>
                                                    <th>Destino</th>
                                                    <th>Estado</th>
                                                    <th>Unidad</th>
                                                    <th>Costo</th>
                                                    <th>Importe</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Packagings as $row)
                                                <tr>
                                                    <td>{{$row->amount}}</td>
                                                    <td>{{$row->destination}}</td>
                                                    <td>{{$row->state}}</td>
                                                    <td>{{$row->unit}}</td>
                                                    <td class="text-end">$ {{number_format(($row->cost),2)}}</td>
                                                    <td class="text-end">$ {{number_format(($row->import),2)}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6" class="text-end font-bold text-sm">
                                                        $ @if ($TotalTransports <> "")
                                                        {{number_format($TotalTransports,2)}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-2 gap-2 flex items-center">
                            <a href="{{route('selectivo_freights.add_carrito', $Quotation_Id)}}" class="btn btn-black mb-2">
                                <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Guardar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tabletransports.js') }}"></script>
@stop