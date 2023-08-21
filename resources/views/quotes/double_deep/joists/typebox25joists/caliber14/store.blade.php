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
                    <h2><i class="fa-solid fa-crop-simple"></i>&nbsp;Vigas Tipo Caja 2.5 Calibre 14</h2>
                    <span>Los datos de su cotización se muestran a continuación.</span>
                    <div class="card-body text-center">
                        <div class="container">
                            <img src="{{asset('vendor/img/postes/logo.png')}}" class="img-thumbnail img-fluid max-h-80 rounded mx-auto d-block" alt="">
                            <div class="row mt-2 flex-col items-center">
                                {!! DNS1D::getBarcodeHTML($TypeLJoists->sku, "C128",2,30) !!}
                                {{$TypeLJoists->sku}}
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
                                <td colspan="2">Calibre: {{$Caliber}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Cantidad: {{$Amount}}</td>
                                <td>Capacidad de carga: {{$Weight}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Tipo de Viga: {{$JoistType}}</td>
                                <td>Largo en metros: {{$Length}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Peralte: {{$TypeLJoists->camber}}</td>
                                <td>Peso en Kg: {{$TypeLJoists->weight}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>m<sup>2</sup> {{$TypeLJoists->m2}}</td>
                                <td>Largo: {{$TypeLJoists->length}}</td>
                            </tr>
                            <tr class="font-bold text-right text-1xl">
                                <td colspan="2">Costo x Unidad: ${{number_format($TypeLJoists->price, 2)}}</td>
                            </tr>
                            <tr class="font-bold text-right text-1xl">
                                <td colspan="3">Costo Total: ${{number_format($Import, 2)}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group p-2 gap-2 flex items-center">
                        <a href="{{route('double_deep_typebox25joists_caliber14.show', $Quotation_Id)}}" class="btn btn-blue mb-2">
                            <i class="fa-solid fa-right-left fa-xl"></i>&nbsp; Corregir
                        </a>
                        <a href="{{route('double_deep_menujoists.show', $Quotation_Id)}}" class="btn btn-black mb-2">
                            <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Guardar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop