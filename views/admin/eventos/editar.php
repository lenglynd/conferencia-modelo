<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>


<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton " href="/admin/eventos">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>
<div class="dashboard__formulario">
    <?php require_once __DIR__.'/../../templates/alertas.php'; ?>
    <form action="" method="POST" class="formulario">
        <?php require_once __DIR__.'/../../admin/eventos/formulario.php'; ?>

        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Editar Evento">

    </form>
</div>