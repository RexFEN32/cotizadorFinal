@extends('adminlte::page')

@section('title', 'FACTOR')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-edit"></i>&nbsp; Editar Factor</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Editar Factor
            </h5>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['factors.update',$Factors->id]]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Descripción" />
                    {!! Form::text('description',$Factors->description, ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='description' />
                </div>
            </div>
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Factor" />
                    {!! Form::number('factor',$Factors->factor, ['class'=>'inputjet w-full text-xs', 'step'=>'0.1']) !!}
                    <x-jet-input-error for='factor' />
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('factors.index')}}" class="btn btn-green mb-2">
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
    
@stop