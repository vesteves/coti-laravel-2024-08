<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Listagem de Servidores</h1>

    <ul>
        @foreach ($servidores as $servidor)
        <li>{{ $servidor["name"] }} - {{ $servidor["max"] }}</li>
        @endforeach
    </ul>
</body>

</html>