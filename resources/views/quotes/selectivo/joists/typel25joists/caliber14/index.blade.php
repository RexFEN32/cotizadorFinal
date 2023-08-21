@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            {!! Form::open(['method'=>'POST','route'=>['typel25joists_caliber14.calc']]) !!}
            <input type="hidden" name="Quotation_Id" value="{{$Quotation_Id}}">
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                <div class="col-sm-6 col-xs-12">
                    <h2><i class="fa-solid fa-crop-simple"></i>&nbsp;Vigas Tipo L 2.5 Calibe 14</h2>
                    <span>Favor de Seleccionar y llenar los campos solicitados para realizar la cotización.</span>
                    <div class="card-body text-center">
                        <img src="{{asset('vendor/img/postes/logo.png')}}" class="img-thumbnail img-fluid max-h-80 rounded mx-auto d-block" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group p-2">
                        <x-jet-label value="* Cantidad de Vigas" />
                        <input type="number" name="amount" class="inputjet w-full text-xs uppercase" value="{{ old('amount') }}" />
                        <x-jet-input-error for='amount' /><br>
                        
                        <x-jet-label value="* Capacidad de carga requerida por par de vigas (Kg)" />
                        <input type="number" name="weight" class="inputjet w-full text-xs uppercase" />
                        <x-jet-input-error for='weight' /><br>

                        <x-jet-label value="* Tipo de Viga" />
                        <input type="text" name="joist_type" class="inputjet w-full text-xs uppercase" value="{{$Joists->joist}}" />
                        <x-jet-input-error for='joist_type' /><br>

                        <x-jet-label value="* Largo en metros" />
                        <select name="length" class="inputjet w-full text-xs uppercase">
                            @foreach ($Lengths as $row)
                                <option value="{{$row->length}}"@if (old('length')==$row->length) selected @endif>{{$row->length}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='length' /><br>

                        <x-jet-label value="* Seleccione el Calibre" />
                        <select name="caliber" class="inputjet w-full text-xs uppercase">
                            @foreach ($Calibers as $row)
                                <option value="{{$row->caliber}}"@if (old('caliber')==$row->caliber) selected @endif>{{$row->caliber}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='caliber' /><br>
                    </div>
                    <div class="form-group p-2 gap-2 flex items-center">
                        <button type="submit" class="btn btn-blue mb-2">
                            <i class="fa-solid fa-calculator fa-xl"></i>&nbsp; Calcular
                        </button>
                        <a href="{{route('menujoists.show', $Quotation_Id)}}" class="btn btn-black mb-2">
                            <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Cancelar
                        </a>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    @if (session('no_existe') == 'ok')
        <script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/no_existe.js') }}"></script>
    @endif
@stop