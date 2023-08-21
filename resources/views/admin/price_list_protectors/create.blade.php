@extends('adminlte::page')

@section('title', 'LISTA DE PRECIOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Agregar</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar
            </h5>
        </div>
        {!! Form::open(['method'=>'POST','route'=>['price_list_protectors.store']]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Desarrollo Fondo M" />
                    {!! Form::number('background_development',old('background_development'), ['class'=>'inputjet w-full text-xs uppercase', 'step'=>'0.0001']) !!}
                    <x-jet-input-error for='background_development' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Desarrollo Frente M" />
                    {!! Form::number('front_development',old('front_development'), ['class'=>'inputjet w-full text-xs uppercase', 'step'=>'0.0001']) !!}
                    <x-jet-input-error for='front_development' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Pieza" />
                    {!! Form::text('piece',old('piece'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='piece' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Cantidad Nec" />
                    {!! Form::number('amount',old('amount'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='amount' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* SKU" />
                    {!! Form::text('sku',old('sku'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='sku' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Calibre" />
                    {!! Form::text('caliber',old('caliber'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='caliber' />
                </div>
                <div class="form-group">
                    <label for="kg_m2" class="block font-medium text-sm text-gray-700">* Kg / m<sup>2</sup></label>
                    {!! Form::number('kg_m2',old('kg_m2'), ['class'=>'inputjet w-full text-xs uppercase', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='kg_m2' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Vta." />
                    {!! Form::number('f_vta',old('f_vta'), ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_vta' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Desp." />
                    {!! Form::number('f_desp',old('f_desp'), ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_desp' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Emb." />
                    {!! Form::number('f_emb',old('f_emb'), ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_emb' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Desc." />
                    {!! Form::number('f_desc',old('f_desc'), ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_desc' />
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('price_list_protectors.index')}}" class="btn btn-green mb-2">
                    <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                </a>
                <button type="submit" class="btn btn-red mb-2">
                    <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Guardar
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('css')
    
@stop

@section('js')
@if (session('no_existe_acero') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/no_existe_acero.js') }}"></script>
@endif 
@stop