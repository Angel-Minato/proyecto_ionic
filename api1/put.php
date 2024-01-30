<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Registro</title>
</head>
<body>
    <h1>Actualizar Registro</h1>
    
    <form id="updateForm">
        <label for="ID">ID del Registro a Actualizar:</label>
        <input type="text" id="ID" name="ID" required><br>

        <label for="apodo">Nuevo Apodo:</label>
        <input type="text" id="apodo" name="apodo"><br>

        <label for="foto">Nueva URL de Foto:</label>
        <input type="text" id="foto" name="foto"><br>

        <label for="tel">Nuevo Número:</label>
        <input type="text" id="tel" name="tel"><br>

        <button type="button" id="putButton">Actualizar con PUT</button>
        <button type="button" id="patchButton">Actualizar con PATCH</button>
    </form>

    <div id="response"></div>

    <script>
        document.getElementById('putButton').addEventListener('click', function () {
            actualizarRegistro('PUT');
        });

        document.getElementById('patchButton').addEventListener('click', function () {
            actualizarRegistro('PATCH');
        });

        function actualizarRegistro(metodo) {
            var ID = document.getElementById('ID').value;
            var apodo = document.getElementById('apodo').value;
            var foto = document.getElementById('foto').value;
            var tel = document.getElementById('tel').value;

            var data = new URLSearchParams();
            data.append('ID', ID);
            data.append('apodo', apodo);
            data.append('foto', foto);
            data.append('tel', tel);

            fetch('method.php', {
                method: metodo,
                body: data
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(data) {
                document.getElementById('response').textContent = data;
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
