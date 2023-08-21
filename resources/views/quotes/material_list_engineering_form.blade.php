@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-2">
            <div class="container-flex m-1 bg-gray-300 shadow-lg rounded-lg">
                <div class="row p-3 m-2 rounded-lg shadow-xl bg-white">
                    <div class="col-sm-12 text-right">
                        <form action="{{route('material_list_engineering')}}" method="post">
                            @method('POST')
                            @csrf
                            <button type="submit" class="btn btn-red mb-2">
                                <i class="fa-solid fa-plus-circle"></i>&nbsp; &nbsp; Agregar
                            </button>
                        </form>
                    </div>
                    <div class="w-100">&nbsp;</div>
                    <div class="col-sm-12 table-responsive">
                        <table class="table tablemiembros table-striped">
                            <thead>
                                <tr>
                                    <th>ITEM</th>
                                    <th>DESCRIPCIÓN DE LOS MATERIALES</th>
                                    <th>CANTIDAD</th>
                                    <th>DIMENSIONES</th>
                                    <th>CALIBRE</th>
                                    <th>COLOR</th>
                                    <th>GALV.</th>
                                    <th>SIN COLOR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Materials as $row)
                                    <tr class="uppercase">
                                        <td>{{$row->item}}</td>
                                        <td>{{$row->description}}</td>
                                        <td>{{$row->amount}}</td>
                                        <td>{{$row->dimensions}}</td>
                                        <td>{{$row->caliber}}</td>
                                        <td>{{$row->color}}</td>
                                        <td>{{$row->galv}}</td>
                                        <td>{{$row->no_color}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="col-xs-12 col-sm-6 m-1 gap-2">
                            <form action="layout_quoter" method="post">
                                @method('POST')
                                @csrf
                                <button type="submit" class="btn btn-red mb-2">
                                    <i class="fa-solid fa-circle-arrow-right"></i>&nbsp; &nbsp; Continuar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop