@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>CARRITO DE COMPRAS</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
        <h1>Contenido del Carrito</h1>
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-2">
                <div class="col">
                    <div class="card shadow-sm">
                        
                        <div class="card-body">
                           
                        </div>
                    </div>
                </div>
                <div class="col">
                    <table class="table table_quotation_protectors table-striped align-middle">>
                     <thead >
                        <tr>
                            <th>Producto</th>
                            <th>SKU</th>
                            <th>Precio</th>
                        </tr>
                     </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop