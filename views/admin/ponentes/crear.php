<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>


<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton " href="/admin/ponentes">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>
<div class="dashboard__formulario">
    <?php require_once __DIR__.'/../../templates/alertas.php'; ?>
    <form action="/admin/ponentes/crear" enctype="multipart/form-data" method="POST" class="formulario">
        <?php require_once __DIR__.'/../../admin/ponentes/formulario.php'; ?>

        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Registrar Ponente">

    </form>
</div>