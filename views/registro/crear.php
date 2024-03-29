<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo ?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
        <div class="paquete">
            <h3 class="paquete__nombre">
                Pase Gratis
            </h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">
                    Acceso Virtual a DevWebCamp
                </li>
            </ul>
            <p class="paquete__precio">
                € 0
            </p>
            <form action="/finalizar-registro/gratis" method="post" >
                <input type="submit" value="Incripción Gratis" class="paquetes__submit">

            </form>
        </div>
        <div class="paquete">
            <h3 class="paquete__nombre">
                Pase Presencial
            </h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">
                    Acceso Virtual a DevWebCamp
                </li>
                <li class="paquete__elemento">
                    Acceso Pase para 2 dias
                </li>
                <li class="paquete__elemento">
                    Acceso a talleres y conferencias
                </li>
                <li class="paquete__elemento">
                    Acceso a las grabaciones
                </li>
                <li class="paquete__elemento">
                    Camisa del Evento
                </li>
                <li class="paquete__elemento">
                    Comida y Bebida
                </li>
            </ul>
            <p class="paquete__precio">
                € 186
            </p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="paquete">
            <h3 class="paquete__nombre">
                Pase Virtual
            </h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">
                    Acceso Virtual a DevWebCamp
                </li>
                <li class="paquete__elemento">
                    Acceso Pase para 2 dias
                </li>
                <li class="paquete__elemento">
                    Acceso a talleres y conferencias
                </li>
                <li class="paquete__elemento">
                    Acceso a las grabaciones
                </li>
            </ul>
            <p class="paquete__precio">
                € 45
            </p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container--virtual">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Reemplazar CLIENT_ID por tu client id proporcionado al crear la app desde el developer dashboard) -->
<script src="https://www.paypal.com/sdk/js?client-id=AUMIxRp3y5ClgtocvWLtWB7z1BvaWHT6Okp72hsMT8DMQyaxpcYbcEZW7TYdWEaHJXaj8G9MBA1TQmSB&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
 
<script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },
 
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"EUR","value":186}}]
          });
        },
 
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
 
            // Full available details
            console.log(orderData);
            
            const datos = new FormData();
            datos.append('paquete_id', orderData.purchase_units[0].description);
            datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
            fetch('/finalizar-registro/pagar', {
                method: 'POST',
                body: datos
            })
            .then( respuesta => respuesta.json())
            .then( resultado => {
                if (resultado.resultado) {
                    actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                }
            })
            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },
 
        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
      /// segundo boton confrencia virtual
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },
 
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"2","amount":{"currency_code":"EUR","value":45}}]
          });
        },
 
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
 
            // Full available details
            console.log(orderData);
            
            const datos = new FormData();
            datos.append('paquete_id', orderData.purchase_units[0].description);
            datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);
            fetch('/finalizar-registro/pagar', {
                method: 'POST',
                body: datos
            })
            .then( respuesta => respuesta.json())
            .then( resultado => {
                if (resultado.resultado) {
                    actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                }
            })
            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },
 
        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container--virtual');


      
    }
 
  initPayPalButton()
  ;
</script>
