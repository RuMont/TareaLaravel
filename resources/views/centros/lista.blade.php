<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button>Añadir</button>
    <table>
        <tr>
            <th>ID</th>
            <th>city</th>
            <th>name</th>
        </tr>

        @foreach($centros as $centro)
            <tr>
                <td>{{$centro->id}}</td>
                <td>{{$centro->city}}</td>
                <td>{{$centro->name}}</td>
                <td>
                    <a href="{{url('centros/edit')}}/{{$centro->id}}">Editar</a>
                    <button>Borrar</button>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>