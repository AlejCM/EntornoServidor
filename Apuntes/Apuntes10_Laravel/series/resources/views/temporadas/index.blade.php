<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    {{-- Las dobles llaves es como hacer un php echo --}}
    <p>{{ $mensaje }}</p> 
    <table>
        <tr>
            <th>Nombre</th>
            <th>Indice Temporada</th>
            <th>Titulo Temporada</th>
            <th>Capitulos</th>
        </tr>
        @foreach ($temporadas as $temporada)
            <tr>
                <td>{{ $temporada->nombre }}</td>
                <td>{{ $temporada->id_temporada }}</td>
                <td>{{ $temporada->titulo }}</td>
                <td>{{ $temporada->capitulos }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>