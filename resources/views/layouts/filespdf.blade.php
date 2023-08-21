<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TYRSA S.A. DE C.V.') }} | @yield('title')</title>

        <!-- Bootstrap 5.0 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- DataTables -->
    	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/af-2.3.7/b-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.min.css"/>

        <!-- My Style -->
        <link href="{{ asset('vendor/mystylesjs/css/datatable_gral.css') }}" rel="stylesheet">

        @yield('css')

        <style>
            /** Define the margins of your page **/
            @page {
                margin: 0cm 0cm;
                text-transform: uppercase;
                color: #000;
            }
        
            header {
                position: fixed;
                top: 1cm;
                left: 1cm;
                right: 0px;
                height: 100px;
            }

            body {
                margin-top: 5cm;
                margin-left: 0.5cm;
                margin-right: 1.5cm;
                margin-bottom: 2cm;
            }
        
            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 
            }
        </style>

    </head>
    <body>
        <header>
            @yield('header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @yield('footer')
        </footer>
        
        <!-- Bootstrap 5.0 Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- Jquery min & popper -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <!-- Bootstrap 4.5.0 min -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <!-- Sweet Alert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js" integrity="sha256-qIEdjJD0ON7AbXQpi7N1CBcZy2AqQNoyWXLMTye8Qbc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
        <!-- DataTables  -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.3.1/jszip-2.5.0/dt-1.10.25/af-2.3.7/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/cr-1.5.4/date-1.1.0/fc-3.3.3/fh-3.1.9/kt-2.6.2/r-2.2.9/rg-1.1.3/rr-1.2.8/sc-2.0.4/sb-1.1.0/sp-1.3.0/sl-1.3.3/datatables.min.js"></script>

        @yield('js')

    </body>
</html>