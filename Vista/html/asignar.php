<div id="contenido">
    <h2>Asignar Cita</h2>
    <form id="frmasignar" action="index.php?accion=guardarCita" method="post">
        <table>
            <tr>
                <td>Documento del paciente</td>
                <td><input type="text" name="asignarDocumento" id="asignarDocumento"></td>
            </tr>
            <tr>
                <td>Médico</td>
                <td>
                    <select id="medico" name="medico">
                        <option value="-1" selected="selected">--- Seleccione el Médico ---</option>
                        <?php
                        require_once "Modelo/GestorCita.php";
                        $gestorCita = new GestorCita();
                        $result = $gestorCita->consultarMedicos();
                        while ($fila = $result->fetch_object()) {
                            echo "<option value='{$fila->MedIdentificacion}'>{$fila->MedNombres} {$fila->MedApellidos}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td><input type="date" id="fecha" name="fecha"></td>
            </tr>
            <tr>
                <td>Hora</td>
                <td><select id="hora" name="hora"></select></td>
            </tr>
            <tr>
                <td>Consultorio</td>
                <td>
                    <select id="consultorio" name="consultorio">
                        <option value="-1" selected="selected">--- Seleccione el Consultorio ---</option>
                        <?php
                        $result = $gestorCita->consultarConsultorios();
                        while ($fila = $result->fetch_object()) {
                            echo "<option value='{$fila->ConNumero}'>{$fila->ConNombre}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Asignar Cita"></td>
            </tr>
        </table>
    </form>
</div>