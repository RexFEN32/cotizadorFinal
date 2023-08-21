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
                    <h2><i class="fa-solid fa-crop-simple"></i>&nbsp;Mini Marcos</h2>
                    <span>Los datos de su cotización se muestran a continuación.</span>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <img src="{{asset('vendor/img/postes/logo.png')}}" class="img-thumbnail img-fluid max-h-80 rounded mx-auto d-block" alt="">
                            </div>
                            <div class="row mt-2 flex-col items-center">
                                {!! DNS1D::getBarcodeHTML($Data->sku, "C128",2,30) !!}
                                {{$Data->sku}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="form-group p-2 text-sm font-semibold table-responsive">
                        <table class="table">
                            <tr class="text-center">
                                <th colspan="2">Datos de Cotización</th>
                            </tr>
                            <tr class="text-right">
                                <td>Cantidad: {{$Cantidad}}</td>
                                <td>Calibre: {{$Calibre}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Altura de Pandeo: {{$Pandeo}}</td>
                                <td>Carga en Kg: {{$Peso}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Fondo: {{$Profundidad}}</td>
                                <td>Altura: {{$Altura}}</td>
                            </tr>
                            <tr>
                                <td>Postes: {{$Data->poles}}</td>
                                <td>Travesaños: {{$Data->crossbars}}</td>
                            </tr>
                            <tr>
                                <td>Diagonales: {{$Data->diagonals}}</td>
                                <td>Placas: {{$Data->plates}}</td>
                            </tr>
                            <tr>
                                <td>Calzas: {{$Calzas}}</td>
                                <td>Costo Calzas: ${{number_format($CostoCalza, 2)}}</td>
                            </tr>
                            <tr>
                                <td>Taquetes: {{$Taquetes}}</td>
                                <td>Costo Taquetes: ${{number_format($CostoTaquete, 2)}}</td>
                            </tr>
                            <tr class="font-bold text-right text-1xl">
                                <td colspan="2">Costo x Unidad: ${{number_format($Data->price, 2)}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="form-group p-2 text-sm font-semibold table-responsive">
                        <table class="table">
                            <tr class="text-center">
                                <th colspan="3">Cotización Final</th>
                            </tr>
                            <tr class="text-right">
                                <td>Modelo: {{$Modelo}}</td>
                                <td>Calibre: {{$Calibre}}</td>
                                <td>Carga Total en Kg: {{$Total_Peso}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Total de Postes: {{$Total_Postes}}</td>
                                <td>Total de Travesaños: {{$Total_Travesanos}}</td>
                                <td>Total de Diagonales: {{$Total_Diagonales}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Total de Placas: {{$Total_Placas}}</td>
                                <td>Total Kg: {{$Total_Kg}}</td>
                                <td>Total m2: {{$Total_m2}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Tot. Calzas: {{$TotalCalzas}}</td>
                                <td colspan="2" class="font-bold text-right text-1xl">Costo Total Calzas: ${{number_format($CostoTotalCalza, 2)}}</td>
                            </tr>
                            <tr class="text-right">
                                <td>Tot. Taquetes: {{$TotalTaquetes}}</td>
                                <td colspan="2" class="font-bold text-right text-1xl">Costo Total Taquetes: ${{number_format($CostoTotalTaquete, 2)}}</td>
                            </tr>
                            <tr class="font-bold text-right text-1xl">
                                <td colspan="3">Costo Total: ${{number_format($Precio_Total, 2)}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-group p-2 gap-2 flex items-center">
                        <a href="{{route('miniatureframe.show', $Quotation_Id)}}" class="btn btn-blue mb-2">
                            <i class="fa-solid fa-right-left fa-xl"></i>&nbsp; Corregir
                        </a>
                        <a href="{{route('menuframes.show', $Quotation_Id)}}" class="btn btn-black mb-2">
                            <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Guardar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop