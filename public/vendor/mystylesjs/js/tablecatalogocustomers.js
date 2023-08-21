if ( $.fn.dataTable.isDataTable( '.tablecustomers' ) ) {
    table = $(".tablecustomers").DataTable({
        destroy: true,
        responsive: true,

        "columnDefs": [
            {
                "targets": [0,2,3,4,5,6,7,8,9,10,11,12,15],
                "searchable": false,
                "sortable": false,
                "visible": false,
            },
            {
                "targets": [17],
                "searchable": false,
                "sortable": false,
                "visible": true,
            },
        ],

        /** Para usar los botones */ 
        dom: 'Bfrtilp',       
        buttons:[ 
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success'
            },
            {
                extend:    'print',
                text:      '<i class="fa fa-print"></i> ',
                titleAttr: 'Imprimir',
                className: 'btn btn-info'
            },
            /**
             * 
             {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger'
            },
             * 
             */
        ],
    
        /** Traducciones */
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Registros del _START_ al _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Registros del 0 al 0 de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
            }
        },
    });
}
else {
    table = $('.tablecustomers').DataTable( {
        paging: false
    } );
}