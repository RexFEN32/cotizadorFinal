@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-2">
            <form action="photos_quoter" method="post">
                @method('POST')
                @csrf
                <input type="hidden" name="quotations_id" value="{{$Quotation_Id}}">
                <x-jet-label value="* Captura la información del Layout" />
                {{--  <div id="layout_quoter_editor"></div>  --}}
                <textarea name="layout" class="inputjet w-full" rows="10"></textarea>
                <x-jet-input-error for='layout' />
                <div class="col p-2">
                    <button type="submit" class="btn btn-green mb-2">
                        <i class="fa-solid fa-circle-arrow-right"></i>&nbsp; &nbsp; Continuar
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#layout_quoter_editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop