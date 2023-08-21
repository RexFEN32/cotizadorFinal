@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-2">
            {{-- <form action="{{route('cuestionario_inicial')}}" method="post">
                @method('POST')
                @csrf --}}
                {!! Form::open(['method'=>'POST','route'=>['cuestionario_inicial']]) !!}
                <input type="hidden" name="quotations_id" value="{{$Quotations->id}}">
                <div class="container bg-gray-300 shadow-sm rounded-xl p-3">
                    <div class="card p-3">
                        <div class="card-title bg-gray-300 m-2 p-2">
                            <h3 class="text-center font-bold h-5">DATOS DE CONCEPTO</h3>
                        </div>
                        <div class="card-body text-sm">
                            <p class="card-text mb-3">PIENSO QUE EL MEJOR SISTEMA PARA MANEJAR MI PRODUCTO ES MEDIANTE UN:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="row">
                                        <div class="col-4 gap-1">
                                            <label><input type="radio" name="a1" value="SISTEMA SELECTIVO" id="a1_1"> SISTEMA SELECTIVO</label><br>
                                            <label><input type="radio" name="a1" value="SIST. CARTON FLOW" id="a1_2"> SIST. CARTON FLOW</label><br>
                                            <label><input type="radio" name="a1" value="CANTILEVER" id="a1_3"> CANTILEVER</label><br>
                                        </div>
                                        <div class="col-4 gap-1">
                                            <label><input type="radio" name="a1" value="SISTEMA DINAMICO" id="a1_4"> SISTEMA DINAMICO</label><br>
                                            <label><input type="radio" name="a1" value="SISTEMA PICKING" id="a1_5"> SISTEMA PICKING</label><br>
                                            <label><input type="radio" name="a1" value="DOBLE PROFUNDIDAD" id="a1_6"> DOBLE PROFUNDIDAD</label><br>
                                        </div>
                                        <div class="col-4 gap-1">
                                            <label><input type="radio" name="a1" value="SISTEMA PUSH BACK" id="a1_7"> SISTEMA PUSH BACK</label><br>
                                            <label><input type="radio" name="a1" value="SISTEMA DRIVE IN & THRU" id="a1_8"> SISTEMA DRIVE IN & THRU</label><br>
                                            <label><input type="radio" name="a1" value="MINI RACK" id="a1_9"> MINI RACK</label><br>
                                        </div>
                                        <div class="col-4 gap-1">
                                            <label><input type="radio" name="a1" value="PASARELA" id="a1_10"> PASARELA</label><br>
                                            <label><input type="radio" name="a1" value="SUGERIR" id="a1_11"> SUGERIR</label><br>
                                        </div>
                                        <div class="col-4 gap-1">
                                            <label><input type="radio" name="a1" value="ENTRE PISO" id="a1_12"> ENTRE PISO</label><br>
                                        </div>
                                        <div class="col-4 gap-1">
                                            <label><input type="radio" name="a1" value="ESTANTERÍA" id="a1_13"> ESTANTERÍA</label><br>
                                        </div>
                                    </div>
                                    <x-jet-input-error for='a1' />
                                </div>
                            </div>
                            <p class="card-text mb-3">DESCRIPCIÓN DE LA OPERACIÓN DEL CLIENTE</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <textarea name="a2" rows="5" class="inputjet w-full text-xs uppercase">{{old('a2')}}</textarea>
                                        <x-jet-input-error for='a2' />
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mb-3">DESCRIPCIÓN DE LA NECESIDAD DEL CLIENTE</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <textarea name="a3" rows="5" class="inputjet w-full text-xs uppercase">{{old('a3')}}</textarea>
                                        <x-jet-input-error for='a3' />
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mb-3">¿POR QUÉ CREO QUE ES LA SOLUCIÓN ADECUADA?</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <textarea name="a4" rows="5" class="inputjet w-full text-xs uppercase">{{old('a4')}}</textarea>
                                        <x-jet-input-error for='a4' />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="grid grid-col-3 text-center">
                                <div class="col-start-2">
                                    <div class="card-title bg-gray-300 m-2 p-2">
                                        <h3 class="text-center font-bold">INFO. DEL PRODUCTO</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-3">¿QUÉ PRODUCTO SE ALMACENA?</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <textarea name="a5" rows="5" class="inputjet text-sm w-full uppercase">{{old('a5')}}</textarea>
                                        <x-jet-input-error for='a5' />
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mb-3">ESTE PRODUCTO LO VOY A ALMACENAR EN:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="row">
                                        <div class="col-12 gap-2 inline-flex">
                                            <select class="inputjet text-sm w-full uppercase" name="a6" id="a6_1">
                                                <option value="BOLSAS">BOLSAS</option>
                                                <option value="ROLLOS">ROLLOS</option>
                                                <option value="BARRIL">BARRIL</option>
                                                <option value="CAJAS">CAJAS</option>
                                                <option value="TARIMAS">TARIMAS</option>
                                                <option value="OTROS">OTROS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <x-jet-input-error for='a6' />
                                </div>
                            </div>
                            <p class="card-text mb-3">SOBRE SALE EL PRODUCTO DE LA TARIMA</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a7" id="a7_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                            <option value="SE INCLUYE EN LAS DIMENSIONES SIGUIENTES">SE INCLUYE EN LAS DIMENSIONES SIGUIENTES</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a7' />
                            <p class="card-text mb-3">ESTE PRODUCTO TIENE LAS DIMENSIONES:  (PESO Y ALTURA INCLUYE TARIMA)</p>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col gap-1 inline-flex">
                                            <div class="form-group">
                                                <x-jet-label value="Frente" />
                                                <x-jet-input type="number" step="0.001" name="a8" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a8' />
                                            </div>
                                            <div class="form-group">
                                                <x-jet-label value="Fondo" />
                                                <x-jet-input type="number" step="0.001" name="a9" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a9' />
                                            </div>
                                            <div class="form-group">
                                                <x-jet-label value="Alto" />
                                                <x-jet-input type="number" step="0.001" name="a10" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a10' />
                                            </div>
                                            <div class="form-group">
                                                <x-jet-label value="Peso" />
                                                <x-jet-input type="number" step="0.001" name="a11" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a11' />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-text mb-3">CANTIDAD DE TARIMAS A ALMACENAR</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">&nbsp;</div>
                            <div class="col-xs-12 col-sm-9">
                                <div class="form-group">
                                    <textarea name="a12" rows="5" class="inputjet text-sm w-full uppercase">{{old('a12')}}</textarea>
                                    <x-jet-input-error for='a12' />
                                </div>
                            </div>
                        </div>
                        <div class="card-title bg-gray-300 m-2 p-2">
                            <h3 class="text-center font-bold h-5">DATOS DEL MONTACARGAS</h3>
                        </div>
                        <p class="card-text mb-3">ALTURA DE LEVANTE</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">&nbsp;</div>
                            <div class="col-xs-12 col-sm-9">
                                <div class="form-group">
                                    <textarea name="a13" rows="5" class="inputjet text-sm w-full uppercase">{{old('a13')}}</textarea>
                                    <x-jet-input-error for='a13' />
                                </div>
                            </div>
                        </div>
                        <p class="card-text mb-3">RADIO DE GIRO</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">&nbsp;</div>
                            <div class="col-xs-12 col-sm-9">
                                <div class="form-group">
                                    <textarea name="a14" rows="5" class="inputjet text-sm w-full uppercase">{{old('a14')}}</textarea>
                                    <x-jet-input-error for='a14' />
                                </div>
                            </div>
                        </div>
                        <p class="card-text mb-3">ANCHO DEL MONTACARGAS</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">&nbsp;</div>
                            <div class="col-xs-12 col-sm-9">
                                <div class="form-group">
                                    <textarea name="a15" rows="5" class="inputjet text-sm w-full uppercase">{{old('a15')}}</textarea>
                                    <x-jet-input-error for='a15' />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="grid grid-col-3 text-center">
                                <div class="col-start-2">
                                    <div class="card-title bg-gray-300 m-2 p-2">
                                        <h3 class="text-center font-bold">TIPOS DE TARIMA Y DIRECCIÓN DE MOVIMIENTO</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-3">&nbsp;</p>
                            <div class="row p-2">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="row">
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/A.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="A" id="a16_1"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/B.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="B" id="a16_2"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/C.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="C" id="a16_3"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/D.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="D" id="a16_4"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/E.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="E" id="a16_5"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/F.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="F" id="a16_6"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/G.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="G" id="a16_7"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/H.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="H" id="a16_8"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                        <div class="col col-xs-12 text-center">
                                            <img src="{{ asset('vendor/img/rack_engineering/I.png')}}" alt=""><br>
                                            <label><input type="radio" name="a16"  value="I" id="a16_9"></label>&nbsp;&nbsp;<br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mb-3">ESTE PRODUCTO USARÁ UNA TARIMA COMO:</p>
                            <div class="row p-2">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="row">
                                        <div class="col-12 gap-1 inline-flex">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <x-jet-label value="HACE CONTACTO AL SUELO COMO LA LETRA:" />
                                                        <x-jet-input type="text" name="a17" class="w-flex uppercase"/>
                                                        <x-jet-input-error for='a17' />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <x-jet-label value="TIENE UN FRENTE DE:" />
                                                        <x-jet-input type="text" name="a18" class="w-flex uppercase"/>
                                                        <x-jet-input-error for='a18' />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <x-jet-label value="TIENE UN FONDO DE:" />
                                                        <x-jet-input type="text" name="a19" class="w-flex uppercase"/>
                                                        <x-jet-input-error for='a19' />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <x-jet-label value="TIENE UN ALTO DE:" />
                                                        <x-jet-input type="text" name="a20" class="w-flex uppercase"/>
                                                        <x-jet-input-error for='a20' />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 gap-1 inline-flex">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <x-jet-label value="TIENE UN PESO DE:" />
                                                        <x-jet-input type="text" name="a21" class="w-flex uppercase"/>
                                                        <x-jet-input-error for='a21' />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <x-jet-label value="UNA DIRECCIÓN COMO LA LETRA:" />
                                                        <x-jet-input type="text" name="a22" class="w-flex uppercase"/>
                                                        <x-jet-input-error for='a22' />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <x-jet-label value="ESTA FABRICADA DE:" />
                                                        <x-jet-input type="text" name="a23" class="w-flex uppercase"/>
                                                        <x-jet-input-error for='a23' />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <x-jet-label value="ANCHO ESPESOR:" />
                                                        <x-jet-input type="text" name="a24" class="w-flex uppercase"/>
                                                        <x-jet-input-error for='a24' />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-title bg-gray-300 m-2 p-2">
                            <h3 class="text-center font-bold h-5">DATOS DEL AMBIENTE </h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-3">TEMPERATURA:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a25" id="a25_1">
                                            <option value="AMBIENTE (10º A 30ª)">AMBIENTE (10º A 30ª)</option>
                                            <option value="REFFRIGERACION (-3 A 10ª)">REFFRIGERACION (-3 A 10ª)</option>
                                            <option value="CONGELACION (-20º A -4º)">CONGELACION (-20º A -4º)</option>
                                            <option value="EXTREMO (+ DE 40º)">EXTREMO (+ DE 40º)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a25' />
                            <p class="card-text mb-3">INFLAMABLE:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a26" id="a26_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a26' />
                            <p class="card-text mb-3">EXPLOSIVO:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a27" id="a27_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a27' />
                            <p class="card-text mb-3">CORROSIVO:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a28" id="a28_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a28' />
                            <p class="card-text mb-3">CONDICIONES ESPECIALES:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a29" id="a29_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a29' />
                        </div>
                        <div class="card-title bg-gray-300 m-2 p-2">
                            <h3 class="text-center font-bold h-5">DATOS DE LA BODEGA</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <x-jet-label value="ALTURA MAXIMA DISPONIBLE EN METROS:" />
                                        <x-jet-input type="text" name="a30" class="w-flex uppercase"/>
                                        <x-jet-input-error for='a30' />
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mb-3">DIMENSIONES DEL AREA EN METROS:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <x-jet-label value="FRENTE:" />
                                        <x-jet-input type="text" name="a31" class="w-flex uppercase"/>
                                        <x-jet-input-error for='a31' />
                                    </div>
                                    <div class="form-group">
                                        <x-jet-label value="FONDO:" />
                                        <x-jet-input type="text" name="a32" class="w-flex uppercase"/>
                                        <x-jet-input-error for='a32' />
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mb-3">ANEXO LAYOUT:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a33" id="a33_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a33' />
                            <p class="card-text mb-3">OBSERVACIONES ESPECIALES:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <textarea name="a34" rows="5" class="inputjet text-sm w-full uppercase">{{old('a34')}}</textarea>
                                        <x-jet-input-error for='a34' />
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mb-3">PROTECTORES DE POSTE:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a35" id="a35_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a35' />
                            <p class="card-text mb-3">PROTECTORES DE BATERIA:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a36" id="a36_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a36' />
                            <p class="card-text mb-3">PARRILLAS:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a37" id="a37_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a37' />
                            <p class="card-text mb-3">OBSERVACIONES:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="form-group">
                                        <select class="inputjet text-sm w-full uppercase" name="a38" id="a38_1">
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <x-jet-input-error for='a38' />
                        </div>
                        <div class="card-title bg-gray-300 m-2 p-2">
                            <h3 class="text-center font-bold h-5">MATERIALES</h3>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-3">LISTADO DE MATERIALES:</p>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3">&nbsp;</div>
                                        <div class="col-xs-12 col-sm-9">
                                            <div class="form-group">
                                                <x-jet-label value="DESCRIPCIÓN:" />
                                                <x-jet-input type="text" name="a39" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a39' />
                                            </div>
                                            <div class="form-group">
                                                <x-jet-label value="CANTIDAD:" />
                                                <x-jet-input type="text" name="a40" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a40' />
                                            </div>
                                            <div class="form-group">
                                                <x-jet-label value="DIMENSIONES:" />
                                                <x-jet-input type="text" name="a41" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a41' />
                                            </div>
                                            <div class="form-group">
                                                <x-jet-label value="CALIBRE:" />
                                                <x-jet-input type="text" name="a42" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a42' />
                                            </div>
                                            <div class="form-group">
                                                <x-jet-label value="ACABADO:" />
                                                <x-jet-input type="text" name="a43" class="w-flex uppercase"/>
                                                <x-jet-input-error for='a43' />
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="card-footer">
                    <div class="col-xs-12 col-sm-6 m-1 gap-2">
                        <button type="submit" class="btn btn-green mb-2">
                            <i class="fa-solid fa-circle-arrow-right"></i>&nbsp; &nbsp; Continuar
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            {{-- </form> --}}
        </div>
    </div>
@stop