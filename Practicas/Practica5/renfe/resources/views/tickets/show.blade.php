<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <h1>Ticket</h1>
        <hr>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Dia</th>
                    <th>Precio</th>
                    <th>Tren</th>
                    <th>Tipo de ticket</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->date }}</td>
                    <td>{{ $ticket->price }}</td>
                    <td>{{ $ticket->train->name }}</td>
                    <td>{{ $ticket->ticketType->type }}</td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-dark mt-3" href="/tickets">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>