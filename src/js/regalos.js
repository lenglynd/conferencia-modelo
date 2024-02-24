(function () {
    
  
  const ctx = document.getElementById('regalos-grafica');
    if (ctx) {
        obtenerDatos();
        async function obtenerDatos() {
            const url = `${location.origin}/api/regal`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();
            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: resultado.map(regalo => regalo.nombre),
                datasets: [{
                    label: '',
                    data: resultado.map(regalo => regalo.total),
                    backgroundColor: [
                        '#ea580c',
                        '#84cc16',
                        '#22d3ee',
                        '#a855f7',
                        '#ef4444',
                        '#14b8a6',
                        '#db2777',
                        '#e11d48',
                        '#7e22ce'
                    ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: false
                  }
                },
                  plugins: {
                      legend: {
                        display: false
                    }
                }
              }
            });
        }

    }      


})();