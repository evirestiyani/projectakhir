<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Guru</title>
</head>
<body>
    <h1>Halo Guru</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
