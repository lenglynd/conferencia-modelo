<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__text">Registrate en DevWebCamp</p>
<?php require_once __DIR__.'/../templates/alertas.php'; ?>
        <form action="/registro" method="POST" class="formulario">

            <div class="formulario__campo">
                <label for="nombre" class="formulario__label">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Tu nombre" class="formulario__input"
                    value="<?php echo $usuario->nombre ?>">
            </div>
            <div class="formulario__campo">
                <label for="apellido" class="formulario__label">Apellido</label>
                <input type="text" name="apellido" id="apellido" placeholder="Tu apellido" class="formulario__input"
                    value="<?php echo $usuario->apellido ?>">
            </div>
            <div class="formulario__campo">
                <label for="email" class="formulario__label">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu email" class="formulario__input"
                    value="<?php echo $usuario->email ?>">
            </div>
            <div class="formulario__campo">
                <label for="password" class="formulario__label">Password</label>
                <input type="password" name="password" id="password" placeholder="Tu clave" class="formulario__input">
            </div>
            <div class="formulario__campo">
                <label for="password2" class="formulario__label">Repetir Password</label>
                <input type="password" name="password2" id="password2" placeholder="Tu clave" class="formulario__input">
            </div>

            <input type="submit" value="Crear Cuenta" class="formulario__submit">

        </form>
        <div class="acciones">
            <a class="acciones__eenlace" href="/login">Iniciar Sesión</a>
            <a class="acciones__eenlace" href="/olvide">Recuperar clave</a>
        </div>

</main>