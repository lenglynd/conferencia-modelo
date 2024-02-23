<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Ultimos Registros</h3>
            <?php foreach ($registros as $registro) : ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $registro->usuario->nombre." ".$registro->usuario->apellido; ?>
                    </p>
                </div>

            <?php endforeach; ?>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Ingresos Totales</h3>
            <p class="bloque__texto--cantidad"><?php echo '€ '.substr($ingresos,0,-2); ?></p>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Eventos con Menos Lugares Disponibles</h3>
            <?php foreach ($menos_lugares as $evento) : ?>
                <div class="bloque__contenido">

                    <p class="bloque__texto">
                        <?php echo $evento->nombre." ".$evento->disponibles." Disponibles"; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Eventos con Menos Lugares Disponibles</h3>
            <?php foreach ( $mas_lugares as $evento) : ?>
                <div class="bloque__contenido">

                    <p class="bloque__texto">
                        <?php echo $evento->nombre." ".$evento->disponibles." Disponibles"; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>