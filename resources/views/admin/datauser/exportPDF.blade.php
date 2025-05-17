<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2><center>Data User</center></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password (Hash)</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
