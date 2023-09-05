@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>RESUMEN DE COTIZACION</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            
        <h1>Contenido del Carrito</h1>



        <br>
                    <table class="table table_quotation_protectors table-striped align-middle">
                     <thead >
                        <tr>
                            <th>Producto</th>
                            <th>Unidades</th>
                            
                            <th>Precio Unitario</th>
                            <th>Precio Total</th>
                            <th>-  </th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($Cart_products as $p)
                        <tr>
                            <td>{{$p->name}} </td>
                            <td> {{$p->amount}}</td>
                            
                            <td> $ {{number_format( $p->unit_price,2)}} </td>
                            <td> $ {{number_format( $p->total_price,2)}} </td>
                            <td><div class="col-6 text-center w-10">
                                                <a href="{{ route('shopping_cart.destroy', $p->id)}}" class="btn btn-red w-9 h-9">
                                                <i class="fa fa-trash items-center"></i></span>
                                                    </a>
                                                 
                                               
                                            </div></td>
                        </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                        <tr>
                            <td></td>
                            <td>-</td> 
                            <td>Total</td>
                            <td> $ {{number_format($Cart_products->sum('total_price'),2)}}</td>
                            <td>- </td>
                    </tr>
                     </tfoot>
                    </table>
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-2">
                
            </div>
            <a href="{{route('shopping_cart.vaciar')}}">
                <button type="button" class="btn btn-danger btn-block">Vaciar Carrito</button>
            </a>
        </div>
    </div>
@stop


@section('js')
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/table_quotation_protectors.js') }}"></script>

@stop