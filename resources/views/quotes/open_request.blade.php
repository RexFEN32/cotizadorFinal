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
                            <rect x="0px" y="0px" width="100%" height="100%" fill="#2563EB"/>
                            <text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" fill="#eceeef">Sistemas de Almacenamiento (Racks)</text>
                        </g>
                    </svg>
                    <div class="card-body">
                        <div class="p-2 text-center">
                            <a href="{{route('quoter',1)}}" class="btn btn-sm btn-blue">Iniciar</a>
                        </div>-
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="150">
                        <g stroke="white" stroke-width="0.4px">
                            <rect x="0px" y="0px" width="100%" height="100%" fill="#2563EB"/>
                            <text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" fill="#eceeef">Manejo de Materiales (conveyors)</text>
                        </g>
                    </svg>
                    <div class="card-body">
                        <div class="p-2 text-center">
                            <a href="" class="btn btn-sm btn-blue">Iniciar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-3">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-2">
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="150">
                        <g stroke="white" stroke-width="0.4px">
                            <rect x="0px" y="0px" width="100%" height="100%" fill="#2563EB"/>
                            <text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" fill="#eceeef">Equipo auxiliar para el almacen</text>
                        </g>
                    </svg>
                    <div class="card-body">
                        <div class="p-2 text-center">
                            <a href="" class="btn btn-sm btn-blue">Iniciar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="150">
                        <g stroke="white" stroke-width="0.4px">
                            <rect x="0px" y="0px" width="100%" height="100%" fill="#2563EB"/>
                            <text x="50%" y="50%" alignment-baseline="middle" text-anchor="middle" fill="#eceeef">Automatización (Pick to light /wms)</text>
                        </g>
                    </svg>
                    <div class="card-body">
                        <div class="p-2 text-center">
                            <a href="" class="btn btn-sm btn-blue">Iniciar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop