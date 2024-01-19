<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Tickets</title>
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
        <h1>Editar Ticket</h1>
        <hr>
        <form action="{{ route('tickets.update',  ['ticket' => $ticket -> id]) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="mb-3">
                <label class="form-label">Fecha</label>
                <input class="form-control" type="date" name="date" value="{{ $ticket->date }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="text" name="price" value="{{ $ticket->price }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre del tren</label>
                <select class="form-control" name="train_id">
                    @foreach ($trains as $train)
                        <option value="{{ $train->id }}" 
                            @php
                                if ($train->id == $ticket->train_id){
                                    echo "selected";
                                }    
                            @endphp
                        >{{ $train->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de ticket</label>
                <select class="form-control" name="ticket_type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" 
                            @php
                                if ($type->id == $ticket->ticket_type_id){
                                    echo "selected";
                                }    
                            @endphp
                        >{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-dark" type="submit" value="Editar">
                <a class="btn btn-dark" href="/tickets">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>