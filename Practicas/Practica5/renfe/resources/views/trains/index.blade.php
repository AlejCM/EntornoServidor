<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trains</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Pasajeros</th>
                <th>Año</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
            <tr>
                <td>{{ $train->name }}</td>
                <td>{{ $train->passengers }}</td>
                <td>{{ $train->year }}</td>


                {{-- mirar el nombre del modelo que lo coge  --}}
                <td>{{ $train->trainType->type }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>