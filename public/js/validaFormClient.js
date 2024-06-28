document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Obtener los valores de los inputs
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Validar que los campos no estén vacíos
    if (!name) {
        alert('El campo Nombre es obligatorio');
        return;
    }

    if (!email) {
        alert('El campo Email es obligatorio');
        return;
    }

    if (!message) {
        alert('El campo Mensaje es obligatorio');
        return;
    }

    // Validar el formato del email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, introduce un email válido');
        return;
    }

    event.target.submit()
});