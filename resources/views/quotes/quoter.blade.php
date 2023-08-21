@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
<div class="container w-full bg-white p-3 rounded-xl shadow-xl">
    <div class="row m-3">
        <div class="container bg-gray-300 rounded-xl p-3">
            <form action="{{route('rack_engineering')}}" method="post">
                @method('POST')
                @csrf
                <div class="col-xs-12 col-sm-6 m-1 gap-2">
                    <div class="form-group">
                        <input type="hidden" name="system" value="{{$Systems}}">
                        <x-jet-label value="* Seleccionar Cliente" />
                        <select class="form-capture uppercase w-full text-xs" name="customer">
                            @foreach ($Customers as $row)
                                <option value="{{$row->id}}" @if ($row->id == old('customer')) selected @endif >{{$row->customer}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='customer' />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 m-1 gap-2">
                    <button type="submit" class="btn btn-green mb-2">
                        <i class="fa-solid fa-circle-arrow-right"></i>&nbsp; &nbsp; Continuar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop