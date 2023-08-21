@extends('adminlte::page')

@section('title', 'ACTUALIZAR PRECIOS EN TABLAS')

@section('content_header')
    <i class="fa-solid fa-table"></i>&nbsp; Actualizar Precios en Tablas</h1>
@stop

@section('content')
<div class="container-flex m-3 bg-gray-300 shadow-lg rounded-lg">
    <div class="row p-3 rounded-lg shadow-xl bg-white">
        <div class="album py-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Marcos Calibre 12</title>
                                <rect width="100%" height="100%" fill="#000"/>
                                <text x="25%" y="50%" fill="#eceeef" dy=".3em">Marcos Calibre 12</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">
                                    Actualizar Tablas para marcos calibre 12.
                                </p>
                                <div class="p-2 text-center">
                                    <form action="{{route('prime_materials.tables_update')}}" method="POST" onsubmit="validar()">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="var" value="cal12">
                                        <button type="submit" name="save" class="btn btn-sm btn-green">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Marcos Calibre 14</title>
                                <rect width="100%" height="100%" fill="#000"/>
                                <text x="25%" y="50%" fill="#eceeef" dy=".3em">Marcos Calibre 14</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">
                                    Actualizar Tablas para marcos calibre 14.
                                </p>
                                <div class="p-2 text-center">
                                    <form action="{{route('prime_materials.tables_update')}}" method="POST" onsubmit="validar()">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="var" value="cal14">
                                        <button type="submit" name="save" class="btn btn-sm btn-green">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Otras Tablas</title>
                                <rect width="100%" height="100%" fill="#000"/>
                                <text x="30%" y="50%" fill="#eceeef" dy=".3em">Otras Tablas</text>
                            </svg>
                            <div class="card-body">
                                <p class="card-text">
                                    Actualizar datos de Otras Tablas.
                                </p>
                                <div class="p-2 text-center">
                                    <form action="{{route('prime_materials.tables_update')}}" method="POST" onsubmit="validar()">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="var" value="null">
                                        <button type="submit" name="save" class="btn btn-sm btn-green">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
@if (session('update_reg') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/update_reg.js') }}"></script>
@endif

@if (session('no_existe') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/no_existe.js') }}"></script>
@endif

<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/submit_disable.js') }}"></script>
@stop