@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
<div class="container w-full bg-white p-3 rounded-xl shadow-xl">
    {!! Form::open(['method'=>'POST','route'=>['questionary_charts.store']]) !!}
    <input type="hidden" name="quotation_id" value="{{$Quotation_Id}}">
        <div class="row p-4 rounded-b-lg rounded-xl shadow-xl bg-gray-300">
            <div class="card">
                <div class="card-body">
                    <div class="col-xs-12 p-2 gap-2">
                        <div class="form-group">
                            <x-jet-label value="* Descripción" />
                            {!! Form::text('description',old('description'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='description' />
                        </div>
                        <div class="form-group">
                            <x-jet-label value="* Cantidad" />
                            {!! Form::number('amount',old('amount'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='amount' />
                        </div>
                        <div class="form-group">
                            <x-jet-label value="* Dimensiones" />
                            {!! Form::text('dimensions',old('dimensions'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='dimensions' />
                        </div>
                        <div class="form-group">
                            <x-jet-label value="* Calibre" />
                            {!! Form::text('caliber',old('caliber'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='caliber' />
                        </div>
                        <div class="form-group">
                            <x-jet-label value="* Color" />
                            {!! Form::text('color',old('color'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='color' />
                        </div>
                        <div class="form-group">
                            <x-jet-label value="* Galv" />
                            {!! Form::text('galv',old('galv'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='galv' />
                        </div>
                        <div class="form-group">
                            <x-jet-label value="* Sin Color" />
                            {!! Form::text('colorless',old('colorless'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                            <x-jet-input-error for='colorless' />
                        </div>
                    </div>
                    <div class="col-12 text-right p-2 ">
                        <a href="{{ route('return_material_list', $Quotation_Id) }}" class="btn btn-green mb-2">
                            <i class="fas fa-times fa-2x"></i>&nbsp;&nbsp; Cancelar
                        </a>
                        <button type="submit" class="btn btn-red mb-2">
                            <i class="fas fa-save fa-2x"></i>&nbsp; &nbsp; Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@stop