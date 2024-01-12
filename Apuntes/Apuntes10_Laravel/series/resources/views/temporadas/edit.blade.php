<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('temporadas.update', ['temporada' => $temporada -> id]) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $temporada -> nombre }}"><br><br>
        <label>Id Temporada</label>
        <input type="text" name="id_temporada" value="{{ $temporada -> id_temporada }}"><br><br>
        <label>Titulo de Temporada</label>
        <input type="text" name="titulo" value="{{ $temporada -> titulo }}"><br><br>
        <label>Capitulos</label>
        <input type="text" name="capitulos" value="{{ $temporada -> capitulos }}"><br><br>
        <input type="submit" value="Editar">
    </form>
</body>
</html>