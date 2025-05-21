<?php
if ($result->num_rows > 0) { ?>
    <table>
        <tr>
            <th>Número</th><th>Fecha</th><th>Hora</th><th>Acción</th>
        </tr>
        <?php while ($fila = $result->fetch_object()) { ?>
        <tr>
            <td><?php echo $fila->CitNumero; ?></td>
            <td><?php echo $fila->CitFecha; ?></td>
            <td><?php echo $fila->CitHora; ?></td>
            <td>
                <form action="index.php?accion=confirmarCancelacion" method="post">
                    <input type="hidden" name="numeroCita" value="<?php echo $fila->CitNumero; ?>">
                    <input type="submit" value="Cancelar">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
<?php } else {
    echo "<p>El paciente no tiene citas asignadas.</p>";
} ?>