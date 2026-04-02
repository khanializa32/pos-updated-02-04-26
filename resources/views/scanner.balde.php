<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escáner de Código de Barras</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
</head>
<body>

<h2>Escanear producto</h2>

<div id="scanner" style="width:300px;height:200px;"></div>

<hr>

<div id="resultado" style="display:none;">
    <h3 id="nombre"></h3>
    <img id="imagen" width="150">
    <p><strong>Precio:</strong> $<span id="precio"></span></p>
    <p><strong>Stock:</strong> <span id="stock"></span></p>
</div>

<script>
Quagga.init({
    inputStream: {
        name: "Live",
        type: "LiveStream",
        target: document.querySelector('#scanner')
    },
    decoder: {
        readers: ["code_128_reader", "ean_reader", "ean_8_reader"]
    }
}, function (err) {
    if (!err) {
        Quagga.start();
    }
});

Quagga.onDetected(function (data) {
    let codigo = data.codeResult.code;

    fetch(`/producto/${codigo}`)
        .then(res => res.json())
        .then(producto => {
            if (producto.error) {
                alert(producto.error);
                return;
            }

            document.getElementById('resultado').style.display = 'block';
            document.getElementById('nombre').innerText = producto.nombre;
            document.getElementById('imagen').src = `/storage/${producto.imagen}`;
            document.getElementById('precio').innerText = producto.precio;
            document.getElementById('stock').innerText = producto.stock;
        });

    Quagga.stop();
});
</script>

</body>
</html>
