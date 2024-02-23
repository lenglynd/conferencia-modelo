<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del Evento</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre Evento</label>
        <input type="text" 
               name="nombre"
               id="nombre"
               class="formulario__input"
               placeholder="Nombre Evento"
               value="<?php echo $evento->nombre ?? ''; ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Descripcion</label>
        <textarea 
               name="descripcion"
               id="descripcion"
               class="formulario__input"
               placeholder="Descripcion Evento"
              
               rows="8"
        ><?php echo $evento->descripcion ?? ''; ?></textarea>
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="categoria">Categorias | Tipo de evento</label>
        <select class="formulario__select" name="categoria_id" id="categoria">
            <option value="">--Selencionar--</option>
            <?php foreach ($categorias as $categoria) : ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : '' ; ?> value="<?php echo $categoria->id ?>"><?php echo $categoria->nombre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="dia">Selecciona el día</label>
        <div class="formulario__radio">
             <?php foreach ($dias as $dia) : ?>
                    <div class="">
                        <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>
                        <input type="radio" name="dia" id="<?php echo strtolower($dia->nombre); ?>"
                            value="<?php echo $dia->id; ?>" 
                            <?php echo ($evento->dia_id === $dia->id) ? 'checked' : ''; ?>
                        >
                    </div>
                <?php endforeach; ?>   
        </div>
        <input type="hidden" name="dia_id" value="<?php echo $evento->dia_id ?>">
    </div>
    <div id="horas" class="formulario__campo">
        <label for="" class="formulario__label">Seleccionar Hora</label>
       
        <ul class="horas">
            <?php foreach ($horas as $hora) : ?>
                <li data-hora-id="<?php echo $hora->id ?>" class="horas__hora horas__hora--desabilitada"><?php echo $hora->hora; ?></li>
            <?php endforeach; ?>
        </ul>
        <input  type="hidden" name="hora_id" value="<?php echo $evento->hora_id ?>">
    </div>
    
</fieldset>
<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>
    <div class="formulario__campo">
        <label class="formulario__label" for="ponente">Ponente</label>
        <input type="text" 
              
               id="ponente"
               class="formulario__input"
               placeholder="Buscar Ponente"
              
               />
               <ul id="listado-ponentes" class="listado-ponentes">

               </ul>
               <input type="hidden" name="ponente_id" value="<?php echo $evento->ponente_id ?>">
    </div>
    <div class="formulario__campo">
        <label class="formulario__label" for="disponibles">Ponente</label>
        <input type="number"
                min="1"
               name="disponibles"
               id="disponibles"
               class="formulario__input"
               placeholder="Ej. 20"
               value="<?php echo $evento->disponibles ?>"
               />
    </div>
</fieldset>
