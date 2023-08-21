@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            <div  class="row bg-white p-4 shadow-lg rounded-lg">
                {!! Form::open(['method'=>'POST', 'route' =>['selectivo_fiut_add']]) !!}
                <input type="hidden" name="Quotation_Id" value="{{$Quotation_Id}}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Instalación</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <x-jet-label value="* Se cobra Instalación" />
                                    <select name="install" id="install" class="js_select2 inputjet w-full text-xs uppercase">
                                        <option value="SI"@if (old('install')=="SI") selected @endif>SI</option>
                                        <option value="NO"@if (old('install')=="NO") selected @endif>NO</option>
                                        <option value="INCLUIDA"@if (old('install')=="INCLUIDA") selected @endif>INCLUIDA</option>
                                    </select>
                                    <x-jet-input-error for='install' /><br>
                                </div>
                                <div class="form-group" id="DivInstall">
                                    {{-- <x-jet-label value="* Importe Instalación" />
                                    @if($Installations) 
                                        <input type="number" name="install_price" class="inputjet w-full text-xs uppercase" value="{{ $Installations->price }}" />
                                    @else
                                        <input type="number" name="install_price" class="inputjet w-full text-xs uppercase" value="{{ old('install_price') }}" />
                                    @endif
                                    <x-jet-input-error for='install_price' /><br>  --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Desglose de Instalación</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="col-sm-12 text-right">
                                                    <a href="{{ route('quotation_installs.show', $Quotation_Id)}}" class="btn btn-green">
                                                        <i class="fas fa-plus-circle"></i>&nbsp; Agregar
                                                    </a>
                                                </div>
                                                <div class="w-100">&nbsp;</div>
                                                <div class="col-sm-12 table-responsive text-xs">
                                                    <table class="table tableinstalls table-striped align-middle">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>Cantidad</th>
                                                                <th>Descripción</th>
                                                                <th>Costo</th>
                                                                <th>Importe</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($QuotationInstalls as $row)
                                                            <tr>
                                                                <td>{{$row->amount}}</td>
                                                                <td>{{$row->description}}</td>
                                                                <td class="text-end">$ {{number_format(($row->cost),2)}}</td>
                                                                <td class="text-end">$ {{number_format(($row->import),2)}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="text-end font-bold text-lg">
                                                                <td colspan="4">
                                                                    Total de Instalación: &nbsp;
                                                                    $ @if ($TotalImportInstall <> "")
                                                                    {{number_format($TotalImportInstall,2)}}
                                                                    <input type="hidden" name="TotalImportInstall" value="{{number_format($TotalImportInstall,2)}}">
                                                                    @else
                                                                    <input type="hidden" name="TotalImportInstall" value="0">
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <x-jet-input-error for='TotalImportInstall' /><br>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="card-footer text-sm">
                                            <span class="font-bold">Mostar desglose en reporte: &nbsp;</span>
                                            <input type="radio" name="breakdown_install" id="breakdown_install" value="Sí" checked> Sí  &nbsp;&nbsp; 
                                            <input type="radio" name="breakdown_install" id="breakdown_install" value="No"> No
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3>Desinstalación</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <x-jet-label value="* Se cobra Desinstalación" />
                                    <select name="uninstall" id="uninstall" class="js_select2 inputjet w-full text-xs uppercase">
                                        <option value="SI"@if (old('uninstall')=="SI") selected @endif>SI</option>
                                        <option value="NO"@if (old('uninstall')=="NO") selected @endif>NO</option>
                                        <option value="INCLUIDA"@if (old('uninstall')=="INCLUIDA") selected @endif>INCLUIDA</option>
                                    </select>
                                    <x-jet-input-error for='uninstall' /><br>
                                </div>
                                <div class="form-group" id="DivUnInstall">
                                    {{-- <x-jet-label value="* Importe Desinstalación" />
                                    @if($Uninstalls)
                                        <input type="number" name="uninstall_price" class="inputjet w-full text-xs uppercase" value="{{ $Uninstalls->price }}" />
                                    @else
                                        <input type="number" name="uninstall_price" class="inputjet w-full text-xs uppercase" value="{{ old('uninstall_price') }}" />
                                    @endif
                                    <x-jet-input-error for='uninstall_price' /><br> --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Desglose de la Desinstalación</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="col-sm-12 text-right">
                                                    <a href="{{ route('quotation_uninstalls.show', $Quotation_Id)}}" class="btn btn-green">
                                                        <i class="fas fa-plus-circle"></i>&nbsp; Agregar
                                                    </a>
                                                </div>
                                                <div class="w-100">&nbsp;</div>
                                                <div class="col-sm-12 table-responsive text-xs">
                                                    <table class="table tableuninstalls table-striped align-middle">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th>Cantidad</th>
                                                                <th>Descripción</th>
                                                                <th>Costo</th>
                                                                <th>Importe</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($QuotationUninstalls as $row)
                                                            <tr>
                                                                <td>{{$row->amount}}</td>
                                                                <td>{{$row->description}}</td>
                                                                <td class="text-end">$ {{number_format(($row->cost),2)}}</td>
                                                                <td class="text-end">$ {{number_format(($row->import),2)}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="text-end font-bold text-lg">
                                                                <td colspan="4">
                                                                    Total de la Desinstalación: &nbsp;
                                                                    $ @if ($TotalImportUninstall <> "")
                                                                    {{number_format($TotalImportUninstall,2)}}
                                                                    <input type="hidden" name="TotalImportUninstall" value="{{number_format($TotalImportUninstall,2)}}">
                                                                    @else
                                                                    <input type="hidden" name="TotalImportUninstall" value="0">
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <x-jet-input-error for='TotalImportUninstall' /><br>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="card-footer text-sm">
                                            <span class="font-bold">Mostar desglose en reporte: &nbsp;</span>
                                            <input type="radio" name="breakdown_uninstall" id="breakdown_uninstall" value="Sí" checked> Sí  &nbsp;&nbsp; 
                                            <input type="radio" name="breakdown_uninstall" id="breakdown_uninstall" value="No"> No
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-2 gap-2 flex items-center">
                            <button type="submit" class="btn btn-blue mb-2">
                                <i class="fa-solid fa-calculator fa-xl"></i>&nbsp; Guardar
                            </button>
                            <a href="{{route('selectivo.show', $Quotation_Id)}}" class="btn btn-black mb-2">
                                <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Cancelar
                            </a>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('js')
<script>
    $('#install').on('change',function(){
        var selectValor = $(this).val();

        if (selectValor == 'NO') {
            $('#DivInstall').hide();
            document.getElementById("uninstall").value = 'NO';
            $('#DivUnInstall').hide();
        }else if (selectValor == 'SI') {
            $('#DivInstall').show();
            document.getElementById("uninstall").value = 'SI';
            $('#DivUnInstall').show();
        }else if (selectValor == 'INCLUIDA') {
            $('#DivInstall').show();
            document.getElementById("uninstall").value = 'INCLUIDA';
            $('#DivUnInstall').show();
        }
    });

    $('#uninstall').on('change',function(){
        var selectValor = $(this).val();

        if (selectValor == 'NO') {
            $('#DivUnInstall').hide();
            // document.getElementById("install").value = 'NO';
            // $('#DivInstall').hide();
        }else if (selectValor == 'SI') {
            $('#DivUnInstall').show();
            // document.getElementById("install").value = 'SI';
            // $('#DivInstall').show();
        }if (selectValor == 'INCLUIDA') {
            $('#DivUnInstall').show();
            // document.getElementById("install").value = 'INCLUIDA';
            // $('#DivInstall').show();
        }
    });
</script>
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tableinstalls.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/mystylesjs/js/tableuninstalls.js') }}"></script>
@stop