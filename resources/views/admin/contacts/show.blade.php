@extends('adminlte::page')

@section('title', 'MIEMBROS DE COMISIÓN')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-users"></i>&nbsp; Miembros de Comisión</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row p-4 rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-edit"></i>&nbsp; Editar Miembro de Comisión
            </h5>
        </div>
        <form action="{{ route('miembros.update', $Miembro->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="row p-4 rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <input type="hidden" name="id" value="{{$Miembro->id}}">
            <input type="hidden" name="company_id" value="{{$Miembro->company_id}}">
            <div class="col-xs-12 p-2 gap-2">
                <div class="form-group">
                    <x-jet-label value="* Nombre" />
                    <x-jet-input type="text" name="member" class="w-full text-xs uppercase" value="{{$Miembro->member}}"/>
                    <x-jet-input-error for='member' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Puesto" />
                    <x-jet-input type="text" name="place" class="w-full text-xs uppercase" value="{{$Miembro->place}}"/>
                    <x-jet-input-error for='place' />
                </div>
                <div class="form-group">
                    <x-jet-label value="Celular" />
                    <x-jet-input type="text" name="mobile" class="w-full text-xs uppercase" value="{{$Miembro->mobile}}"/>
                    <x-jet-input-error for='mobile' />
                </div>
                <div class="form-group">
                    <x-jet-label value="E-mail" />
                    <x-jet-input type="text" name="email" class="w-full text-xs uppercase" value="{{$Miembro->email}}"/>
                    <x-jet-input-error for='email' />
                </div>
                <div class="form-group">
                    <x-jet-label value="Teléfono" />
                    <x-jet-input type="text" name="telephone" class="w-full text-xs uppercase" value="{{$Miembro->telephone}}"/>
                    <x-jet-input-error for='telephone' />
                </div>
            </div>
            <div class="col-12 text-right p-2 gap-2">
                <a href="{{ route('miembros.principal', $Miembro->company_id)}}" class="btn btn-green mb-2">
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