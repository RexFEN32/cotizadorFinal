@extends('adminlte::page')

@section('title', 'DESTINO')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-edit"></i>&nbsp; Editar Destino</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Editar Destino
            </h5>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['destinations.update',$Destinations->id]]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Destino" />
                    {!! Form::text('destination',$Destinations->destination, ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='destination' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Estado" />
                    {!! Form::text('state',$Destinations->state, ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='state' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Unidad" />
                    <select name="unit" class="inputjet w-full text-xs uppercase">
                        @foreach ($Transports as $row)
                            <option value="{{$row}}" @if($Destinations->unit == $row) selected @endif>{{$row}} </option>
                        @endforeach
                    </select>
                    {{-- {!! Form::select('transports[]',$Transports,@if($Destinations->transport == $Transports), ['class'=>'inputjet w-full text-xs uppercase']) !!} --}}
                    <x-jet-input-error for='unit' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Costo" />
                    {!! Form::number('cost',$Destinations->cost, ['class'=>'inputjet w-full text-xs', 'step'=>'0.01']) !!}
                    <x-jet-input-error for='cost' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Vta." />
                    {!! Form::number('f_vta',$Destinations->f_vta, ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_vta' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Desp." />
                    {!! Form::number('f_desp',$Destinations->f_desp, ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_desp' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Emb." />
                    {!! Form::number('f_emb',$Destinations->f_emb, ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_emb' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Desc." />
                    {!! Form::number('f_desc',$Destinations->f_desc, ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_desc' />
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