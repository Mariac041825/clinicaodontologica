<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de Pacientes</title>
</head>
<body>
    <?php
    if ($result->num_rows > 0) {
    ?>
        <table>
            <tr>
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Sexo</th>
                <th>Acción</th>
            </tr>
            <?php
            while ($fila = $result->fetch_object()) {
            ?>
                <tr>
                    <td><?php echo $fila->PacIdentificacion; ?></td>
                    <td><?php echo $fila->PacNombres . " " . $fila->PacApellidos; ?></td>
                    <td><?php echo $fila->PacSexo; ?></td>
                    <td>Ver</td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
    ?>
        <p>El paciente no existe en la base de datos.</p>
        <input type="button" name="ingPaciente" id="ingPaciente" value="Ingresar Paciente" onclick="ingPaciente()">
    <?php
    }
    ?>
</body>
</html>
