<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2><center>Data Guru</center></h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Gender</th>
                <th>Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $g)
                <tr>
                    <td>{{ $g->nama }}</td>
                    <td>{{ $g->nip }}</td>
                    <td>{{ $g->email }}</td>
                    <td>{{ $g->no_telp }}</td>
                    <td>{{ $g->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $g->mataPelajaran->mata_pelajaran ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
