<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ostia son series</h1>
    {{-- Las dobles llaves es como hacer un php echo --}}
    <p>{{ $mensaje }}</p> 
    <table>
        <tr>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Temporadas</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        @foreach ($series as $serie)
            <tr>
                {{-- 
                <td>{{ $serie[0] }}</td>
                <td>{{ $serie[1] }}</td>
                <td>{{ $serie[2] }}</td> 
                --}}
                <td>{{ $serie->titulo }}</td>
                <td>{{ $serie->plataforma }}</td>
                <td>{{ $serie->temporadas }}</td>
                <td>
                    <form action="{{ route('series.show', ['series' => $serie -> id]) }}" method="GET">
                        <input type="submit" value="Ver">
                    </form>
                </td>
                <td>
                    <form action="{{ route('series.edit', ['series' => $serie -> id]) }}" method="GET">
                        <input type="submit" value="Editar">
                    </form>
                </td>
                <td>
                    <form action="{{ route('series.destroy', ['series' => $serie -> id]) }}" method="POST">
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