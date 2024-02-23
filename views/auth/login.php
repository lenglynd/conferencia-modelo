<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__text">Inicia Sesión en DevWebCamp</p>
<?php 
    require_once __DIR__.'/../templates/alertas.php';
?>
        <form action="/login" class="formulario" method="POST">

            <div class="formulario__campo">
                <label for="email" class="formulario__label">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu email" class="formulario__input">
            </div>
            <div class="formulario__campo">
                <label for="password" class="formulario__label">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu clave" class="formulario__input">
            </div>

            <input type="submit" value="Iniciar Sesión" class="formulario__submit">

        </form>
        <div class="acciones">
            <a class="acciones__eenlace" href="/registro">Regístrate</a>
            <a class="acciones__eenlace" href="/olvide">Recuperar clave</a>
        </div>

</main>