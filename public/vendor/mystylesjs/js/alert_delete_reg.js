$('.DeleteReg').submit(function(e) {
    e.preventDefault();
    Swal.fire({
        title: '¿Estás seguro de querer eliminar el Registro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar Registro!'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
});