(function () {
    const ponentesInput = document.querySelector('#ponente');
    if (ponentesInput) {
        let ponentes = [];
        let ponentesFiltrados = [];

        const listadoPonentes = document.querySelector('#listado-ponentes');
        const ponenteHidden = document.querySelector('[name="ponente_id"]');

        obtenerPonentes();
        ponentesInput.addEventListener('input', buscarPonentes)

        if (ponenteHidden.value) {
            (async() => {
                const ponente = await obtenerPonente(ponenteHidden.value);
                
                
                const ponenteDOM = document.createElement('LI');
                ponenteDOM.classList.add('listado-ponentes__ponente', 'listado-ponentes--seleccionado');
                ponenteDOM.textContent = `${ponente.nombre} ${ponente.apellido}`;
                listadoPonentes.appendChild(ponenteDOM);
            })();
        }
        async function obtenerPonentes() {
            const url = `${location.origin}/api/ponentes`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            formatearPonentes(resultado);
            
            
        }
        async function obtenerPonente(id) {
            const url = `${location.origin}/api/ponente?id=${id}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            

            return resultado;
        }

        function formatearPonentes(arrayPonentes = []) {
            ponentes = arrayPonentes.map(ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            });
        }
        function buscarPonentes(e) {
            const busqueda = e.target.value;
            if (busqueda.length > 3) {
                const expresion = new RegExp(busqueda, "i");
                ponentesFiltrados = ponentes.filter(ponente => {
                    if (ponente.nombre.toLowerCase().search(expresion) != -1) {
                        return ponente
                    }
                })
                
             } else {
                ponentesFiltrados = [];
             }
            mostrarPonentes();
        }
        function mostrarPonentes() {
            while (listadoPonentes.firstChild ) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }
            if (ponentesFiltrados.length > 0) {
                ponentesFiltrados.forEach(ponente => {
                    const ponenteHTML = document.createElement('LI');
                    ponenteHTML.classList.add('listado-ponentes__ponente');
                    ponenteHTML.textContent = ponente.nombre;
                    ponenteHTML.dataset.ponenteId = ponente.id;
                    ponenteHTML.onclick = seleccionarPonente;
    
                    listadoPonentes.appendChild(ponenteHTML);
                });
                
            } else {  
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponentes__no-resultado');
                noResultados.textContent = 'No hay resultado de ponentes';
                listadoPonentes.appendChild(noResultados);
            }
        }
        function seleccionarPonente(e) {
            const ponente = e.target;
            const ponentePrevio = document.querySelector('.listado-ponentes--seleccionado');
            if (ponentePrevio) {
                ponentePrevio.classList.remove('listado-ponentes--seleccionado');
            }
            ponente.classList.add('listado-ponentes--seleccionado')
            ponenteHidden.value = e.target.dataset.ponenteId;
        }


    }
})();