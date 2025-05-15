@extends('layouts.layout')

@section('content')
<div class="container">
    <h3>Edit Guru</h3>
    <form action="{{ route('dataguru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input class="form-control mb-2" name="nama" value="{{ $guru->nama }}">
        <input class="form-control mb-2" name="nip" value="{{ $guru->nip }}">
        <input class="form-control mb-2" name="email" value="{{ $guru->email }}">
        <input class="form-control mb-2" name="no_telp" value="{{ $guru->no_telp }}">
        <select class="form-control mb-2" name="jenis_kelamin">
            <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        <input class="form-control mb-2" type="date" name="tanggal_lahir" value="{{ $guru->tanggal_lahir }}">
        <input class="form-control mb-2" name="id_user" value="{{ $guru->id_user }}">
        <select class="form-control mb-2" name="id_mapel">
            @foreach($mapel as $m)
                <option value="{{ $m->id }}" {{ $guru->id_mapel == $m->id ? 'selected' : '' }}>{{ $m->nama }}</option>
            @endforeach
        </select>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
