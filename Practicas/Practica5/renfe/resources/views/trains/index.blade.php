<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trains</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
</head>
<body>
    <div class="indice">
        <ul class="row justify-content-end">
            <li class="col-1 mt-2"><a href="/trains">Trenes</a></li>
            <li class="col-1 mt-2"><a href="/tickets">Tickets</a></li>
            <li class="col-1 mt-2"><a href="/trainTypes">Tipos de Tren</a></li>
            <li class="col-1 mt-2"><a href="/ticketTypes">Tipos de Ticket</a></li>
        </ul>
    </div>
    <div class="container mt-3">
        <h1>Trenes</h1>
        <hr>
        <table class="table table-dark table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Pasajeros</th>
                    <th>Año</th>
                    <th>Tipo</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                <tr>
                    <td>{{ $train->id }}</td>
                    <td>{{ $train->name }}</td>
                    <td>{{ $train->passengers }}</td>
                    <td>{{ $train->year }}</td>
                    <td>{{ $train->trainType->type }}</td>
                    <td>
                        <form action="{{ route('trains.show', ['train' => $train -> id]) }}" method="GET">
                            <input class="btn btn-light" type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('trains.edit', ['train' => $train -> id]) }}" method="GET">
                            <input class="btn btn-light" type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('trains.destroy', ['train' => $train -> id]) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-dark mt-3" href="/trains/create">Crear</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>