$(document).ready(function () {
    
    $("#medico").load("Controlador/obtenerMedicos.php");

    $("#consultorio").load("Controlador/obtenerConsultorios.php");

    
    $("#medico, #fecha").change(function () {
        var medico = $("#medico").val();
        var fecha = $("#fecha").val();

        if (medico !== "-1" && fecha !== "") {
            $.ajax({
                url: "Controlador/obtenerHoras.php",
                type: "POST",
                data: { medico: medico, fecha: fecha },
                success: function (response) {
                    $("#hora").html(response);
                }
            });
        }
    });

    $("#frmasignar").submit(function (event) {
        var docPaciente = $("#asignarDocumento").val();
        var medico = $("#medico").val();
        var fecha = $("#fecha").val();
        var hora = $("#hora").val();
        var consultorio = $("#consultorio").val();

        if (docPaciente === "" || medico === "-1" || fecha === "" || hora === "-1" || consultorio === "-1") {
            alert("Por favor, complete todos los campos.");
            event.preventDefault();
        }
    });


    $("#frmconsultar").submit(function (event) {
        var docPaciente = $("#consultarDocumento").val();
        if (docPaciente === "") {
            alert("Ingrese el documento del paciente.");
            event.preventDefault();
        }
    });

  
    $("#frmcancelar").submit(function (event) {
        var docPaciente = $("#cancelarDocumento").val();
        if (docPaciente === "") {
            alert("Ingrese el documento del paciente.");
            event.preventDefault();
        }
    });
});