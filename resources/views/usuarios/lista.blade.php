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
            <th>dni</th>
            <th>Name</th>
            <th>Surname</th>
            <th>birthDate</th>
            <th>Centre_id</th>
            

        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->dni}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->birth_date}}</td>
                <td>{{$user->centre_id}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>