<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia más importante</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animation(); ?>class="devwebcamp__imagen">
        <picture>
            <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
            <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
            <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="imagen devwebcamp">
        </picture>
    </div>
    <div <?php aos_animation(); ?> class="devwebcamp__contenido">
        <p class="devwebcamp__texto">Ipsum dolor sit amet consectetur adipisicing elit. Quaerat totam minima impedit numquam aspernatur nesciunt repellat distinctio, et nostrum repellendus deserunt, accusantium quo iure sapiente ut dolor nisi ducimus exercitationem!
            
        </p>
        <p class="devwebcamp__texto">Ipsum dolor sit amet consectetur adipisicing elit. Quaerat totam minima impedit numquam aspernatur nesciunt repellat distinctio, et nostrum repellendus deserunt, accusantium quo iure sapiente ut dolor nisi ducimus exercitationem!

        </p>
    </div>
    </div>
</main>