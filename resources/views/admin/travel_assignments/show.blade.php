@extends('adminlte::page')

@section('title', 'VIÁTICOS')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-edit"></i>&nbsp; Editar Viático</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Editar Viático
            </h5>
        </div>
        {!! Form::open(['method'=>'PUT','route'=>['travel_assignments.update',$TravelAssignments->id]]) !!}
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Descripción" />
                    {!! Form::text('description',$TravelAssignments->description, ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='description' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Unidad" />
                    {!! Form::text('unit',$TravelAssignments->unit, ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='unit' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* SKU" />
                    {!! Form::text('sku',$TravelAssignments->sku, ['class'=>'inputjet w-full text-xs uppercase']) !!}
                    <x-jet-input-error for='sku' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Costo" />
                    {!! Form::number('cost',$TravelAssignments->cost, ['class'=>'inputjet w-full text-xs', 'step'=>'0.01']) !!}
                    <x-jet-input-error for='cost' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Vta." />
                    {!! Form::number('f_vta',$TravelAssignments->f_vta, ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_vta' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Desp." />
                    {!! Form::number('f_desp',$TravelAssignments->f_desp, ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_desp' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Emb." />
                    {!! Form::number('f_emb',$TravelAssignments->f_emb, ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_emb' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* F. Desc." />
                    {!! Form::number('f_desc',$TravelAssignments->f_desc, ['class'=>'inputjet w-full text-xs', 'step'=>'0.001']) !!}
                    <x-jet-input-error for='f_desc' />
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('travel_assignments.index')}}" class="btn btn-green mb-2">
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