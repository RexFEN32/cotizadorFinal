@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                <div class="col-sm-6 col-xs-12">
                    <h2><i class="fa-solid fa-crop-simple"></i>&nbsp;MADERAS</h2>
                    <span>Los datos de su cotización se muestran a continuación.</span>
                    <div class="card-body text-center">
                        <div class="container">
                            <img src="{{asset('vendor/img/postes/logo.png')}}" class="img-thumbnail img-fluid max-h-80 rounded mx-auto d-block" alt="">
                            <div class="row mt-2 flex-col items-center">
                                {{-- {!! DNS1D::getBarcodeHTML($Woods->sku, "C128",2,30) !!}
                                {{$Woods->sku}} --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group p-2 text-sm font-semibold table-responsive">
                        <table class="table">
                            <tr class="text-center">
                                <th colspan="2">Datos de Cotización</th>
                            </tr>
                            <tr class="text-right">
                                <td colspan="2">Cantidad: {{$Woods->amount}}</td>
                                {{-- <td>Largo sin cortar: {{$Woods->uncut_front}}</td> --}}
                            </tr>
                            <tr class="text-right">
                                <td colspan="2">Largo cortado: {{$Woods->cut_front}}</td>
                                {{-- <td>Fondo sin cortar: {{$Woods->uncut_background}}</td> --}}
                            </tr>
                            <tr class="text-right">
                                <td>Fondo cortado: {{$Woods->cut_background}}</td>
                                <td>Descripcion: {{$Woods->description}}</td>
                            </tr>
                            <tr class="text-right">
                                {{-- <td>Costo: ${{number_format($Woods->cost, 2)}}</td> --}}
                                <td colspan="2">Tipo de Viga: {{$Woods->joist_type}}</td>
                            </tr>
                            <tr class="font-bold text-right text-1xl">
                                <td colspan="2">Costo x Unidad: ${{number_format($Woods->unit_price, 2)}}</td>
                            </tr>
                            <tr class="font-bold text-right text-1xl">
                                <td colspan="3">Costo Total: ${{number_format($Woods->total_price, 2)}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group p-2 gap-2 flex items-center">
                        <a href="{{route('selectivo_woods.index', $Woods->quotation_id)}}" class="btn btn-blue mb-2">
                            <i class="fa-solid fa-right-left fa-xl"></i>&nbsp; Corregir
                        </a>
                        <a href="{{route('selectivo_woods.add_carrito', $Woods->quotation_id)}}" class="btn btn-black mb-2">
                            <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Guardar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop