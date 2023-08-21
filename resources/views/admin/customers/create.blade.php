@extends('adminlte::page')

@section('title', 'CLIENTES')

@section('content_header')
    <h1 class="font-bold"><i class="fas fa-building"></i>&nbsp; Cliente</h1>
@stop

@section('content')
    <div class="container bg-gray-300 shadow-lg rounded-lg">
        <div class="row rounded-b-none rounded-t-lg shadow-xl bg-white">
            <h5 class="card-title p-2">
                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Cliente:
            </h5>
        </div>
        <form action="{{ route('customers.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row rounded-b-lg rounded-t-none mb-4 shadow-xl bg-gray-300">
            <div class="col-xs-12 col-sm-6 p-2 shadow-lg gap-2">
                <input type="hidden" name="id"/>
                <div class="form-group">
                    <x-jet-label value="* Clasificación de Cliente" />
                    <select class="customer_classification form-capture uppercase w-full text-xs" name="customer_classification">
                        @foreach ($CustomerClassifications as $row)
                            <option value="{{$row->id}}" @if ($row->id == old('customer_classification')) selected @endif >{{$row->customer_classification}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for='customer_classification' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Tipo de Cliente" />
                    <select class="form-capture uppercase w-full text-xs" name="customer_type">
                        @foreach ($CustomerTypes as $row)
                            <option value="{{$row->id}}" @if ($row->id == old('customer_type')) selected @endif>{{$row->customer_type}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for='customer_type' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Cliente" />
                    <x-jet-input type="text" name="customer" class="w-full text-xs uppercase" value="{{old('customer')}}"/>
                    <x-jet-input-error for='customer' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Sede" />
                    <x-jet-input type="text" name="campus" class="w-full text-xs uppercase" value="{{old('campus')}}"/>
                    <x-jet-input-error for='campus' />
                </div>
                <div class="form-group">
                    <x-jet-label value="RFC" />
                    <x-jet-input type="text" name="rfc" class="w-full text-xs uppercase" value="{{old('rfc')}}"/>
                    <x-jet-input-error for='rfc' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Estado" />
                    <x-jet-input type="text" name="state" class="w-full text-xs uppercase" value="{{old('state')}}"/>
                    <x-jet-input-error for='state' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Ciudad" />
                    <x-jet-input type="text" name="city" class="w-full text-xs uppercase" value="{{old('city')}}"/>
                    <x-jet-input-error for='city' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Colonia" />
                    <x-jet-input type="text" name="suburb" class="w-full text-xs uppercase" value="{{old('suburb')}}"/>
                    <x-jet-input-error for='suburb' />
                </div>
                
            </div>
            <div class="col-xs-12 col-sm-6 p-2 shadow-lg gap-2">
                <div class="form-group">
                    <x-jet-label value="* Dirección" />
                    <x-jet-input type="text" name="address" class="w-full text-xs uppercase" value="{{old('address')}}"/>
                    <x-jet-input-error for='address' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Número Exterior" />
                    <x-jet-input type="text" name="outdoor" class="w-full text-xs uppercase" value="{{old('outdoor')}}"/>
                    <x-jet-input-error for='outdoor' />
                </div>
                <div class="form-group">
                    <x-jet-label value="Número Interior" />
                    <x-jet-input type="text" name="indoor" class="w-full text-xs uppercase" value="{{old('indoor')}}"/>
                    <x-jet-input-error for='indoor' />
                </div>
                <div class="form-group">
                    <x-jet-label value="C.P." />
                    <x-jet-input type="text" name="zip_code" class="w-full text-xs uppercase" value="{{old('zip_code')}}"/>
                    <x-jet-input-error for='zip_code' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Email Coorporativo" />
                    <x-jet-input type="text" name="email" class="w-full text-xs uppercase" value="{{old('email')}}"/>
                    <x-jet-input-error for='email' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Teléfono" />
                    <x-jet-input type="text" name="telephone" class="w-full text-xs uppercase" value="{{old('telephone')}}"/>
                    <x-jet-input-error for='telephone' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Sector" />
                    <select class="form-capture uppercase w-full text-xs" name="sector">
                        @foreach ($Sectors as $row)
                            <option value="{{$row->id}}" @if ($row->id == old('sector')) selected @endif>{{$row->sector}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for='sector' />
                </div>
                <div class="form-group">
                    <x-jet-label value="* Vendedor" />
                    <select class="form-capture uppercase w-full text-xs" name="user">
                        @foreach ($Users as $row)
                            <option value="{{$row->id}}" @if ($row->id == old('user')) selected @endif>{{$row->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for='user' />
                </div>
            </div>
            <div class="col-12 text-right p-2 shadow-lg gap-2">
                <a href="{{ route('customers.index')}}" class="btn btn-green mb-2">
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