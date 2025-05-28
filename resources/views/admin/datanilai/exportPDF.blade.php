<!DOCTYPE html>
<html>
<head>
    <title>Data Nilai</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2><center>Data Nilai Siswa</center></h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Guru</th>
                <th>Murid</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
                <th>Predikat</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $n)
                <tr>
                    <td>{{ $n->id }}</td>
                    <td>{{ $n->guru->nama ?? '-' }}</td>
                    <td>{{ $n->murid->nama ?? '-' }}</td>
                    <td>{{ $n->mataPelajaran->mata_pelajaran ?? '-' }}</td>
                    <td>{{ $n->nilai }}</td>
                    <td>{{ $n->predikat }}</td>
                    <td>{{ $n->semester }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
