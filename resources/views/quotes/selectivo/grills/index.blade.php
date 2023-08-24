@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            {!! Form::open(['method'=>'POST','route'=>['selectivo_grills.store']]) !!}
            <input type="hidden" name="Quotation_Id" value="{{$Quotation_Id}}">
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                <div class="col-sm-6 col-xs-12">
                    <h2><i class="fa-solid fa-crop-simple"></i>&nbsp;PARRILLAS</h2>
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

                        <x-jet-label value="* Frente (M)" />
                        <input type="text" name="front" class="inputjet w-full text-xs uppercase" value="{{ old('front') }}" />
                        <x-jet-input-error for='front' /><br>

                        <x-jet-label value="* Fondo (M) " />
                        <select name="background" class="inputjet w-full text-xs uppercase">
                            <option value="0.91"@if (old('background')=="0.91") selected @endif>0.91</option>
                            <option value="1.06"@if (old('background')=="1.06") selected @endif>1.06</option>
                            <option value="1.20"@if (old('background')=="1.20") selected @endif>1.20</option>
                        </select>
                        <x-jet-input-error for='background' /><br>

                        <x-jet-label value="* Acabado" />
                        <select name="color" class="inputjet w-full text-xs uppercase">
                            <option value="PINTADA"@if (old('color')=="PINTADA") selected @endif>PINTADA</option>
                            <option value="GALVANIZADA"@if (old('color')=="GALVANIZADA") selected @endif>GALVANIZADA</option>
                        </select>
                        <x-jet-input-error for='color' /><br>

                        <x-jet-label value="* Costo" />
                        <input type="number" step="0.001" name="cost" class="inputjet w-full text-xs uppercase" value="{{ old('cost') }}" />
                        <x-jet-input-error for='cost' /><br>

                        <x-jet-label value="* Dimensiones del cuadro en in " />
                        <input type="text" name="dimensions" class="inputjet w-full text-xs uppercase" value="{{ old('dimensions') }}" />
                        <x-jet-input-error for='dimensions' /><br>

                        <x-jet-label value="* Capacidad de Carga (Kg)" />
                        <input type="text" name="loading_capacity" class="inputjet w-full text-xs uppercase" value="{{ old('loading_capacity') }}" />
                        <x-jet-input-error for='loading_capacity' /><br>

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