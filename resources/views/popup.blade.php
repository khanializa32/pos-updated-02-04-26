<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Popup en Laravel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Fondo oscuro */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            justify-content: center;
            align-items: center;
        }

        /* Caja del popup */
        .popup {
            background: #fff;
            padding: 20px;
            width: 320px;
            border-radius: 8px;
            text-align: center;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 8px;
            right: 10px;
            cursor: pointer;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>

<h1>Página principal</h1>
<p>Contenido de la página...</p>

<!-- POPUP -->
<div class="popup-overlay" id="popup">
    <div class="popup">
        <span class="close-btn" onclick="cerrarPopup()">X</span>
        <h3>Publicidad</h3>
        <p>🎉 Oferta especial disponible 🎉</p>
        <img src="{{ asset('images/anuncio.jpg') }}" width="200">
    </div>
</div>

<script>
    // Mostrar popup después de 2 segundos
    window.onload = function () {
        setTimeout(function () {
            document.getElementById('popup').style.display = 'flex';
        }, 2000);
    };

    function cerrarPopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</body>
</html>
