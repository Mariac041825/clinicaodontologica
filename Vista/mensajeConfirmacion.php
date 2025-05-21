<div id="contenido">
    <h2>Estado de la Cita</h2>
    <?php
    if ($resultado > 0) {
        echo "<p>La cita ha sido confirmada exitosamente.</p>";
    } else {
        echo "<p>Hubo un error al confirmar la cita.</p>";
    }
    ?>
</div>