@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            <div class="col-sm-12 text-right">
                <a href=" " class="btn btn-green">
                    <i class="fas fa-plus-circle"></i>&nbsp; Nuevo
                </a>
            </div>
            <div class="w-100">&nbsp;</div>
            <div class="col-sm-12 table-responsive">
                <table class="table tablequotations table-striped text-xs">
                    <thead>
                        <tr class="text-center">
                            <th>Folio</th>
                            <th>Sistema</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Quotations as $row)
                            <tr class="uppercase">
                                <td>{{$row->invoice}}</td>
                                <td>{{$row->system}}</td>
                                <td>{{$row->type}}</td>
                                <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                <td>{{$row->customer->customer}}</td>
                                <td class="w-20">
                                    <div class="row">
                                        <div class="col-6 text-center w-10">
                                            <a href="{{route('rack_engineering_form', $row->id)}}" class="btn btn-blue w-9 h-9">
                                                <i class="fas fa-edit"></i></span>
                                            </a>
                                        </div>
                                        <div class="col-6 text-center w-10">
                                            <a href="{{route('redaccion', $row->id)}}" class="btn btn-green w-9 h-9" id="{{'quot'.$row->id}}">
                                                <i class="fas fa-file"></i></span>
                                            </a>
                                        </div>
                                        {{--  <div class="col-6 text-center w-10">
                                            <form class="DeleteReg" action=" " method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-red h-9 w-9">
                                                    <i class="fas fa-trash items-center"></i>
                                                </button>
                                                
                                            </form>
                                        </div>  --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')

@if (session('update_reg') == 'ok')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/close_quotation.js') }}"></script>
<script>
    document.getElementById("{{'quot'.$QuotationId}}").focus();
</script>
@endif
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablequotations.js') }}"></script>


@stop