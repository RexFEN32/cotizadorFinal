<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        ¡Bienvenido al Sistema de Cotización Tyrsa!
    </div>

    <div class="mt-6 text-gray-500">
        En este sistema podrá realizar las cotizaciones de nuestros productos de una manera rápida y eficiente.
        Siga las instrucciones para comenzar su cotización.
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
    {{-- Título intercambiable del layout --}}
    <div class="p-6 flex items-center">
        <i class="fa-solid fa-calculator fa-xl text-gray-400"></i>
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="">Solicitudes de Cotización</a></div>
    </div>

    {{-- Comienza código externo a layout --}}
    <div class="row m-3">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 g-2">
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>TYRSAWES</title>
                        <rect width="100%" height="100%" fill="#4682B4"/>
                        <text x="35%" y="50%" fill="#eceeef" dy=".3em">Generar nueva Solicitud</text>
                    </svg>
                    <div class="card-body">
                        <div class="p-2 text-center">
                            <a href="{{route('open_request')}}" class="btn btn-sm btn-blue">Iniciar</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>TYRSAWES</title>
                        <rect width="100%" height="100%" fill="#800000"/>
                        <text x="25%" y="50%" fill="#eceeef" dy=".3em">Solicitudes Incompletas</text>
                    </svg>
                    <div class="card-body">
                        <div class="p-2 text-center">
                            <a href="" class="btn btn-sm btn-red">Consultar</a>
                        </div>
                    </div>
                </div>
            </div>  --}}
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>TYRSAWES</title>
                        <rect width="100%" height="100%" fill="#3CB371"/>
                        <text x="35%" y="50%" fill="#eceeef" dy=".3em">Solicitudes Terminadas</text>
                    </svg>
                    <div class="card-body">
                        <div class="p-2 text-center">
                            <a href="" class="btn btn-sm btn-green">Consultar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 p-2">&nbsp;</div>
    {{-- Termina código externo a layout --}}
    
</div>
