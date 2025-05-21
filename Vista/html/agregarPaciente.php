<div id="contenido">
    <h2>Registrar Paciente</h2>
    <form action="index.php?accion=guardarPaciente" method="post" id="frmAgregarPaciente">
        <table>
            <tr>
                <td>Identificación</td>
                <td><input type="text" name="identificacion" required></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><input type="text" name="nombres" required></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" name="apellidos" required></td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td><input type="text" name="telefono" required></td>
            </tr>
            <tr>
                <td>Correo Electrónico</td>
                <td><input type="email" name="correo" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Registrar"></td>
            </tr>
        </table>
    </form>
</div>