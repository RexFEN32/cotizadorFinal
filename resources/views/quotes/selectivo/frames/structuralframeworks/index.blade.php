@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            {!! Form::open(['method'=>'POST','route'=>['structuralframeworks.store']]) !!}
            <input type="hidden" name="Quotation_Id" value="{{$Quotation_Id}}">
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                <div class="col-sm-8 col-xs-12">
                    <h2><i class="fa-solid fa-crop-simple"></i>&nbsp;Marcos Estructurales</h2>
                    <span>Favor de Seleccionar y llenar los campos solicitados para realizar la cotización.</span>
                    <div class="card-body text-center">
                        <img src="{{asset('vendor/img/postes/logo.png')}}" class="img-thumbnail img-fluid max-h-80 rounded mx-auto d-block" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="form-group p-2">
                        <x-jet-label value="* Cantidad de Marcos" />
                        <input type="number" name="amount" class="inputjet w-full text-xs uppercase" value="{{ old('amount') }}" />
                        <x-jet-input-error for='amount' /><br>
                        <x-jet-label value="* Seleccione el Calibre" />
                        <select name="caliber" class="inputjet w-full text-xs uppercase">
                            <option value="EST-3" @if (old('caliber')=='EST-3') selected @endif>EST-3</option>
                            <option value="EST-4" @if (old('caliber')=='EST-4') selected @endif>EST-4</option>
                            {{--  <option value="14" @if (old('caliber')==14) selected @endif>14</option>  --}}
                        </select>
                        <x-jet-input-error for='caliber' /><br>
                        <x-jet-label value="* Altura de Pandeo" />
                        <select name="buckling_structural" class="inputjet w-full text-xs uppercase">
                            @foreach ($buckling_structural as $row)
                                <option value="{{$row->buckling_structural}}" @if (old('buckling_structural')==$row->buckling_structural) selected @endif>{{$row->buckling_structural}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='buckling_structural' /><br>
                        <x-jet-label value="* Capacidad de carga por módulo en Kg" />
                        <input type="number" name="weight" class="inputjet w-full text-xs uppercase" />
                        <x-jet-input-error for='weight' /><br>
                        <x-jet-label value="* Fondo" />
                        <select name="depth_structural" class="inputjet w-full text-xs uppercase">
                            @foreach ($depth_structural as $row)
                                <option value="{{$row->depth_structural}}"@if (old('depth_structural')==$row->depth_structural) selected @endif>{{$row->depth_structural}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='depth_structural' /><br>
                        <x-jet-label value="* Altura" />
                        <select name="height_structural" class="inputjet w-full text-xs uppercase">
                            @foreach ($height_structural as $row)
                                <option value="{{$row->height_structural}}" @if (old('height_structural')==$row->height_structural) selected @endif>{{$row->height_structural}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for='height_structural' /><br>
                    </div>
                    <div class="form-group p-2 gap-2 flex items-center">
                        <button type="submit" class="btn btn-blue mb-2">
                            <i class="fa-solid fa-calculator fa-xl"></i>&nbsp; Calcular
                        </button>
                        <a href="{{route('menuframes.show', $Quotation_Id)}}" class="btn btn-black mb-2">
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