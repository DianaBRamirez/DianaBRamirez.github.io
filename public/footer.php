</body>
<script>
    function validarFormulario() {
        var usuario = document.getElementById('usuario').value;
        var email = document.getElementById('email').value;
        var comentarios = document.getElementById('comentarios').value;
        var div = document.getElementById('errores')
        var condicionEmail = /^[a-zA-Z0-9._-]+@gmail\.com$/;
        var condicionNombre = /^[a-zA-Z\s]+$/;

        var mensajesError = '';

        if (!condicionNombre.test(usuario)) {
            mensajesError += 'El campo solo acepta letras.<br>';
        }

        if (!condicionEmail.test(email)) {
            mensajesError += 'Ingrese una cuenta de Gmail válida.<br>';
        }

        if (codigoMalicioso(comentarios)) {
            mensajesError += 'Los comentarios no pueden contener código malicioso.<br>';
        }


        if (mensajesError !== '') {
            div.removeAttribute('hidden');
            div.innerHTML = mensajesError;
            return false;
        } else {
            console.log('Usuario:', usuario);
            console.log('Email:', email);
            if ((usuario.toLowerCase() === 'diana' && email.toLowerCase() === 'dianacorreo@gmail.com') ||
                (usuario.toLowerCase() === 'juan' && email.toLowerCase() === 'juan@gmail.com')) {
                console.log('Redirigiendo a bienvenida.php');
                window.location.href = 'bienvenida.php';
            } else {
                alert('Usuario sin acceso');
                return false;
            }
        }


        return false;
    }

    function ValidarLetras(e) {
        var key = e.keyCode || e.which,
            tecla = String.fromCharCode(key).toLowerCase(),
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
            especiales = [8],
            tecla_especial = false;

        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            return false;
        }
    }

    function codigoMalicioso(input) {
        var codigoMalicioso = ['<script>', 'alert(', 'eval(', 'xss'];

        for (var i = 0; i < codigoMalicioso.length; i++) {
            if (input.includes(codigoMalicioso[i])) {
                return true;
            }
        }

        return false;
    }
</script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>