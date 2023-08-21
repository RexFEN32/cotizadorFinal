@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                {!! Form::open(['method'=>'POST','route'=>['double_deep_floors.calc']]) !!}
                <input type="hidden" name="Quotation_Id" value="{{$Quotation_Id}}">
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <h2><i class="fa-solid fa-puzzle-piece"></i>&nbsp;Pisos</h2>
                        <span>Favor de Seleccionar y llenar los campos solicitados para realizar la cotización.</span>
                        <div class="card-body text-center">
                            <img src="{{asset('vendor/img/postes/logo.png')}}" class="img-thumbnail img-fluid max-h-80 rounded mx-auto d-block" alt="">
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="form-group p-2">
                            <x-jet-label value="* Cantidad" />
                            <input type="number" name="amount" class="inputjet w-full text-xs uppercase" value="{{ old('amount') }}" />
                            <x-jet-input-error for='amount' /><br>
                            <x-jet-label value="* Largo" />
                            <select name="length" class="js_select2 inputjet w-full text-xs uppercase">
                                @foreach ($Floor as $row)
                                    <option value="{{$row->id}}"@if (old('length')==$row->length) selected @endif>{{$row->length}}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for='length' /><br>
                            <x-jet-label value="* Peralte" />
                            <select name="camber" class="js_select2 inputjet w-full text-xs uppercase">
                                <option value="10 CM DE FRENTE"@if (old('camber')=="10 CM DE FRENTE") selected @endif>10 CM DE FRENTE</option>
                                <option value="20 CM DE FRENTE"@if (old('camber')=="20 CM DE FRENTE") selected @endif>20 CM DE FRENTE</option>
                            </select>
                            <x-jet-input-error for='camber' /><br>
                        </div>
                        <div class="form-group p-2 gap-2 flex items-center">
                            <button type="submit" class="btn btn-blue mb-2">
                                <i class="fa-solid fa-calculator fa-xl"></i>&nbsp; Calcular
                            </button>
                            <a href="{{route('double_deep.show', $Quotation_Id)}}" class="btn btn-black mb-2">
                                <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Cancelar
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
@stop

@section('js')
    @if (session('no_existe') == 'ok')
        <script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/no_existe.js') }}"></script>
    @endif
@stop