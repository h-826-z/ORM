<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr class="table-danger">
                <td>Id</td>
                <td>Employee Name</td>
                <td>Position ID</td>
                <td>Position Name</td>
                <td>Email</td>
                <td>Salary</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody> @foreach ($employee as $data) <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->position_id }}</td>
                <td>{{ $data->position['position_name'] }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->salary }}</td>
                <td>{{ $data->description }}</td>
            </tr> @endforeach
        </tbody>
    </table>
</body>

</html>