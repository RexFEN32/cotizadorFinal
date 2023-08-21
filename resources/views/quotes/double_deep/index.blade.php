@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            <div class="row mb-3">
                <nav class="navbar bg-light rounded-full">
                    <div class="container-fluid items-center">
                        <span class="navbar-brand mb-0 h3 font-bold">Doble Profundidad</span>
                    </div>
                </nav>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Marcos</h5>
                            <p class="card-text">Cotizador de Marcos.</p>
                            <a href="{{ route('double_deep_menuframes.show', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Vigas</h5>
                            <p class="card-text">Cotizador de Vigas.</p>
                            <a href="{{ route('double_deep_menujoists.show', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Crossbar</h5>
                            <p class="card-text">Cotizador de Crossbar.</p>
                            <a href="{{ route('double_deep_crossbars.show', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Distanciadores</h5>
                            <p class="card-text">Cotizador de Distanciadores.</p>
                            <a href="{{ route('double_deep_spacers.show', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pisos</h5>
                            <p class="card-text">Cotizador de para pisos.</p>
                            <a href="{{ route('double_deep_floors.show', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Refuerzos Pisos</h5>
                            <p class="card-text">Cotizador de Refuerzos para pisos.</p>
                            <a href="{{ route('double_deep_floor_reinforcements.show', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Panel</h5>
                            <p class="card-text">Cotizador de Paneles.</p>
                            <a href="{{ route('double_deep_panels', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Parrillas</h5>
                            <p class="card-text">Cotizador de Parrillas.</p>
                            <a href="{{ route('double_deep_grills.index', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Maderas</h5>
                            <p class="card-text">Cotizador de Maderas.</p>
                            <a href="{{ route('double_deep_woods.index', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Protectores</h5>
                            <p class="card-text">Cotizador de Protectores.</p>
                            <a href="{{ route('double_deep_protectors.index', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Especial</h5>
                            <p class="card-text">Cotizador de Especial.</p>
                            <a href="{{ route('double_deep_special.index', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Administrativo</h5>
                            <p class="card-text">Cotizador de Administrativo.</p>
                            <a href="{{ route('double_deep_administratives.index', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fletes</h5>
                            <p class="card-text">Capturar.</p>
                            <a href="{{ route('double_deep_freights.show', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Instalación</h5>
                            <p class="card-text">Capturar.</p>
                            <a href="{{ route('double_deep_installs', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Viáticos</h5>
                            <p class="card-text">Capturar.</p>
                            <a href="{{ route('double_deep_quotation_travel_assignments', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Redacción</h5>
                            <p class="card-text">Generar Cotización.</p>
                            <a href="{{ route('double_deep_quotations.show', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cuestionario</h5>
                            <p class="card-text">Imprimir Cuestionario de Ingenieria de Racks.</p>
                            <a href="{{ route('rpt_rack_engineering', $Quotation_Id) }}" class="btn btn-primary">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>&nbsp;
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-end">
            <div class="container">
                {!! Form::open(['method'=>'POST','route'=>['product_menu']]) !!}
                <input type="hidden" name="quotations_id" value="{{$Quotation_Id}}">
                <button type="submit" class="btn btn-black mb-2">
                    <i class="fa-solid fa-rotate-left fa-xl"></i>&nbsp; Menú
                </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop