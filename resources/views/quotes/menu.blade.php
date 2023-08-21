@extends('adminlte::page')

@section('title', 'COTIZADOR')

@section('content_header')
    <x-header-cot>Sistema de Cotización Tyrsa</x-header-cot>
@stop

@section('content')
    <div class="container w-full bg-white p-3 rounded-xl shadow-xl">
        <div class="row m-3">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Piezas</h5>
                            <p class="card-text">Cotizador x Piezas</p>
                            <a href="{{ route('singlepieces.show', $Quotation_Id)}}" class="btn btn-primary">
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
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Selectivo</h5>
                            <p class="card-text">Cotizador Selectivo</p>
                            <a href="{{ route('selectivo.show', $Quotation_Id) }}" class="btn btn-primary">
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
            <div class="w-100">&nbsp;</div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pasarela</h5>
                            <p class="card-text">Cotizador Pasarela</p>
                            <a href="#" class="btn btn-primary">
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
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Doble Profundidad</h5>
                            <p class="card-text">Cotizador Doble Profundidad</p>
                            <a href="{{ route('double_deep.show', $Quotation_Id) }}" class="btn btn-primary">
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
            <div class="w-100">&nbsp;</div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Drive In / Thru</h5>
                            <p class="card-text">Cotizador Drive In / Thru</p>
                            <a href="#" class="btn btn-primary">
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
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Estantería</h5>
                            <p class="card-text">Cotizador Estantería</p>
                            <a href="#" class="btn btn-primary">
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
            <div class="w-100">&nbsp;</div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cantilever</h5>
                            <p class="card-text">Cotizador Cantilever</p>
                            <a href="#" class="btn btn-gray">
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
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mini Rack</h5>
                            <p class="card-text">Cotizador Mini Rack</p>
                            <a href="#" class="btn btn-gray">
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
            <div class="w-100">&nbsp;</div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Push Back</h5>
                            <p class="card-text">Cotizador Push Back</p>
                            <a href="#" class="btn btn-gray">
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
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dinámico</h5>
                            <p class="card-text">Cotizador Dinámico</p>
                            <a href="#" class="btn btn-gray">
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
            <div class="w-100">&nbsp;</div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Carton Flow</h5>
                            <p class="card-text">Cotizador Carton Flow</p>
                            <a href="#" class="btn btn-gray">
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
                <div class="col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Entrepiso</h5>
                            <p class="card-text">Cotizador Entrepiso</p>
                            <a href="#" class="btn btn-gray">
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
    </div>
@stop