<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container contact-form">
    <div class="contact-image">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/Escudo_de_Arrecife.svg" alt="logo_ayuntamiento">
    </div>
    <form method="post" id="formulario">
        <h3>Encuesta para los carnavales de Arrecife 2025</h3>
        <div class="check-container">
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Disney
                    </label>
                    <img class="img-option" src="{{asset('img/disney.jpg')}}" alt="disney">
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Aventuras
                    </label>
                    <img class="img-option" src="{{asset('img/aventuras.jpg')}}" alt="aventuras">
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Un carnaval de cuento
                    </label>
                    <img class="img-option" src="{{asset('img/cuento.jpg')}}" alt="un carnaval de cuento">
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Viajeros por el mundo
                    </label>
                    <img class="img-option" src="{{asset('img/viajeros.jpg')}}" alt="viajeros por el mundo">
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        El mundo murguero
                    </label>
                    <img class="img-option" src="{{asset('img/murguero.jpg')}}" alt="el mundo murguero">
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Un carnaval en la antigua Roma
                    </label>
                    <img class="img-option" src="{{asset('img/roma.jpg')}}" alt="antigua roma">
                </div>
            </div>
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Chicago Gangster años 30
                    </label>
                    <img class="img-option" src="{{asset('img/chicago.jpg')}}" alt="Chicago Gangster">
                </div>
            </div>
            <div class="send">
                <button id="vote-button" type="button" class="btn btn-outline-success">Votar</button>
            </div>
        </div>
    </form>
    <div id="response" style="display:none">
        <div class="mensaje">
            <img class="img-check" src="{{asset('img/circulo.png')}}" alt="imagen check">
            <h1>¡GRACIAS!</h1>
            <p>Votación realizada con éxito</p>
            <a href="https://www.arrecife.es/" class="btn-continuar">Continuar</a>
        </div>
    </div>
    <div id="response-error" class="response-error" style="display: none">
        <div class="mensaje">
            <img class="img-check" src="{{asset('img/cerrar.png')}}" alt="imagen error">
            <h1>¡ERROR!</h1>
            <p>Ya has realizado una votación</p>
            <a href="https://www.arrecife.es/" class="btn-continuar">Continuar</a>
    </div>
</div>


<script>

    // Seleccionar el boton de votar
    var voteButton = document.getElementById('vote-button');
    var responseElement = document.getElementById('response');
    var voteForm = document.getElementById('formulario');
    var responseElementError = document.getElementById('response-error');


    function submitForm(){
        // obtener la dirección IP pública del usuario
        $.getJSON('https://api.ipify.org?format=json', function(data){
            console.log(data.ip);
            // Obtener el valor seleccionado
            var selectedRadio = $('input[name="flexRadioDefault"]:checked');
            // Obtener el texto del label asociado con el valor seleccionado
            var selectedText = $('label[for="' + selectedRadio.attr('id') + '"]').text();
            // enviar la dirección IP pública y el valor seleccionado a la base de datos
            $.ajax({
                url: 'http://127.0.0.1:8000/vote',
                type: 'POST',
                data: {
                    ip: data.ip,
                    vote: selectedText // Enviar el texto seleccionado
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    console.log(response);
                    // Ocultar el formulario
                    voteForm.style.display = 'none';
                    // mostrar la respuesta en el elemento de resspuesta
                    /* responseElement.textContent = JSON.stringify(response); */
                    // Hacer visible el elemento de respuesta
                    if (response){
                        responseElement.style.display = 'block';
                    }
                },
                error: function(jqXHR, textStatus, errorTrown){
                    console.log(jqXHR, textStatus, errorTrown);
                    // Mostrar el elemento de error
                    voteForm.style.display = 'none';
                    responseElementError.style.display = 'block';
                }
            });
        });
    }

    // Agregar un controlador de eventos click al botón de votar
    voteButton.addEventListener('click', function(){
        // Llamar a la función submitForm
        submitForm();
    });

</script>
