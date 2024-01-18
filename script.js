document.getElementById('enviar').addEventListener('click', function () {
    // Obtener los valores de los campos de entrada
    var nameValue = document.getElementById('nameInput').value;
    var emailValue = document.getElementById('emailInput').value;
    var textareaValue = document.getElementById('textarea').value;

    // Crear una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud
    xhr.open('POST', 'data.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Definir la función de devolución de llamada
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("respuesta").innerHTML = xhr.responseText;
            // Limpiar los campos de entrada después de manejar la respuesta
            document.getElementById('nameInput').value = '';
            document.getElementById('emailInput').value = '';
            document.getElementById('textarea').value = '';
        }
    };

    // Enviar la solicitud con los valores de los campos de entrada
    xhr.send('name=' + encodeURIComponent(nameValue) + '&email=' + encodeURIComponent(emailValue) + '&comentario=' + encodeURIComponent(textareaValue));
});