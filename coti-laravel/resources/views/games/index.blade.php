<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,
        th {
            border: 1px solid #333;
            text-align: center;
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>Listar Jogos</h1>
    <a href='{{ route("games.create") }}'>Criar Jogo</a>
    <table>
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th colspan="2">Ações</th>
        </thead>
        <tbody>
            @foreach($games as $game)
            <tr>
                <td>{{ $game["id"] }}</td>
                <td>{{ $game["name"] }}</td>
                <td><a href="{{ route('games.edit', ['id' => $game['id']]) }}">Editar</a></td>
                <td><a href="{{ route('games.destroy', ['id' => $game['id']]) }}">Remover</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>