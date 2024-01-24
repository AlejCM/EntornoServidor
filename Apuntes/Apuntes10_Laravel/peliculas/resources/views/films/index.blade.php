<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        @foreach ($films as $film)
            <li>{{ $film->title }}</li>
            @php
                $actors = $film->actors;
            @endphp
            <ul>
                @foreach ($actors as $actor)
                    <li>{{ $actor->first_name }} {{ $actor->last_name }}</li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</body>
</html>