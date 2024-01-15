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
            <th>Serie</th>
            <th>numero Temp</th>
            <th>Titulo Temp</th>
            <th>Capitulos</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        @foreach ($temporadas as $temporada)
            <tr>
                <td>{{ $temporada->serie->titulo }}</td>
                <td>{{ $temporada->id_temporada }}</td>
                <td>{{ $temporada->titulo }}</td>
                <td>{{ $temporada->capitulos }}</td>
                <td>
                    <form action="{{ route('temporadas.show', ['temporada' => $temporada -> id]) }}" method="GET">
                        <input type="submit" value="Ver">
                    </form>
                </td>
                <td>
                    <form action="{{ route('temporadas.edit', ['temporada' => $temporada -> id]) }}" method="GET">
                        <input type="submit" value="Ver">
                    </form>
                </td>
                <td>
                    <form action="{{ route('temporadas.destroy', ['temporada' => $temporada -> id]) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>