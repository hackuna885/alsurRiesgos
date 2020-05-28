
Vue.component('ejemplo',{
    template: /*html*/
    `
    <div style="width: 380px; padding: 30px;">
        <div class="card animate__animated animate__fadeIn animate__delay-1s">
            <div class="card-header blue darken-4">
                <div style="padding: 30px; text-align: center;">
                    <img src="img/logo.svg" class="circle white" style="max-width: 150px; height: 150px; padding: 10px;">
                </div>
            </div>
            <div class="card-content">
                <form id="formulario">
                    <div class="input-field">
                        <input id="usuario" type="email" class="validate" name="usuario">
                        <label for="usuario"><img src="img/icons/usr.svg" class="left" style="margin-right: 10px;">Usuario:</label>
                    </div>
                    <div class="input-field">
                        <input id="pass" type="password" class="validate" name="pass">
                        <label for="pass"> <img src="img/icons/pw.svg" class="left" style="margin-right: 10px;">Contraseña:</label>
                    </div>
                    <div id="resultado">
                        
                    </div>
                    <div style="height: 40px;">
                        <button class="btn blue darken-4 right" type="submit">Continuar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    `,
})

new Vue({
    el: '#app'
})

let formulario = document.querySelector('#formulario')

formulario.addEventListener('submit', function(e){
    e.preventDefault()

    let resultado = document.querySelector('#resultado')
    let datos = new FormData(formulario)

    fetch('assets/js/login.app', {
        method: 'POST',
        body: datos
    })
    .then(res => res.json())
    .then(data => {
        if(data === 'error'){
            resultado.innerHTML = `
            <div class="red lighten-5" style="margin-bottom: 20px; padding: 0px 20px;">
                <p>Llena todos los campos</p>
            </div>
            `
        }else{
            resultado.innerHTML = `
            ${data}
            `
        }
    })
    
})
