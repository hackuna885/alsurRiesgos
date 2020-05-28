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