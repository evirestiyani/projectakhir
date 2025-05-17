<!DOCTYPE html>
<html>
<head>
    <title>Data Murid</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2><center>Data Murid</center></h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>No. Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>ID User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($murid as $m)
                <tr>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->nis }}</td>
                    <td>{{ $m->kelas }}</td>
                    <td>{{ $m->no_telp }}</td>
                    <td>{{ $m->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $m->tgl_lahir }}</td>
                    <td>{{ $m->id_user }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
