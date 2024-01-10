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
            </tr>
        @endforeach
    </table>
</body>
</html>