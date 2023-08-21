@extends('adminlte::page')

@section('title', 'TIPOS CLIENTE')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-edit"></i>&nbsp; Editar Tipos de Cliente</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Editar Tipos de Cliente
            </h5>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['customer_types.update',$customer_type->id]]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Tipos de Cliente" />
                    {!! Form::text('customer_type',$customer_type->customer_type, ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='customer_type' />
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('customer_types.index')}}" class="btn btn-green mb-2">
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