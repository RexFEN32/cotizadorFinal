@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            {!! Form::open(['method'=>'POST','route'=>['selectivo_woods.store']]) !!}
            <input type="hidden" name="Quotation_Id" value="{{$Quotation_Id}}">
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                <div class="col-sm-6 col-xs-12">
                    <h2><i class="fa-solid fa-crop-simple"></i>&nbsp;MADERAS</h2>
                    <span>Favor de Seleccionar y llenar los campos solicitados para realizar la cotización.</span>
                    <div class="card-body text-center">
                        <img src="{{asset('vendor/img/postes/logo.png')}}" class="img-thumbnail img-fluid max-h-80 rounded mx-auto d-block" alt="">
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group p-2">
                        <x-jet-label value="* Cantidad" />
                        <input type="number" name="amount" class="inputjet w-full text-xs uppercase" value="{{ old('amount') }}" />
                        <x-jet-input-error for='amount' /><br>

                        <x-jet-label value="* Largo sin cortar (mm)" />
                        <input type="number" step="0.001" name="uncut_front" class="inputjet w-full text-xs uppercase" value="{{ old('uncut_front') }}" />
                        <x-jet-input-error for='uncut_front' /><br>

                        <x-jet-label value="* Largo cortado (mm)" />
                        <input type="number" step="0.001" name="cut_front" class="inputjet w-full text-xs uppercase" value="{{ old('cut_front') }}" />
                        <x-jet-input-error for='cut_front' /><br>

                        <x-jet-label value="* Fondo sin cortar (mm)" />
                        <input type="number" step="0.001" name="uncut_background" class="inputjet w-full text-xs uppercase" value="{{ old('uncut_background') }}" />
                        <x-jet-input-error for='uncut_background' /><br>

                        <x-jet-label value="* Fondo cortado (mm)" />
                        <input type="number" step="0.001" name="cut_background" class="inputjet w-full text-xs uppercase" value="{{ old('cut_background') }}" />
                        <x-jet-input-error for='cut_background' /><br>

                        <x-jet-label value="* Descripción" />
                        <input type="text" name="description" class="inputjet w-full text-xs uppercase" value="{{ old('description') }}" />
                        <x-jet-input-error for='description' /><br>

                        <x-jet-label value="* Costo" />
                        <input type="number" step="0.001" name="cost" class="inputjet w-full text-xs uppercase" value="{{ old('cost') }}" />
                        <x-jet-input-error for='cost' /><br>

                        <x-jet-label value="* Tipo de Viga" />
                        <select name="joist_type" class="inputjet w-full text-xs uppercase">
                            @foreach ($Joists as $row)
                                <option value="{{$row->joist}}"@if (old('joist_type')==$row->joist) selected @endif>{{$row->joist}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='joist_type' /><br>
                    </div>
                    <div class="form-group p-2 gap-2 flex items-center">
                        <button type="submit" class="btn btn-blue mb-2">
                            <i class="fa-solid fa-calculator fa-xl"></i>&nbsp; Calcular
                        </button>
                        <a href="{{route('selectivo.show', $Quotation_Id)}}" class="btn btn-black mb-2">
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