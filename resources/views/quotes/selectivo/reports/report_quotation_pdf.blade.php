<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>COTIZACIÓN TYRSAWES</title>

        {{--  Bootstrap 5.0  --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{--  My Style  --}}
        <link href="{{ asset('vendor/mystylesjs/css/datatable_gral.css') }}" rel="stylesheet">

        {{--  Styles Tailwind Laravel Breeze  --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        {{--  Scripts Tailwind Laravel Breeze  --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            /** Define the margins of your page **/
            @page {
                margin: 0cm 0cm;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                font-size: 20px;
                text-transform: uppercase;
                color: #000;
            }
        
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0px;
                height: 100px;
            }

            body{
                margin-top: 0cm;
                margin-left: 0cm;
                margin-right: 0cm;
                margin-bottom: 0cm;
                background: url("data:image/png;base64,{{$BackgroundImage}}") no-repeat center center fixed;
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                background-size: cover;
                
            }

            main {
                margin-top: 3cm;
                margin-left: 1.5cm;
                margin-right: 1.5cm;
                margin-bottom: 3cm;
            }
        
            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
            }

            .pagebreak {
                page-break-after: always;
            }

            /** Estilos Tablas */
            .bordered table { 
                width: 100%;
                border-collapse: separate;
                text-align: center;
                font-weight: bold;
            }
            .bordered th{
                color: white;
                background-color: rgb(4, 4, 104);
                font-size: 1rem;
                margin: 2px;
            }
            .bordered td{
                font-size: 0.95rem;
                margin: 2px;
            }
            .bordered td, .bordered th { 
                border: solid 1px rgb(4, 4, 104); 
            }
            .bordered tr td, th { 
                border-top-right-radius: 0;               
                border-top-left-radius: 0; 
                border-bottom-left-radius: 0; 
                border-bottom-right-radius: 0; 
            }
            .bordered th:first-child { 
                border-top-left-radius: 10px; 
            }
            .bordered th:last-child {   
                border-top-right-radius: 10px; 
            }
            .bordered tr:last-child td:first-child { 
                border-bottom-left-radius: 10px; 
            }
            .bordered tr:last-child td:last-child { 
                border-bottom-right-radius: 10px; 
            }
        </style>

    </head>
    <body>
        {{--  <header></header>  --}}
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-end">
                        {{$Fecha}}
                    </div>
                    <div class="col-sm-12 p-2">
                        {{$Customers->customer}}<br>
                        {{$Customers->address.' '.$Customers->outdoor.' '.$Customers->indoor}}, {{$Customers->zip_code}}<br>
                        {{$Customers->suburb.' '.$Customers->cyty.' '.$Customers->state}}<br>
                    </div>
                    <div class="col-sm-12 p-2 text-end">
                        REFERENCIA<br>
                        COT-{{$Quotations->invoice}}
                    </div>
                    <div class="col-sm-12 p-2">
                        AT’N {{$Contacts->contact}}<br>
                        {{$Contacts->campus}}
                    </div>
                    <div class="col-sm-12 p-2 mb-4">
                        <p>
                            <span class="text-start">Apreciable ingeniero:</span><br><br><br>
                            En atención a su amable solicitud, estamos presentando a su consideración 
                            nuestra cotización por:<br><br><br>
                            <span class="text-center">{{$Quotations->system}}</span><br><br><br>
                            Nuestra propuesta se preparó con base en las especificaciones y datos 
                            suministrados por ustedes y esperamos que cubra totalmente sus necesidades.<br><br>
                            Sin otro particular y agradeciendo su atención con la presente, nos despedimos 
                            de usted esperando tener la oportunidad de servirle.<br><br><br><br><br>
                        </p>
                        <p>
                            <span class="text-center">A T E N T A M E N T E</span><br><br><br><br>
                        </p>
                        <p>
                            <span>{{$User->name}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 p2">
                        <p>
                            <h1 class="fw-bold text-center">INDICE</h1>
                            <table width="100%" border="0">
                                <tr>
                                    <td class="text-start">1. GENERALIDADES</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">2. VENTAJAS DEL SISTEMA</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">3. ALCANCE DE NUESTRA OFERTA</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">4. DESCRIPCION DE LA OPERACION</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">5. PARAMETROS DE SELECCIÓN Y DISEÑO</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">6. NORMAS</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">7. LISTADO DE MATERIALES</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">8. CARACTERISTICAS TECNICAS</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">9. ELEMENTOS AUXILIARES</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">10. DISTRIBUCION DEL SISTEMA</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">11. LISTADO DE PRECIOS</td>
                                    <td class="text-end"></td>
                                </tr>
                                <tr>
                                    <td class="text-start">12. NOTAS GENERALES Y CONDICIONES DE VENTA</td>
                                    <td class="text-end"></td>
                                </tr>
                            </table>
                            <br><br>
                            <hr>
                            <table width="100%" border="0">
                                <tr>
                                    <td>ANEXO</td>
                                </tr>
                                <tr>
    
                                </tr>
                            </table>
                            <br><br>
                            <hr>
                            <table width="100%" border="0">
                                <tr>
                                    <td>FOTOS</td>
                                </tr>
                                <tr>
    
                                </tr>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                        1.	GENERALIDADES<br><br>
                        La presente cotización incluye el suministro e instalación de un {{$Quotations->systems}}
                        del Tipo {{$Quotations->type}} para su CEDIS ubicado en {{$Customers->address.' '.$Customers->outdoor.' '.$Customers->indoor}}, 
                        {{$Customers->zip_code}}, {{$Customers->suburb.' '.$Customers->cyty.' '.$Customers->state}} y de 
                        acuerdo al listado de equipo que se indica más adelante y a los dibujos XXXX.<br><br>
                        </p>
                        <p>
                            2.	VENTAJAS DEL SISTEMA PROPUESTO<br><br>
                            Algunas ventajas del sistema de Rack de Selectivo, son las siguientes:<br><br><br>                                
                            a)	Permite el acceso directo del montacargas al 100 % de las tarimas almacenadas.<br>                                
                            b)	Gran flexibilidad para realizar cambios, tales como:<br>
                                <ul>
                                    <li>Variación de claros entre vigas sin afectar a módulos adyacentes.</li>
                                    <li>Adición de niveles a módulos existentes.</li>
                                    <li>Es un sistema modular que facilita su crecimiento y en caso de requerirse puede ser reubicado fácilmente.</li>
                                </ul><br><br>
                        </p>
                        <p>
                            3.	ALCANCE DE NUESTRA OFERTA<br><br>
                            El alcance de nuestra oferta incluye los siguientes conceptos:<br><br><br>
                            •	Suministro de los materiales mencionados en los numerales correspondientes.<br>
                            •	Instalación de los componentes en su planta ubicada en el Edo de México.<br>
                            •	Flete L. A. B. hasta su planta.<br><br>
                                No se incluyen:<br><br>                                
                            •	Ninguna clase de obra civil y/o remoción de obstáculos, en caso de requerirse.<br><br>
                        </p>
                        <p>
                            4.	DESCRIPCION DE LA OPERACIÓN<br><br>
                            Los sistemas de Rack Selectivo normalmente están constituidos por Baterías Sencillas y 
                            Baterías Dobles. Las Baterías Sencillas, comúnmente son colocadas contra muro permitiendo de 
                            esta manera ser alimentadas desde un solo frente. Las Baterías Dobles serán alimentadas desde 
                            dos frentes. La alimentación y la descarga de su sistema serán efectuadas por medio de montacargas.
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            5.	PARÁMETROS DE SELECCIÓN Y DISEÑO<br><br>
                            En la elaboración de la presente cotización y para efectos del diseño, 
                            fabricación e instalación de los equipos aquí descritos, se consideran 
                            como válidos los siguientes datos:<br><br>
                        </p>
                        <p class="table-responsive">
                            <table style="border: solid 1px">
                                <tbody>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• PRODUCTO A MANEJAR</td>
                                        <td style="border: solid 1px" width="50%">{{$ProductoAlmacenar}}</td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• DIMENSIONES DEL NIVEL</td>
                                        <td style="border: solid 1px" width="50%">
                                            Frente: {{$DimensionFrente}} <br>
                                            Fondo: {{$DimensionFondo}} <br>
                                            Alto: {{$DimensionAlto}} <br>
                                            Peso: {{$DimensionPeso}} <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• DIMENSIONES DE LA TARIMA</td>
                                        <td style="border: solid 1px" width="50%">
                                            Frente: {{$TarimaFrente}} <br>
                                            Fondo: {{$TarimaFondo}} <br>
                                            Alto: {{$TarimaAlto}} <br>
                                            Peso: {{$TarimaPeso}} <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• CARGA MÁXIMA POR NIVEL</td>
                                        <td style="border: solid 1px" width="50%">
                                            @if($SelectiveHeavyLoadFramesTotalLoadKg)
                                                Marco Carga Pesada: {{ $SelectiveHeavyLoadFramesTotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveMiniatureFramesTotalLoadKg)
                                                Minimarco: {{ $SelectiveMiniatureFramesTotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveStructuralFramesTotalLoadKg)
                                                Marco Estructural: {{ $SelectiveStructuralFramesTotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistBox2Caliber14STotalLoadKg)
                                                Viga Tipo Caja 2.0 Calibre 14: {{ $SelectiveJoistBox2Caliber14STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistBox2STotalLoadKg)
                                                Viga Tipo Caja 2.0: {{ $SelectiveJoistBox2STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistBox25Caliber14STotalLoadKg)
                                                Viga Tipo Caja 2.5 Calibre 14: {{ $SelectiveJoistBox25Caliber14STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistBox25STotalLoadKg)
                                                Viga Tipo Caja 2.5: {{ $SelectiveJoistBox25STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistC2STotalLoadKg)
                                                Viga Tipo C 2.5: {{ $SelectiveJoistC2STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistChairsTotalLoadKg)
                                                Viga Tipo Silla: {{ $SelectiveJoistChairsTotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistL2Caliber14STotalLoadKg)
                                                Viga Tipo L 2.0 Calibre 14: {{ $SelectiveJoistL2Caliber14STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistL2STotalLoadKg)
                                                Viga Tipo L 2.0: {{ $SelectiveJoistL2STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistL25Caliber14STotalLoadKg)
                                                Viga Tipo L 2.5 Calibre 14: {{ $SelectiveJoistL25Caliber14STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistL25STotalLoadKg)
                                                Viga Tipo L 2.5: {{ $SelectiveJoistL25STotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistLrsTotalLoadKg)
                                                Viga Tipo LRS: {{ $SelectiveJoistLrsTotalLoadKg }} <br>
                                            @endif
                                            @if($SelectiveJoistStructuralsTotalLoadKg)
                                                Viga Estructural: {{ $SelectiveJoistStructuralsTotalLoadKg }} <br>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• DIMENSIÓN DE MONTACARGAS</td>
                                        <td style="border: solid 1px" width="50%">Se debe ajustar a los requerimientos del sistema.</td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• SENTIDO DE MANEJO</td>
                                        <td style="border: solid 1px" width="50%">Por su frente.</td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• TIEMPO DE OPERACIÓN</td>
                                        <td style="border: solid 1px" width="50%">24 horas.</td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• PISO</td>
                                        <td style="border: solid 1px" width="50%">Tipo industrial, nivel cero, de concreto.</td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• SOPORTACIÓN DEL SISTEMA</td>
                                        <td style="border: solid 1px" width="50%">A piso, fijación mediante taquetes.</td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• INTERFERENCIAS</td>
                                        <td style="border: solid 1px" width="50%">Se considera que no existen obstáculos en la trayectoria del sistema (en caso de haberlos serán retirados por el cliente).</td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• AMBIENTE</td>
                                        <td style="border: solid 1px" width="50%">
                                            Inflamable: {{$Inflamable}} <br>
                                            Explosivo: {{$Explosivo}} <br>
                                            Corrosivo: {{$Corrosivo}} <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: solid 1px" width="50%">• TEMPERATURA</td>
                                        <td style="border: solid 1px" width="50%">{{$Temperatura}} °C</td>
                                    </tr>
                                </tbody>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            6. NORMAS.<br><br>
                            RMI (RACKS MANUFACTURES INSTITUTE)<br><br>
                            Es una organización estadounidense encargada de indicar los parámetros de 
                            fabricación de los sistemas de almacenamiento (RACKS) en Estados Unidos de 
                            América. Establece entre otros los criterios de diseño, procedimientos de 
                            las pruebas destructivas, factores de seguridad, tolerancias de fabricación 
                            e instalación.<br><br><br>
                            UBC (UNIVERSE BUILDING CODE) / CFE (COMISION FEDERAL DE ELECTRICIDAD)<br><br>
                            Son reglamentes generales de construcción que clasifican entre otras las 
                            zonas sísmicas y zonas eólicas, en el caso del UBC es un reglamento con 
                            carácter mundial y rige los cálculos estructurales generales para las 
                            construcciones en América en cuanto CFE rige en México siendo más específico 
                            (tropical izado).<br><br><br>
                            ASTM (AMERICAN ESTÁNDAR TESTING MATERIALS)<br><br>
                            Es la norma que rige la producción de acero, estableciendo los criterios 
                            de fabricación, limites, tolerancias, durezas, aleaciones, maleabilidad, 
                            resistencias y demás características técnicas.<br><br><br>
                            Nuestros principales proveedores de materia prima (acero, pintura, 
                            soldadura y tornillería) son líderes en sus sectores y cuentan con las 
                            certificaciones requeridas tanto en calidad como procesos, garantizando 
                            así nuestro producto desde la selección adecuada de materia prima, procesos 
                            de fabricación, instalación y puesta en marcha.<br><br><br>
                        </p>
                        <p>
                            <table>
                                <tr>
                                    <td width="50%" class="text-center">
                                        <img src="data:image/png;base64,{{$RMARK}}" height="100" alt="">
                                    </td>
                                    <td width="50%" class="text-center">
                                        <img src="data:image/png;base64,{{$ASTM}}" height="100px" alt="">
                                    </td>
                                </tr>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            7. LISTADO DE MATERIALES.<br><br><br>
                            <table class="text-center" align="center" style="border: solid 1px">
                                <thead>
                                    <tr>
                                        <th width="10%">PDA</th>
                                        <th width="20%">REF</th>
                                        <th width="10%">CANT</th>
                                        <th width="10%">UNID</th>
                                        <th width="50%">DESCRIPCIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $Partida = 0;
                                    @endphp
                                    @if ($SelectiveHeavyLoadFrames)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveHeavyLoadFrames->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveHeavyLoadFrames->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Marcos de Carga Pesada Modelo {{ $SelectiveHeavyLoadFrames->model }} con las siguientes características:<br>
                                                Calibre: {{ $SelectiveHeavyLoadFrames->caliber }}<br>                                                
                                                Carga Total Kg: {{ $SelectiveHeavyLoadFrames->total_load_kg }}<br>
                                                Total Postes: {{ $SelectiveHeavyLoadFrames->total_poles }}<br>
                                                Total Travesaños: {{ $SelectiveHeavyLoadFrames->total_crossbars }}<br>                                                
                                                Total Diagonales: {{ $SelectiveHeavyLoadFrames->total_diagonals }}<br>
                                                Total Placas: {{ $SelectiveHeavyLoadFrames->total_plates }}<br>
                                                Total Kg: {{ $SelectiveHeavyLoadFrames->total_kg }}<br>
                                                Total M<sup>2</sup>: {{ $SelectiveHeavyLoadFrames->total_m2 }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveMiniatureFrames)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveMiniatureFrames->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveMiniatureFrames->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Mini Marcos Modelo {{ $SelectiveMiniatureFrames->model }} con las siguientes características:<br>
                                                Calibre: {{ $SelectiveMiniatureFrames->caliber }}<br>                                                
                                                Carga Total Kg: {{ $SelectiveMiniatureFrames->total_load_kg }}<br>
                                                Total Postes: {{ $SelectiveMiniatureFrames->total_poles }}<br>
                                                Total Travesaños: {{ $SelectiveMiniatureFrames->total_crossbars }}<br>                                                
                                                Total Diagonales: {{ $SelectiveMiniatureFrames->total_diagonals }}<br>
                                                Total Placas: {{ $SelectiveMiniatureFrames->total_plates }}<br>
                                                Total Kg: {{ $SelectiveMiniatureFrames->total_kg }}<br>
                                                Total M<sup>2</sup>: {{ $SelectiveMiniatureFrames->total_m2 }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveStructuralFrames)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveStructuralFrames->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveStructuralFrames->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Marcos Estructurales Modelo {{ $SelectiveStructuralFrames->model }} con las siguientes características:<br>
                                                Calibre: {{ $SelectiveStructuralFrames->caliber }}<br>                                                
                                                Carga Total Kg: {{ $SelectiveStructuralFrames->total_load_kg }}<br>
                                                Total Postes: {{ $SelectiveStructuralFrames->total_poles }}<br>
                                                Total Travesaños: {{ $SelectiveStructuralFrames->total_crossbars }}<br>                                                
                                                Total Diagonales: {{ $SelectiveStructuralFrames->total_diagonals }}<br>
                                                Total Placas: {{ $SelectiveStructuralFrames->total_plates }}<br>
                                                Total Kg: {{ $SelectiveStructuralFrames->total_kg }}<br>
                                                Total M<sup>2</sup>: {{ $SelectiveStructuralFrames->total_m2 }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistL2Caliber14S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistL2Caliber14S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistL2Caliber14S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo L 2.0 Calibre 14 con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistL2Caliber14S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistL2Caliber14S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistL2Caliber14S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistL2Caliber14S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistL2Caliber14S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistL2Caliber14S->length }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistL25Caliber14S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistL25Caliber14S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistL25Caliber14S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo L 2.5 Calibre 14 con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistL25Caliber14S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistL25Caliber14S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistL25Caliber14S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistL25Caliber14S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistL25Caliber14S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistL25Caliber14S->length }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistBox2Caliber14S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistBox2Caliber14S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistBox2Caliber14S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo Caja 2.0 Calibre 14 con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistBox2Caliber14S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistBox2Caliber14S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistBox2Caliber14S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistBox2Caliber14S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistBox2Caliber14S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistBox2Caliber14S->length }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistBox25Caliber14S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistBox25Caliber14S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistBox25Caliber14S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo Caja 2.5 Calibre 14 con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistBox25Caliber14S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistBox25Caliber14S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistBox25Caliber14S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistBox25Caliber14S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistBox25Caliber14S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistBox25Caliber14S->length }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistL2S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistL2S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistL2S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo L 2.0 Calibre {{ $SelectiveJoistL2S->caliber }} con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistL2S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistL2S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistL2S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistL2S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistL2S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistL2S->length }}<br>
                                                Patín: {{ $SelectiveJoistL2S->skate }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistL25S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistL25S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistL25S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo L 2.5 Calibre {{ $SelectiveJoistL25S->caliber }} con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistL25S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistL25S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistL25S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistL25S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistL25S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistL25S->length }}<br>
                                                Patín: {{ $SelectiveJoistL25S->skate }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistBox2S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistBox2S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistBox2S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo Caja 2.0 Calibre {{ $SelectiveJoistBox2S->caliber }} con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistBox2S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistBox2S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistBox2S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistBox2S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistBox2S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistBox2S->length }}<br>
                                                Patín: {{ $SelectiveJoistBox2S->skate }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistBox25S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistBox25S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistBox25S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo Caja 2.5 Calibre {{ $SelectiveJoistBox25S->caliber }} con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistBox25S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistBox25S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistBox25S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistBox25S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistBox25S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistBox25S->length }}<br>
                                                Patín: {{ $SelectiveJoistBox25S->skate }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistStructurals)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistStructurals->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistStructurals->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo Estructural Calibre {{ $SelectiveJoistStructurals->caliber }} con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistStructurals->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistStructurals->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistStructurals->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistStructurals->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistStructurals->m2 }}<br>
                                                Largo: {{ $SelectiveJoistStructurals->length }}<br>
                                                Patín: {{ $SelectiveJoistStructurals->skate }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistC2S)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistC2S->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistC2S->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo C 2.0 Calibre {{ $SelectiveJoistC2S->caliber }} con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistC2S->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistC2S->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistC2S->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistC2S->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistC2S->m2 }}<br>
                                                Largo: {{ $SelectiveJoistC2S->length }}<br>
                                                Patín: {{ $SelectiveJoistC2S->skate }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistLrs)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistLrs->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistLrs->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo LR Calibre {{ $SelectiveJoistLrs->caliber }} con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistLrs->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistLrs->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistLrs->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistLrs->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistLrs->m2 }}<br>
                                                Largo: {{ $SelectiveJoistLrs->length }}<br>
                                                Patín: {{ $SelectiveJoistLrs->skate }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveJoistChairs)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistChairs->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveJoistChairs->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Viga tipo Silla Calibre {{ $SelectiveJoistChairs->caliber }} con las siguientes características:<br>
                                                Capacidad de Carga: {{ $SelectiveJoistChairs->loading_capacity }}<br>
                                                Largo en Metros: {{ $SelectiveJoistChairs->length_meters }}<br>
                                                Peralte: {{ $SelectiveJoistChairs->camber }}<br>
                                                Peso en Kg: {{ $SelectiveJoistChairs->weight_kg }}<br>
                                                M<sup>2</sup>: {{ $SelectiveJoistChairs->m2 }}<br>
                                                Largo: {{ $SelectiveJoistChairs->length }}<br>
                                                Patín: {{ $SelectiveJoistChairs->skate }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveCrossbars)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveCrossbars->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveCrossbars->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                {{ $SelectiveCrossbars->type }} con las siguientes características:<br>
                                                Fondo: {{ $SelectiveCrossbars->depth }}<br>
                                                Desarrollo: {{ $SelectiveCrossbars->developing }}<br>
                                                Largo: {{ $SelectiveCrossbars->long }}<br>
                                                Calibre: {{ $SelectiveCrossbars->caliber }}<br>
                                                Kg x M<sup>2</sup>: {{ $SelectiveCrossbars->kg_m2 }}<br>
                                                Peso: {{ $SelectiveCrossbars->weight }}<br>
                                                M<sup>2</sup>: {{ $SelectiveCrossbars->m2 }}<br>
                                                Conector: {{ $SelectiveCrossbars->connector }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveSpacers)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{ $Partida }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveSpacers->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveSpacers->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Distanciadores con las siguientes características:<br>
                                                Uso: {{ $SelectiveSpacers->use }}<br>
                                                Desarrollo: {{ $SelectiveSpacers->developing }}<br>
                                                Largo: {{ $SelectiveSpacers->long }}<br>
                                                Calibre: {{ $SelectiveSpacers->caliber }}<br>
                                                Kg x M<sup>2</sup>: {{ $SelectiveSpacers->kg_m2 }}<br>
                                                M<sup>2</sup>: {{ $SelectiveSpacers->m2 }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveFloors)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{$Partida}}</td>
                                            <td style="border: solid 1px">{{ $SelectiveFloors->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveFloors->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Piso con las siguientes características:<br>
                                                Largo: {{ $SelectiveFloors->length }}<br>
                                                Peso: {{ $SelectiveFloors->weight }}<br>
                                                M<sup>2</sup>: {{ $SelectiveFloors->m2 }}<br>
                                                Peralte: {{ $SelectiveFloors->camber }}<br>
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($SelectiveFloorReinforcements)
                                    @php 
                                        $Partida = $Partida+1;
                                        if($Partida == 6){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }elseif($Partida == 12){
                                            echo '</tbody></table></p></div></div></div></main><div class="pagebreak"></div><main>
                                                <div class="container"><div class="row"><div class="col-sm-12 text-justify"><p>
                                                <table class="text-center" align="center" style="border: solid 1px"><thead>
                                                <tr><th width="10%">PDA</th><th width="20%">REF</th><th width="10%">CANT</th>
                                                <th width="10%">UNID</th><th width="50%">DESCRIPCIÓN</th></tr></thead><tbody>';
                                        }
                                    @endphp
                                        <tr>
                                            <td style="border: solid 1px">{{$Partida}}</td>
                                            <td style="border: solid 1px">{{ $SelectiveFloorReinforcements->sku }}</td>
                                            <td style="border: solid 1px">{{ $SelectiveFloorReinforcements->amount }}</td>
                                            <td style="border: solid 1px">PZA</td>
                                            <td style="border: solid 1px" class="text-start text-xs">
                                                Refuerzo para Piso con las siguientes características:<br>
                                                Altura: {{ $SelectiveFloorReinforcements->height }}<br>
                                                Peso: {{ $SelectiveFloorReinforcements->weight }}<br>
                                                M<sup>2</sup>: {{ $SelectiveFloorReinforcements->m2 }}<br>
                                            </td>
                                        </tr>
                                    @endif                                    
                                </tbody>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            8. CARACTERÍSTICAS TÉCNICAS.<br><br><br>
                            <h3 class="fw-bold text-center">MARCOS</h3>
                            <br><br>
                            <span style="text-transfor:lowercase">a)</span>  Los marcos están formados por 2 postes y éstos se encuentran fabricados en acero al carbón rolado en caliente de alta resistencia en calibre 14 o 12 y se hallan unidos entre sí por travesaños y diagonales con forma de canal “U”.<br>
                            <span style="text-transfor:lowercase">b)</span>  El ensamble de los marcos con los travesaños y diagonales se hace mediante el proceso de atornillado formando un arriostrado triangular.<br>
                            <span style="text-transfor:lowercase">c)</span>  Cada poste cuenta con 9 dobleces que los cuales aumentan la capacidad de carga del perfil.<br>
                            <span style="text-transfor:lowercase">d)</span>  Cada poste cuenta con dos filas de troquelado en la parte frontal mismos que se utilizan y garantizan el correcto ensamble de las vigas al marco. Adicionalmente cuentan con dos filas (una por costado) de barrenos que facilitan la colocación de cualquier elemento adicional / opcional estándar que se requiera.<br>
                            <span style="text-transfor:lowercase">e)</span>  El paso (distancia) en el troquelado es de 50 mm mismos que permiten la graduación de la viga.<br>
                            <span style="text-transfor:lowercase">f)</span>  Cada poste va provisto de una placa base de estudiadas y apropiadas dimensiones para transferir la carga del puntal a la placa de carga.<br>
                            <span style="text-transfor:lowercase">g)</span>  Cada placa base cuenta con 1 o 2 perforaciones las cuales permiten la fijación al piso mediante taquete expansivo.<br>
                        </p>
                        <p><br><br></p>
                        <p>
                            <table>
                                <tr>
                                    <td width="60%"><img src="data:image/png;base64,{{$Tc}}" height="100" alt=""></td>
                                    <td width="40%">
                                        <table class="text-center" width="100%" style="border: solid 1px">
                                            <tr>
                                                <td colspan="4" class="text-center">Contamos con 4 modelos de poste:</td>
                                            </tr>
                                            <tr>
                                                <td>TC-0</td>
                                                <td>TC-1</td>
                                                <td>TC-2</td>
                                                <td>TC-3</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Color Azul</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Otros colores opcionales</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </p>
                        <p><br><br><br></p>
                        <p>
                            <h6 class="font-bold text-center">FACTOR DE SEGURIDAD DE LOS MARCOS DE 1.94</h6>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            <h3 class="text-center font-bold">VIGAS</h3><br><br>
                            <span style="text-transform:lowercase">a)</span> Son perfiles conformados fabricados en lámina de acero de alta resistencia rolada en caliente calibre 14, 12 o 10 formando una figura tipo “L” o “CAJA”. <br>
                            <span style="text-transfor:lowercase">b)</span> Este perfil se encuentra unido entre sí mediante proceso de soldadura con hilo continuo. <br>
                            <span style="text-transfor:lowercase">c)</span> El ensamblaje de las vigas a los marcos se efectúa mediante sus conectores, de estudiada concepción, que garantiza la seguridad y facilidad de su colocación. La fijación de los conectores al perfil se realiza mediante soldadura con hilo continuo. <br>
                            <span style="text-transfor:lowercase">d)</span> Esta solida fijación a la viga proporciona una gran estabilidad longitudinal al sistema de almacenamiento (racks). <br>
                            <span style="text-transfor:lowercase">e)</span> Los conectores cuentan con 3 remaches o pernos mismos que garantizan la seguridad y facilidad de colocación entre las vigas y los marcos. <br>
                            <span style="text-transfor:lowercase">f)</span> El sistema de remaches con el conector permite una rápida colocación a los postes del marco, así como una fácil y rápida movilidad para variar la posición de las vigas. <br>
                            <span style="text-transfor:lowercase">g)</span> Los conectores cuentan con dos perforaciones para colocación de elementos de seguridad que bloquean la salida del remache previniendo así accidentes o riesgos por desplazamientos verticales de la viga.
                        </p>
                        <p><br><br></p>
                        <p>
                            <table class="text-center">
                                <tr>
                                    <td class="text-center"><img src="data:image/png;base64,{{$Vbox}}" height="100" alt=""></td>
                                    <td class="text-center"><img src="data:image/png;base64,{{$Vl}}" height="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td>Viga Tipo "Caja"</td>
                                    <td>Viga Tipo "L"</td>
                                </tr>
                                <tr>
                                    <td colspan="2">Color Anaranjado (Otros colores opcionales)</td>
                                </tr>
                            </table>
                        </p>
                        <p>
                            <h3 class="text-center font-bold">FACTOR DE SEGURIDAD PARA LAS VIGAS DE  1.67</h3>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            9. ELEMENTOS AUXILIARES (OPCIONALES)<br><br>
                            <table class="text-center">
                                <tr>
                                    <td width="40%"><img src="data:image/png;base64,{{$Spacers}}" height="100" alt=""></td>
                                    <td width="100%">
                                        <h6 class="text-center font-bold">DISTANCIADORES</h6><br><br>
                                        <p class="text-justify">
                                            Elementos auxiliares fabricados en acero al carbón rolado en 
                                            caliente de alta resistencia calibre 14 o 12 los cuales 
                                            permiten unir baterías sencillas convirtiéndolas en dobles, 
                                            triples o cuádruples logrando así una mayor estabilidad del 
                                            sistema. Su unión es mediante tornillos galvanizados de 5/16” 
                                            x 3/4” grado 2.
                                        </p> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <table class="text-center">
                                <tr>
                                    <td width="60%">
                                        <h6 class="text-center font-bold">CALZAS DE NIVELACIÓN</h6><br><br>
                                        <p class="text-justify">
                                            Elementos auxiliares de nivelación para lograr una correcta 
                                            instalación de los sistemas de Almacenamiento (RACKS), 
                                            existen diferentes medias que se adaptan a la placa base de 
                                            los postes. Son fabricadas en calibre 14.
                                        </p> 
                                    </td>
                                    <td width="40%"><img src="data:image/png;base64,{{$Fit}}" height="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <table class="text-center">
                                <tr>
                                    <td width="40%"><img src="data:image/png;base64,{{$Dowel}}" height="100" alt=""></td>
                                    <td width="100%">
                                        <h6 class="text-center font-bold">ELEMENTOS DE ANCLAJE Y FIJACION.</h6><br><br>
                                        <p class="text-justify">
                                            El sistema se fijará a piso mediante taquete galvanizado del tipo expansivo de ½ x 4¼” 
                                            de largo. Toda la tornillería utilizada es galvanizada de alta resistencia grado 5.
                                        </p> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <table class="text-center">
                                <tr>
                                    <td width="60%">
                                        <h6 class="text-center font-bold">CROSS BAR</h6><br><br>
                                        <p class="text-justify">
                                            Los aditamentos Cross Bar son barras colocadas en forma perpendicular a las vigas del Rack 
                                            y soportadas por las mismas. De este modo usted puede mejorar la seguridad de su almacén, 
                                            así como de su personal en tránsito.
                                        </p> 
                                    </td>
                                    <td width="40%"><img src="data:image/png;base64,{{$CrossBar}}" height="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            <table class="text-center">
                                <tr>
                                    <td width="100%">
                                        <h6 class="text-center font-bold">PROTECCIONES PARA POSTE</h6><br><br>
                                        <p class="text-justify">
                                            Elementos opcionales de los sistemas de almacenamiento los cuales se encuentran fabricados 
                                            con acero estructural de 6” de peralte y una altura de 500 mm. Se fijan al piso mediante 
                                            taquetes expansivos.
                                        </p> 
                                    </td>
                                    <td width="40%"><img src="data:image/png;base64,{{$PostProtectors}}" height="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <table class="text-center">
                                <tr>
                                    <td width="40%"><img src="data:image/png;base64,{{$HeadboardProtector}}" height="100" alt=""></td>
                                    <td width="60%">
                                        <h6 class="text-center font-bold">PROTECTORES PARA CABECERA</h6><br><br>
                                        <p class="text-justify">
                                            Su función es proteger el poste del marco en la parte inferior de los posibles golpes por 
                                            patines hidráulicos, patines eléctricos y montacargas. Existen distintos tipos de protecciones 
                                            por ejemplo protectores para poste y protectores para batería.
                                        </p> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                            <table class="text-center">
                                <tr>
                                    <td width="100%">
                                        <h6 class="text-center font-bold">MALLAS O PARRILLAS METALICAS</h6><br><br>
                                        <p class="text-justify">
                                            Las mallas de protección son paneles de malla, que se utilizan como elemento de protección 
                                            tanto en fondo como en laterales del rack. Es un elemento de seguridad del rack metálico con 
                                            el que se evitan desplazamientos no deseados o caídas por parte de las unidades de carga.
                                        </p> 
                                    </td>
                                    <td width="40%"><img src="data:image/png;base64,{{$Mesh}}" height="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            <h3 class="text-center font-bold">ACABADOS</h3>
                            Todos los componentes son acabados mediante procesos de pintura electrostática 
                            del tipo epóxico/poliéster con secado al Horno a 180° por 30 minutos. Aplicada 
                            luego de un proceso estricto de limpieza el cual consiste en:<br>
                            • Desengrasado. - Proceso en el cual se le quitan impurezas al producto que 
                            dificulten la adherencia de la pintura en polvo.<br>
                            • Fosfatado. - Crea cristales en la superficie del producto ayudando a la correcta 
                            adherencia de la pintura en el producto.<br>
                            • Enjuague. - Proceso en el cual se termina de quitar impurezas en el producto 
                            dejándolo libre de ellas.<br>
                            • Sello. - Elemento Férrico que se utiliza para evitar la oxidación del producto.<br><br>


                            10.	 DISTRIBUCIÓN DEL SISTEMA.<br><br>
                            La distribución de sistema será de acuerdo al dibujo XXXX.<br>
                            • La capacidad de almacenamiento del sistema será de XXXX posiciones tarimas.<br>
                            La capacidad de carga máxima por nivel para las vigas de XXX m será de XXXX Kg. 
                            (uniformemente distribuidos, no puntuales).<br><br>

                            GARANTIAS<br><br>
                            En Tyrsa Consorcio confiamos sinceramente en que el Servicio de Garantía no tenga que 
                            ser utilizado, gracias a la calidad de los productos ofrecidos.<br><br>
                            De todas formas, hemos diseñado nuestro servicio de garantía orientado de manera unívoca 
                            a la plena satisfacción del cliente. La claridad de los términos y procedimientos facilitará 
                            la atención siempre que sea necesario. De manera estándar todos nuestros productos están con 
                            3 años de garantía, ampliable a 5 años.<br><br>
                        </p>
                        <p>
                            <div class="text-center">
                                <img src="data:image/png;base64,{{$Garantia}}" height="100" alt="">
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            11.	LISTADO DE PRECIOS.<br><br><br>
                            <table class="table table-striped table-bordered text-xs" style="border: solid 1px">
                                <thead>
                                    <tr>
                                        <th width="10%" class="text-center" style="border: solid 1px">PDA.</th>
                                        <th width="10%" class="text-center" style="border: solid 1px">CANT.</th>
                                        <th width="10%" class="text-center" style="border: solid 1px">UNID.</th>
                                        <th width="40%" class="text-center" style="border: solid 1px">DESCRIPCIÓN</th>
                                        <th width="30%" class="text-center" style="border: solid 1px">PRECIO</th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" style="border: solid 1px">{{$Quotations->system}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" style="border: solid 1px">01</td>
                                        <td class="text-center" style="border: solid 1px">01</td>
                                        <td class="text-center" style="border: solid 1px">SIST</td>
                                        <td class="text-justify" style="border: solid 1px">
                                            Suministro de materiales, de un {{$Quotations->system}}
                                            tipo {{$Quotations->type}} conforme a nuestro listado
                                            de materiales, contará con un frente de $VAR por un Fondo
                                            de $VAR por un alto de $VAR con $VAR y $VAR niveles de
                                            carga (todo sobre vigas).<br><br>
                                            Se incluye el material indicado en el numeral correspondiente.<br><br>
                                            La distribución del sistema será tal y como se indica en nuestro
                                            plano $VAR. Revisión 0<br><br>
                                            La capacidad de carga máxima por nivel es de $VAR Kg uniformemente
                                            distribuidos (no puntual).
                                        </td>
                                        <td class="text-end" style="border: solid 1px">$ {{ number_format($Quotations->system_price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="border: solid 1px">02</td>
                                        <td class="text-center" style="border: solid 1px">01</td>
                                        <td class="text-center" style="border: solid 1px">SERV.</td>
                                        <td class="text-justify" style="border: solid 1px">
                                            Servicio de instalación en su planta de un sistema de Rack Selectivo en base a 
                                            nuestro plano.
                                            {{-- @php
                                                if($BreakDownInstall <> 'No'){
                                            @endphp
                                                <div class="container text-xs p-2">
                                                    <div class="row">
                                                        <div class="card">
                                                            <div class="card-header font-bold">
                                                                Desglose de Instalación
                                                            </div>
                                                            <div class="card-body">
                                                                <table class="table align-middle">
                                                                    <thead class="text-center">
                                                                        <tr>
                                                                            <th>Cantidad</th>
                                                                            <th>Descripción</th>
                                                                            <th>Costo</th>
                                                                            <th>Importe</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                @php
                                                                foreach($QuotationInstalls as $row)
                                                                {
                                                                @endphp
                                                                    <tr>
                                                                        <td>{{$row->amount}}</td>
                                                                        <td>{{$row->description}}</td>
                                                                        <td class="text-end">$ {{number_format(($row->cost),2)}}</td>
                                                                        <td class="text-end">$ {{number_format(($row->import),2)}}</td>
                                                                    </tr>
                                                                @php
                                                                }
                                                                @endphp
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr class="text-end font-bold">
                                                                            <td colspan="4">
                                                                                Total de Instalación: &nbsp;
                                                                                $ @if ($TotalImportInstall <> "")
                                                                                {{number_format($TotalImportInstall,2)}}
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @php
                                                }                                                
                                            @endphp

                                            @php
                                            if($BreakDownUninstall <> 'No'){
                                            @endphp
                                            <div class="container text-xs">
                                                <div class="row">
                                                    <div class="card">
                                                        <div class="card-header font-bold">
                                                            Desglose de Desinstalación
                                                        </div>
                                                        <div class="card-body">
                                                            <table class="table align-middle">
                                                                <thead class="text-center">
                                                                    <tr>
                                                                        <th>Cantidad</th>
                                                                        <th>Descripción</th>
                                                                        <th>Costo</th>
                                                                        <th>Importe</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                            @php
                                                            foreach($QuotationUninstalls as $row)
                                                            {
                                                            @endphp
                                                                <tr>
                                                                    <td>{{$row->amount}}</td>
                                                                    <td>{{$row->description}}</td>
                                                                    <td class="text-end">$ {{number_format(($row->cost),2)}}</td>
                                                                    <td class="text-end">$ {{number_format(($row->import),2)}}</td>
                                                                </tr>
                                                            @php
                                                            }
                                                            @endphp
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr class="text-end font-bold">
                                                                        <td colspan="4">
                                                                            Total de Desinstalación: &nbsp;
                                                                            $ @if ($TotalImportUninstall <> "")
                                                                            {{number_format($TotalImportUninstall,2)}}
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                            }                                                
                                            @endphp --}}
                                        </td>
                                        <td class="text-end" style="border: solid 1px">
                                            @if ($Print == 'In')
                                                INCLUIDA
                                            @else
                                                $ {{ number_format($Quotations->installation_price, 2) }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center" style="border: solid 1px">03</td>
                                        <td class="text-center" style="border: solid 1px">01</td>
                                        <td class="text-center" style="border: solid 1px">SERV.</td>
                                        <td class="text-justify" style="border: solid 1px">
                                            Servicio de traslado del material indicado desde nuestra planta en el Estado de México, hasta su 
                                            planta ubicada en {{$Customers->state}}.
                                        </td>
                                        <td class="text-end" style="border: solid 1px">$ {{ number_format($Quotations->transfer_price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center" style="border: solid 1px"></td>
                                        <td class="text-center" style="border: solid 1px">Total de Nuestra Oferta</td>
                                        <td class="text-end" style="border: solid 1px">$ {{number_format($TotalQuotation, 2)}}</td>
                                    </tr>   
                                </tbody>
                            </table>
                        </p>
                        <p>
                            NOTAS:<br><br>
                            1.	La presente propuesta ampara lo que esta explícitamente indicado en sus diferentes numerales por lo que cualquier partida adicional se cotizara por separado.<br>
                            2.	Se incluye una póliza de inspección preventiva con dos eventos anuales gratuitos durante el primer año.<br>
                            3.	Cualquier pago realizado a nuestra empresa deberá ser con cheque nominativo cruzado y/o transferencia bancaria a favor exclusivamente de TYRSA CONSORCIO S.A. DE C.V.<br>
                            4.	Se anexa hoja de notas generales y condiciones de venta, misma que forma parte integral de la presente cotización.<br>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify text-sm">
                        <p>
                            <span class="text-center font-bold">12.	NOTAS GENERALES Y CONDICIONES DE VENTA<br>
                            (Para la cotización COT-{{$Quotations->invoice}})</span><br><br>

                            1. Los precios indicados en esta cotización no incluyen el IVA mismo que se agregará al facturar, están expresados en moneda nacional y deberán ser pagados en dicha moneda.<br>
                            2. El plazo de entrega para el presente proyecto es de 10 a 12 semanas incluyendo la instalación. Este plazo se cuenta a partir del día hábil siguiente a la fecha de recepción de su apreciable orden de compra y de su correspondiente anticipo. <br>
                            3. En caso de que el cliente se retrase con los pagos y/o con el cumplimiento de las obligaciones pactadas para el presente proyecto, el plazo de entrega podrá variar sin ninguna responsabilidad para TYRSA.<br>
                            4. Las condiciones de pago son: 50 % de anticipo, 40 % contra entrega de equipos en planta TYRSA (previo al embarque) y 10 % al finalizar la instalación.<br>
                            5. Las maniobras de descarga de los equipos y/o partes en la planta del cliente son responsabilidad del mismo.<br>
                            6. El área de instalación deberá estar despejada, sin interferencias de otros contratistas, libre de tarimas, productos, tráfico de personas y/o vehículos durante la ejecución de la misma. El cliente deberá colocar señalizaciones en el área de instalación y/o protecciones en caso de ser necesario (encerrar el área).<br>
                            7. La instalación cotizada está considerada a realizarse en días y horas hábiles (lunes a viernes de 9:00 a 18:00 horas y sábado de 9:00 a 14:00 excepto festivos; este horario incluye 1 hora para la comida). Sí por solicitud del cliente la instalación se debe realizar en días y horas no hábiles se procederá a cotizar el costo adicional por dicho concepto para obtener su correspondiente autorización. <br>
                            8. La instalación cotizada está considerada a realizarse en un solo evento y/o conforme a un programa preliminar definido conjuntamente con el cliente. Sí por causas imputables a este último, lo considerado anteriormente no se pudiera realizar de acuerdo a lo planeado es posible que se generen costos y/o retrasos adicionales que se negociaran en su momento con el cliente.<br>
                            9. El alcance de la presente cotización no incluye ninguna clase de obra civil ni de albañilería, ni el suministro de acometidas eléctricas o neumáticas, las cuales en caso de requerirse serán por cuenta del cliente. <br>
                            10. La presente cotización ampara exclusivamente lo que está indicado en forma explícita en sus diferentes numerales por lo que cualquier producto, servicio o partida no indicada que se pudiera requerir se considerara como adicional y se cotizara y cobrara por separado.<br>
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify text-sm">
                        <p>
                            11. La capacidad y calidad del piso es responsabilidad del cliente. Se requiere que el piso sea de concreto, del tipo industrial, que tenga una capacidad de carga de 300 kg/cm2 ó mayor y que esté correctamente nivelado. El espesor de la losa de concreto del piso debe ser igual o mayor a 150 mm y permitir el uso de anclajes del tipo expansivo (taquetes). La diferencia de nivel entre el punto más alto y el más bajo de la losa no debe exceder de 10 mm respecto de una cota de referencia cero. En caso de que el desnivel en el suelo sea mayor al estipulado TYRSA se reserva el derecho de realizar un cargo adicional por los materiales que se requieran para suplir dicho desnivel (en el caso de que sea factible corregir el desnivel mediante calzas).<br>
                            12. El cliente deberá suministrar energía eléctrica a 120 VAC, 60 hertz, 30 amperes (o el que indique TYRSA) para el uso de los equipos y herramientas que se requieran durante la instalación, así como un área segura y adecuada para almacenarlas. También deberá proporcionar las facilidades necesarias para el aseo y cambio de ropa de nuestro personal.<br>
                            13. TYRSA garantiza sus equipos contra defectos de fabricación, defectos de ensamble o instalación y contra vicios ocultos por 36 meses. Dicho plazo se cuenta a partir de la fecha de finalización de la instalación, de la fecha de entrega del equipo o de la fecha de comienzo de uso del mismo en beneficio del cliente (lo que ocurra primero). En partes compradas a otros e integradas a nuestros equipos (por ejemplo, los moto reductores) se trasladará a ustedes la garantía del proveedor correspondiente. La garantía no aplica para equipos y materiales existentes.<br>
                            14. Defectos de operación causados por una inadecuada instalación de nuestros equipos, realizadas por otros, no serán cubiertos por la garantía.<br>
                            15. La vida de los equipos o partes depende del uso adecuado de los mismos bajo condiciones normales de operación. Los daños o deficiencias de operación causados por el abuso o maltrato de los equipos no serán cubiertos por nuestra garantía. <br>
                            16. En caso de que se produzcan defectos en el material y/o en el armado causados por la mala calidad del piso en el área de la instalación, la capacidad insuficiente del mismo (menor a la solicitada por TYRSA en esta cotización) y/o su mala nivelación, la garantía de los equipos cotizados e instalados quedara eliminada.<br>
                            17. La garantía ofrecida por TYRSA se limita a la reparación o reemplazo de la parte defectuosa quedando excluido cualquier otro tipo de gasto o responsabilidad que pudiese afectar al cliente, tales como daños incidentales o consecuentes, pérdida de beneficios (lucro cesante), retrasos o gastos incurridos por falta de dicha parte o por falta de equipo para cumplir con las leyes federales, estatales o locales.<br>
                            18. No se incluyen costos por cuotas sindicales, seguros de flete, seguros de obra y/o responsabilidad civil u otros gastos por requisitos particulares del cliente, los cuales se negociarán por separado en caso de requerirse.<br>
                            19. En caso de que la instalación no pueda realizarse en la fecha programada por causas no imputables a TYRSA CONSORCIO, S.A. DE C.V., procederá el pago total del saldo (50 %) contra la entrega de los materiales en nuestra planta.
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify text-sm">
                        <p>
                            20. Todos los diseños y características técnicas indicadas en la presente cotización son de carácter preliminar por lo que TYRSA podrá ajustarlos o modificarlos sin previo aviso durante la ejecución del proyecto.<br>
                            21. Debido a la naturaleza del presente proyecto no se aceptan cancelaciones parciales, ni totales de sus pedidos.<br>
                            22. Los materiales excedentes en obra son propiedad de TYRSA y no generaran ningún tipo de compensación para el cliente (nota de crédito, devolución, descuento, etc.). Por tanto, al finalizar la obra TYRSA retirara los materiales sobrantes, coordinando previamente con el cliente dicha actividad y siguiendo los procedimientos que éste tenga para tales fines.<br>
                            23. TYRSA es propietaria de los derechos de propiedad intelectual de toda la documentación, planos, manuales, licencias, software y demás información que genere para dar solución al proyecto que contrata el cliente. <br>
                            24. Las imágenes, ilustraciones y fotografías que se adjuntan a la presente cotización son de carácter informativo y puede que no correspondan con los equipos que se ofrecen en la misma. <br>
                            25. Los dibujos adjuntos a la presente cotización representan en forma esquemática los equipos ofrecidos, sus dimensiones, ubicaciones relativas, cantidades y algunos detalles específicos de los mismos.<br>
                            26. Precios sujetos a cambio sin previo aviso.
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <div class="pagebreak"></div>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-justify">
                        <p>
                            <h3 class="text-center font-bold">IMÁGENES DE REFERENCIA</h3><br>

                            
                        </p>
                    </div>
                </div>
            </div>
        </main>
        {{--  <footer></footer>  --}}
        
        <!-- Bootstrap 5.0 Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- Jquery min & popper -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    </body>
</html>