@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-2">
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="150">
                            <g stroke="white" stroke-width="0.4px">
                                <rect x="0px" y="0px" width="100%" height="100%" fill="#4682B4"/>
                                <text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" fill="#eceeef">Generar nueva Cotización</text>
                            </g>
                        </svg>
                        <div class="card-body">
                            <div class="p-2 text-center">
                                <a href="{{route('open_request')}}" class="btn btn-sm btn-blue">Iniciar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="150">
                            <g stroke="white" stroke-width="0.4px">
                                <rect x="0px" y="0px" width="100%" height="100%" fill="#3CB371"/>
                                <text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" fill="#eceeef">Consulta de Cotizaciones</text>
                            </g>
                        </svg>
                        <div class="card-body">
                            <div class="p-2 text-center">
                                <a href="{{ route('quotations') }}" class="btn btn-sm btn-green">Consultar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop