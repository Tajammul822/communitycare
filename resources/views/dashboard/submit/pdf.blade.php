<!DOCTYPE html>
<html>

<head>
    <title>Details of submitted forms user details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h3>{{ $title }}</h3>
    <p>{{ $date }}</p>
    <p>List of all form submitted user details.</p>

    <table class="table table-bordered">
        <tr>
            <th>User name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Zip Code</th>
            <th>Submit Date</th>
        </tr>
        @foreach($pdf_data as $user)
        <tr>
            <td>{{ $user->first_name}} {{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->zip_code }}</td>
            <td>{{ $user->created_at }}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>