$(document).ready(function() {
    var id, opcion;
    opcion = 2;
    tVerEmpleados = $('#tVerEmpleados').DataTable({
        'language': {
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        },
        'ajax': {
            'url': 'bd-personal/crud.php',
            'method': 'POST',
            'data': { opcion: opcion },
            'dataSrc': ''
        },
        'columns': [
            { 'data': 'num_empleado' },
            { 'data': 'nombre' },
            { 'data': 'ap_paterno' },
            { 'data': 'ap_materno' },
            { 'data': 'edad' },
            { 'data': 'num_tel' },
            { 'data': 'correo' },
            { 'data': 'fech_nacimiento' },
            { 'data': 'sexo' },
            { 'data': 'domicilio' },
            { 'data': 'estado' },
            { 'data': 'provincia' },
            { 'data': 'cod_postal' },
            { 'data': 'CURP' },
            { 'data': 'RFC' },
            { 'data': 'escolaridad' },
            { 'data': 'puesto' },
            { 'defaultContent': "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'>EDITAR</button><button class='btn btn-danger btn-sm btnBorrar'>ELIMINAR</button></div></div>" }
        ],
        "responsive": true,
        'scrollX': true
    });

    var fila;

    $('#formAdd').submit(function(e) {
        e.preventDefault();
        numEmpleado = $.trim($("#numEmpleado").val());
        nombre = $.trim($("#nombre").val());
        aPaterno = $.trim($("#aPaterno").val());
        aMaterno = $.trim($("#aMaterno").val());
        edad = $.trim($("#edad").val());
        telefono = $.trim($("#phone").val());
        correo = $.trim($("#correo").val());
        fNacimiento = $.trim($("#fNacimiento").val());
        genero = $.trim($("#genero").val());
        direccion = $.trim($("#direccion").val());
        estado = $.trim($("#estado").val());
        provincia = $.trim($("#provincia").val());
        cPostal = $.trim($("#cPostal").val());
        curp = $.trim($("#curp").val());
        rfc = $.trim($("#rfc").val());
        escolaridad = $.trim($("#escolaridad").val());
        puesto = $.trim($("#puesto").val());


        $.ajax({
            url: "bd-personal/crud.php",
            type: 'POST',
            datatype: 'JSON',
            data: {
                id: id,
                numEmpleado: numEmpleado,
                nombre: nombre,
                aPaterno: aPaterno,
                aMaterno: aMaterno,
                edad: edad,
                telefono: telefono,
                correo: correo,
                fNacimiento: fNacimiento,
                genero: genero,
                direccion: direccion,
                estado: estado,
                provincia: provincia,
                cPostal: cPostal,
                curp: curp,
                rfc: rfc,
                escolaridad: escolaridad,
                puesto: puesto,
                opcion: opcion,
            },
            success: function(data) {
                //alert(data);
                tVerEmpleados.ajax.reload(null, false);
                console.log(data);
            }
        });
        $("#addnew").modal('hide');

    });

    //CERRAR VENTANA MODAL
    $('.close').click(function() {
        $("#addnew").modal('hide');
        $("#edit").modal('hide');
    });

    //CREAR NUEVO REGISTRO
    $('#btnNuevo').click(function() {
        opcion = 1;
        id = null;
        $("#formAdd").trigger('reset');
        $("#addnew").modal('show');
        $(".modal-title").text("Agregar Empleado");
        $(".modal-header").css("background-color", "#000");
        $(".modal-header").css("color", "#fff");
        //console.log(opcion);
    });

    //EDITAR REGISTRO
    $(document).on('click', '.btnEditar', function() {
        opcion = 3;
        $("#addnew").modal('show');
        $(".modal-title").text("Editar Empleado");
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "#fff");
        fila = $(this).closest('tr');
        numEmpleado = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        aPaterno = fila.find('td:eq(2)').text();
        aMaterno = fila.find('td:eq(3)').text();
        edad = parseInt(fila.find('td:eq(4)').text());
        telefono = parseInt(fila.find('td:eq(5)').text());
        correo = fila.find('td:eq(6)').text();
        fNacimiento = fila.find('td:eq(7)').text();
        genero = fila.find('td:eq(8)').text();
        direccion = fila.find('td:eq(9)').text();
        estado = fila.find('td:eq(10)').text();
        provincia = fila.find('td:eq(11)').text();
        cPostal = parseInt(fila.find('td:eq(12)').text());
        curp = fila.find('td:eq(13)').text();
        rfc = fila.find('td:eq(14)').text();
        escolaridad = fila.find('td:eq(15)').text();
        puesto = fila.find('td:eq(16)').text();
        $('#numEmpleado').val(numEmpleado);
        $("#nombre").val(nombre);
        $("#aPaterno").val(aPaterno);
        $("#aMaterno").val(aMaterno);
        $("#edad").val(edad);
        $("#phone").val(telefono);
        $("#correo").val(correo);
        $("#fNacimiento").val(fNacimiento);
        $("#genero").val(genero);
        $("#direccion").val(direccion);
        $("#estado").val(estado);
        $("#provincia").val(provincia);
        $("#cPostal").val(cPostal);
        $("#curp").val(curp);
        $("#rfc").val(rfc);
        $("#escolaridad").val(escolaridad);
        $("#puesto").val(puesto);

    });

    //BORRAR REGISTRO
    $(document).on('click', '.btnBorrar', function() {
        opcion = 4;
        fila = $(this);
        numEmpleado = parseInt($(this).closest('tr').find('td:eq(0)').text());
        var respuesta = confirm("¿Estas seguro de borrar el registro " + numEmpleado + "?");
        if (respuesta) {
            $.ajax({
                url: 'bd-personal/crud.php',
                type: 'POST',
                datatype: 'JSON',
                data: {
                    opcion: opcion,
                    numEmpleado: numEmpleado,
                    success: function() {
                        tVerEmpleados.row(fila.parents('tr')).remove().draw();
                    },
                }
            })
        }
    });


    // $("#formTxt").submit(function(e) {
    //     e.preventDefault();
    //     //alert("se presiono el boton");
    //     var formData = new FormData();
    //     var fileTxt = $("#file")[0].files[0];
    //     formData.append('file', fileTxt);
    //     $.ajax({
    //         url: "bd-personal/import_asistencia.php",
    //         type: "POST",
    //         datatype: "json",
    //         data: formData,
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         success: function(data) {
    //             alert(data);
    //         }
    //     });
    //     //return false;
    // });

    tbAsistencia = $("#tbAsistencia").DataTable({
        'language': {
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
});