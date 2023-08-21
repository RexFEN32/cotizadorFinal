@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                {!! Form::open(['method'=>'POST','route'=>['singlepieces.calc']]) !!}
                <input type="hidden" name="Quotation_Id" value="{{ $Quotation_Id }}">
                <div class="row">
                    <div class="col-sm-8 col-xs-12">
                        <h2><i class="fa-solid fa-puzzle-piece"></i>&nbsp;Piezas Individuales</h2>
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
                            <x-jet-label value="* Pieza" />
                            <select name="piece" class="js_select2 inputjet w-full text-xs uppercase">
                                @foreach ($SinglePieces as $row)
                                    <option value="{{$row->id}}"@if (old('piece')==$row->piece) selected @endif>{{$row->piece.' '.$row->meters.' '.$row->caliber}}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for='piece' /><br>
                        </div>
                        <div class="form-group p-2 gap-2 flex items-center">
                            <button type="submit" class="btn btn-blue mb-2">
                                <i class="fa-solid fa-calculator fa-xl"></i>&nbsp; Calcular
                            </button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="col-sm-12 text-end">
                    <div class="container">
                        {!! Form::open(['method'=>'POST','route'=>['product_menu']]) !!}
                        <input type="hidden" name="quotations_id" value="{{$Quotation_Id}}">
                        <button type="submit" class="btn btn-black mb-2">
                            <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Menú
                        </button>
                        {!! Form::close() !!}
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