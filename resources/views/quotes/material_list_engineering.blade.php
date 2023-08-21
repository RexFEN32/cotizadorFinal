@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-2">
            <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
                <div class="row m-3 shadow-sm rounded-lg bg-white">
                    <div class="col-xs-12 m-2 text-xs">
                        <div class="col-sm-12 text-right">
                            <a href="{{ route('questionary_charts.show', $Quotation_Id)}}" class="btn btn-green">
                                <i class="fas fa-plus-circle"></i>&nbsp; Agregar Item
                            </a>
                        </div>
                        <div class="table-responsive text center text-xs">
                            <table class="table tablequestionarychart table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>ITEM</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>CANTIDAD</th>
                                        <th>DIMENSIONES</th>
                                        <th>CALIBRE</th>
                                        <th>COLOR</th>
                                        <th>GALV</th>
                                        <th>SIN COLOR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($QuestionaryCharts as $row)
                                    <tr>
                                        <td>{{$row->item}}</td>
                                        <td>{{$row->description}}</td>
                                        <td>{{$row->amount}}</td>
                                        <td>{{$row->dimensions}}</td>
                                        <td>{{$row->caliber}}</td>
                                        <td>{{$row->color}}</td>
                                        <td>{{$row->galv}}</td>
                                        <td>{{$row->colorless}}</td>
                                    </tr>
                                    @endforeach                                        
                                    {{--  <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item01" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description01" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount01" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions01" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber01" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color01" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv01" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color01" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item02" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description02" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount02" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions02" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber02" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color02" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv02" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color02" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item03" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description03" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount03" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions03" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber03" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color03" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv03" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color03" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item04" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description04" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount04" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions04" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber04" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color04" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv04" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color04" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item05" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description05" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount05" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions05" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber05" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color05" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv05" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color05" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item06" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description06" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount06" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions06" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber06" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color06" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv06" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color06" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item07" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description07" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount07" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions07" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber07" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color07" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv07" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color07" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item08" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description08" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount08" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions08" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber08" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color08" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv08" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color08" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item09" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description09" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount09" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions09" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber09" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color09" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv09" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color09" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="item10" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="description10" class="w-flex text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="amount10" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="dimensions10" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="caliber10" class="w-10 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="color10" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="galv10" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group text-xs">
                                                <x-jet-input type="text" name="no_color10" class="w-100 text-xs uppercase"/>
                                            </div>
                                        </td>
                                    </tr>  --}}
                                </tbody>
                            </table>
                        </div>
                        <form action="{{route('layout_quoter')}}" method="post">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="quotations_id" value="{{$Quotation_Id}}">
                            
                            <div class="col-xs-12 col-sm-6 m-1 gap-2">
                                <button type="submit" class="btn btn-green mb-2">
                                    <i class="fa-solid fa-save"></i>&nbsp; &nbsp; Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tablequestionarychart.js') }}"></script>
@stop