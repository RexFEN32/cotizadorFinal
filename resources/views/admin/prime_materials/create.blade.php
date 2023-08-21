@extends('adminlte::page')

@section('title', 'PRODUCTOS')

@section('content_header')
<i class="fa-solid fa-barcode"></i>&nbsp; Producto (Materia Prima / Materiales)</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Producto:
            </h5>
        </div>
        <form action="{{ route('prime_materials.store')}}" method="POST">
        @csrf
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-sm-12 p-2 shadow-lg gap-2">
                <div class="form-group">
                    <x-jet-label value="* Producto" />
                    <x-jet-input type="text" name="product" class="w-full text-xs uppercase" value="{{old('product')}}"/>
                    <x-jet-input-error for='product' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* SKU" />
                    <x-jet-input type="text" name="sku" class="w-full text-xs uppercase" value="{{old('sku')}}"/>
                    <x-jet-input-error for='sku' />
                </div>
                <div class="form-group">
                    <x-jet-label value="Especificaciones" />
                    <x-jet-input type="text" name="especifications" class="w-full text-xs uppercase" value="{{old('especifications')}}"/>
                    <x-jet-input-error for='especifications' />
                </div>
                <div class="form-group">
                    <x-jet-label value="Unidad de Medida" />
                    <x-jet-input type="text" name="measurement_unit" class="w-full text-xs uppercase" value="{{old('measurement_unit')}}"/>
                    <x-jet-input-error for='measurement_unit' />
                </div>
                <div class="form-group">
                    <x-jet-label value="Descripción" />
                    <x-jet-input type="text" name="description" class="w-full text-xs uppercase" value="{{old('description')}}"/>
                    <x-jet-input-error for='description' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Costo" />
                    <x-jet-input type="number" step="0.01" name="cost" class="w-full text-xs" value="{{old('cost')}}"/>
                    <x-jet-input-error for='cost' />
                </div>
                
            </div>
            <div class="col-12 text-right p-2 shadow-lg gap-2">
                <a href="{{ route('prime_materials.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>
                <button type="submit" class="btn btn-red mb-2">
                    <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
            </div>
        </div>
        </form>
    </div>
@stop

@section('css')
    
@stop

@section('js')

@stop