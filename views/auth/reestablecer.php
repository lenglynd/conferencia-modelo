<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__text">Reestablece DevWebCamp</p>
<?php require_once __DIR__.'/../templates/alertas.php'; ?>

<?php if ($token_valido) : ?>
        <form action="" method="POST" class="formulario">

           <div class="formulario__campo">
                <label for="password" class="formulario__label">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu clave" class="formulario__input">
            </div>
            <div class="formulario__campo">
                <label for="password2" class="formulario__label">Repetir Password</label>
                <input type="password" name="password2" id="password2" placeholder="Tu clave" class="formulario__input">
            </div>

            <input type="submit" value="Guardar" class="formulario__submit">

        </form>
        <div class="acciones">
            <a class="acciones__eenlace" href="/login">Iniciar Sesión</a>
            <a class="acciones__eenlace" href="/olvide">Recuperar clave</a>
        </div>
    <?php endif ?>

</main>