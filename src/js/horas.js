(function () {
    const horas = document.querySelector('#horas');   
    if (horas) {
        const categoria = document.querySelector('[name="categoria_id"]');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');
        categoria.addEventListener('change', terminoBusqueda);
        const dias = document.querySelectorAll('[name="dia"]');
        dias.forEach(dia => dia.addEventListener('change', terminoBusqueda));
        let busqueda = {
            categoria_id: +categoria.value || '',
            dia: +inputHiddenDia.value || ''
        }
        if (!Object.values(busqueda).includes('')) {
            (async() => {
                
               await buscarEventos();
                const id = inputHiddenHora.value;
                const horaSeleccionada = document.querySelector(`[data-hora-id="${id}"]`);
                horaSeleccionada.classList.remove('horas__hora--desabilitada')
                horaSeleccionada.classList.add('horas__hora--seleccionada');
                horaSeleccionada.onclick = seleccionarHora;

            })();
        }
        function terminoBusqueda(e) {
            busqueda[e.target.name] = e.target.value;
            inputHiddenHora.value = '';
            inputHiddenDia.value = '';
            const horaPrevia = document.querySelector('.horas__hora--seleccionada')
                if (horaPrevia) {
                    horaPrevia.classList.remove('horas__hora--seleccionada')
                }
            if (Object.values(busqueda).includes('')) {
                return;
            }
            buscarEventos();
        }
        async function buscarEventos() {
            const { dia, categoria_id } = busqueda;
            const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;
         
           
            const resultado = await fetch(url);
            const eventos = await resultado.json();
            
            obtenerHorasDisponibles(eventos);
        }
        
        function obtenerHorasDisponibles(eventos) {
            const listadoHora = document.querySelectorAll('#horas li');
            
            listadoHora.forEach(li => li.classList.add('horas__hora--desabilitada'));
            
            const horasTomadas = eventos.map(evento => evento.hora_id);
            const listadoHoraArray = Array.from(listadoHora);
            const resultado = listadoHoraArray.filter(li => !horasTomadas.includes(li.dataset.horaId));
            resultado.forEach(li => li.classList.remove('horas__hora--desabilitada'));
            
            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--desabilitada)');
            horasDisponibles.forEach(hora => hora.addEventListener('click', seleccionarHora));
        }

        function seleccionarHora(e) {
            const horaPrevia = document.querySelector('.horas__hora--seleccionada')
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada')
            }
                            
            e.target.classList.add('horas__hora--seleccionada');
            inputHiddenHora.value = e.target.dataset.horaId;
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;
        }
    }



})();