@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Tambah Data Guru</h3>
    
    <form action="{{ route('dataguru.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Telepon</label>
                <input type="text" name="no_telp" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">ID User</label>
                <input type="number" name="id_user" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mata Pelajaran</label>
                <select name="mata_pelajaran" class="form-select" required>
                    @foreach($mapel as $m)
                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('dataguru.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
