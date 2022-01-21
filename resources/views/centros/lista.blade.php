<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>CityName</th>
            <th>Name</th>
        </tr>

        @foreach($centros as $centro)
            <tr>
                <td>{{$centro->id}}</td>
                <td>{{$centro->city}}</td>
                <td>{{$centro->name}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>