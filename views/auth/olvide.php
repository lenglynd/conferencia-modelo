<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__text">Recupera el acceso a  DevWebCamp</p>
    <?php require_once __DIR__.'/../templates/alertas.php'; ?>
        <form action="/olvide" class="formulario" method="POST">

            <div class="formulario__campo">
                <label for="email" class="formulario__label">Email</label>
                <input type="email" name="email" id="email" placeholder="Tu email" class="formulario__input">
            </div>
            
            <input type="submit" value="Enviar Instrucciones" class="formulario__submit">

        </form>
        <div class="acciones">
            <a class="acciones__enlace" href="/login">Inicair Sesión</a>
            <a class="acciones__enlace" href="/registro">Regístrate</a>
        </div>

</main>