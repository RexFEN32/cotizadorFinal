@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-gray-300 p-3 rounded-xl shadow-xl">
        <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
            <div class="card-body">
                @livewire('add-photos', ['Quotation_Id' => $Quotation_Id])
            </div>
            <div class="card-footer">
                <div class="col-xs-12 col-sm-6 m-1 gap-2">
                    <form action="product_menu" method="post">
                        @method('POST')
                        @csrf
                        <input type="hidden" name="quotations_id" value="{{$Quotation_Id}}">
                        <button type="submit" class="btn btn-green mb-2">
                            <i class="fa-solid fa-circle-arrow-right"></i>&nbsp; &nbsp; Continuar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop