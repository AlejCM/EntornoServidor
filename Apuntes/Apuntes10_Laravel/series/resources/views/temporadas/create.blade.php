<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('temporadas.store') }}" method="POST">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre"><br><br>
        <label>Id Temporada</label>
        <input type="text" name="id_temporada"><br><br>
        <label>Titulo de Temporada</label>
        <input type="text" name="titulo"><br><br>
        <label>Capitulos</label>
        <input type="text" name="capitulos"><br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>