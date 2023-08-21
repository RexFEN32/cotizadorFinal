@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                <div class="col-sm-4 col-xs-12">
                    <h2><i class="fa-solid fa-puzzle-piece"></i>&nbsp;Piezas Individuales</h2>
                    <span>Los datos de su cotización se muestran a continuación.</span>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <img src="{{asset('vendor/img/postes/logo.png')}}" class="img-thumbnail img-fluid max-h-80 rounded mx-auto d-block" alt="">
                            </div>
                            <div class="row mt-2 flex-col items-center">
                                {!! DNS1D::getBarcodeHTML($Piece->sku, "C128",2,30) !!}
                                {{$Piece->sku}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="form-group p-2 text-sm font-semibold table-responsive">
                        <table class="table">
                            <tr class="text-center">
                                <th colspan="2">Cotización Final</th>
                            </tr>
                            <tr>
                                <td class="text-left font-bold">Cantidad: </td>
                                <td>{{$Amount}}</td>
                            </tr>
                            <tr>
                                <td class="text-left font-bold">Pieza: </td>
                                <td>{{$Piece->piece}}</td>
                            </tr>
                            <tr>
                                <td class="text-left font-bold">Metros: </td>
                                <td>{{$Piece->meters}}</td>
                            </tr>
                            <tr>
                                <td class="text-left font-bold">Calibre: </td>
                                <td>{{$Piece->caliber}}</td>
                            </tr>
                            <tr>
                                <td class="text-left font-bold">Kg * M<sup>2</sup>: </td>
                                <td>{{$Piece->kgm2}}</td>
                            </tr>
                            <tr>
                                <td class="text-left font-bold">M<sup>2</sup>: </td>
                                <td>{{$Piece->m2}}</td>
                            </tr>
                            <tr>
                                <td class="text-left font-bold">Costo x Unidad: </td>
                                <td>${{number_format($Piece->price, 2)}}</td>
                            </tr>
                            <tr>
                                <td class="text-left font-bold text-lg">Costo Total: </td>
                                <td class="text-left font-bold text-lg">${{number_format($SubTotal, 2)}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group p-2 gap-2 flex items-center">
                        <a href="{{ route('singlepieces.show', $Quotation_Id) }}" class="btn btn-blue mb-2">
                            <i class="fa-solid fa-right-left fa-xl"></i>&nbsp; Otro
                        </a>
                        {!! Form::open(['method'=>'POST','route'=>['product_menu']]) !!}
                        <input type="hidden" name="quotations_id" value="{{$Quotation_Id}}">
                        <button type="submit" class="btn btn-black mb-2">
                            <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Menú
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop