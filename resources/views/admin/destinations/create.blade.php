@extends('adminlte::page')

@section('title', 'DESTINOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-plus-circle"></i>&nbsp; Agregar Destino</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Destino
            </h5>
        </div>
        {!! Form::open(['method'=>'POST','route'=>['destinations.store']]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Destino" />
                    {!! Form::text('destination',old('destination'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='destination' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Estado" />
                    {!! Form::text('state',old('state'), ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='state' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Unidad" />
                    <select class="inputjet w-full text-xs uppercase" name="unit">
                        @foreach ($Transports as $row)
                            <option value="{{$row->transport}}" @if ($row->transport == old('unit')) selected @endif>{{$row->transport}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for='unit' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Costo" />
                    {!! Form::number('cost',old('cost'), ['class'=>'inputjet w-full text-xs', 'step'=>'0.01']) !!}
                    <x-jet-input-error for='cost' />
                </div>
                
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('destinations.index')}}" class="btn btn-green mb-2">
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