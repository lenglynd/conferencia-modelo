<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información personal</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre</label>
        <input type="text" 
               name="nombre"
               id="nombre"
               class="formulario__input"
               placeholder="Nombre Ponente"
               value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="apellido">Apellido</label>
        <input type="text" 
               name="apellido"
               id="apellido"
               class="formulario__input"
               placeholder="Apellido Ponente"
               value="<?php echo $ponente->apellido ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="ciudad">Ciudad</label>
        <input type="text" 
               name="ciudad"
               id="ciudad"
               class="formulario__input"
               placeholder="Ciudad Ponente"
               value="<?php echo $ponente->ciudad ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="pais">Pais</label>
        <input type="text" 
               name="pais"
               id="pais"
               class="formulario__input"
               placeholder="Pais Ponente"
               value="<?php echo $ponente->pais ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="imagen">Imagen Ponente</label>
        <input type="file" 
               name="imagen"
               id="imagen"
               class="formulario__input formulario__input--file">
    </div>
    <?php if (isset($ponente->imagen_actual)) {?>
        <p class="formulario__texto">Imagen Actual: </p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'].'/img/speakers/'. $ponente->imagen; ?>.webp">
                <source srcset="<?php echo $_ENV['HOST'].'/img/speakers/'. $ponente->imagen; ?>.png">
                
                <img src="<?php echo $_ENV['HOST'].'/img/speakers/'. $ponente->imagen; ?>.png" alt="imagen ponente">
            </picture>
        </div>
    <?php } ?>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información extra</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="tags_input">Areas de experiencia (separadas por coma)</label>
        <input type="text" 
               id="tags_input"
               class="formulario__input"
               placeholder="Ej: Node.js, PHP, CSS. Laravel, UX/UI,"
               >
        
        <div class="formulario__listado" id="tags"></div>
        <input type="hidden" name="tags" value="<?php echo  $ponente->tags ?? ''; ?>">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <div class="formulario__campo">
        
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"> </i>

            </div>
           
           <input type="text" 
                  name="redes[facebook]"
                  class="formulario__input--sociales "
                  placeholder="Facebook"
                  value="<?php echo $redes->facebook ?? ''; ?>">
       </div>

   </div>
    <div class="formulario__campo">
        
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                
                <i class="fa-brands fa-x-twitter"></i>

            </div>
           
           <input type="text" 
                  name="redes[twitter]"
                  class="formulario__input--sociales "
                  placeholder="X-Twitter"
                  value="<?php echo $redes->twitter ?? ''; ?>">
       </div>

   </div>
    <div class="formulario__campo">
        
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"> </i>

            </div>
           
           <input type="text" 
                  name="redes[youtube]"
                  class="formulario__input--sociales "
                  placeholder="Youtube"
                  value="<?php echo $redes->youtube ?? ''; ?>">
       </div>

   </div>
    <div class="formulario__campo">
        
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"> </i>

            </div>
           
           <input type="text" 
                  name="redes[instagram]"
                  class="formulario__input--sociales "
                  placeholder="Instagram"
                  value="<?php echo $redes->instagram ?? ''; ?>">
       </div>

   </div>
    <div class="formulario__campo">
        
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"> </i>

            </div>
           
           <input type="text" 
                  name="redes[tiktok]"
                  class="formulario__input--sociales "
                  placeholder="Tiktok"
                  value="<?php echo $redes->tiktok ?? ''; ?>">
       </div>

   </div>
    <div class="formulario__campo">
        
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"> </i>

            </div>
           
           <input type="text" 
                  name="redes[github]"
                  class="formulario__input--sociales "
                  placeholder="Github"
                  value="<?php echo $redes->github ?? ''; ?>">
       </div>

   </div>

</fieldset>