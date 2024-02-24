import Swal from "sweetalert2";

(function () {
    let eventos = [];
    const resumen = document.querySelector('.registro__resumen')

    if (resumen) {
        
        const eventosBtn = document.querySelectorAll('.evento__agregar');
        eventosBtn.forEach(boton => boton.addEventListener('click', seleccionarEvento));
        mostrarEvento();
        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);
        function seleccionarEvento(e) {
    
            if (eventos.length < 5) {
                const { target } = e;
                target.disabled = true;
                eventos = [...eventos, {
                    id: target.dataset.id,
                    titulo: target.parentElement.querySelector('.evento__nombre').textContent.trim()
                    
                }];
                mostrarEvento();
                
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Máximo 5 evento por registro',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        }
        function mostrarEvento() {
            limpiarEventos();
            if (eventos.length > 0) {
                eventos.forEach(evento => {
                    const eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro__evento');
    
    
                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;
    
                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                    botonEliminar.onclick = function () {
                        eliminarEvento(evento.id);
                    }
    
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    resumen.appendChild(eventoDOM);
                })
            } else {
                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'no hay eventos, añade hasta 5';
                noRegistro.classList.add('registro__texto');
                resumen.appendChild(noRegistro);
            }
        }
        function eliminarEvento(id) {
            eventos = eventos.filter(evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEvento();
        }
        function limpiarEventos() {
            while (resumen.firstChild) {
                resumen.removeChild(resumen.firstChild);
            }
        }
        async function submitFormulario(e) {
            e.preventDefault();
            const regaloId = document.querySelector('#regalo').value;
            const eventosId = eventos.map(evento => evento.id);

            if (eventosId.length === 0 || regaloId === '') {
                Swal.fire({
                    title: 'Error',
                    text: 'Elige al menos un evento y un regalo',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
                return;
            }
            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo_id', regaloId);
            const url = `${location.origin}/finalizar-registro/conferencias`;
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();
            if (resultado.resultado) {
                Swal.fire(
                    'Registro Exitoso',
                    'Tus Conferencias se han registrado correctamente, te esperamos en DevWebCamp',
                    'success'
                ).then( () => location.href = `/boleto?id=${resultado.token}`);
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Algunos de los eventos están agotados',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then( () => location.reload());
            }
        }
    }

})();