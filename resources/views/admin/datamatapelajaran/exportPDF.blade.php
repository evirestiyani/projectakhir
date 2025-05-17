<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Pelajaran</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2><center>Data Mata Pelajaran</center></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mapel as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->kode }}</td>
                    <td>{{ $m->mata_pelajaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
