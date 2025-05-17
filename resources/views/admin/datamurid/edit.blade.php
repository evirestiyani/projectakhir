@extends('layouts.layout')

@section('content')
    <div class="edit-murid-container py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-lg">
                        <div class="card-header bg-gradient-primary p-4 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-black mb-0 font-weight-bold">Edit Data Murid</h3>
                                <a href="{{ route('admin.datamurid.index') }}" class="btn btn-light btn-sm rounded-pill px-3">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            {{-- Tampilkan error validasi --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('datamurid.update', $murid->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-user" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="text"
                                                    name="nama" id="nama" value="{{ old('nama', $murid->nama) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="nis" class="form-label fw-bold">NIS</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-id-card" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="text"
                                                    name="nis" id="nis" value="{{ old('nis', $murid->nis) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="kelas" class="form-label fw-bold">Kelas</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-school" style="color: #309898;"></i>
                                                </span>
                                                <select class="form-select border-0 bg-light py-2" name="kelas"
                                                    id="kelas" required>
                                                    <option value="" selected disabled>-- Pilih Kelas --</option>
                                                    @foreach ($kelasList as $kelas)
                                                        <option value="{{ $kelas }}" {{ old('kelas', $murid->kelas) == $kelas ? 'selected' : '' }}>
                                                            {{ $kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="no_telp" class="form-label fw-bold">No. Telepon</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-phone" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="text"
                                                    name="no_telp" id="no_telp" value="{{ old('no_telp', $murid->no_telp) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-venus-mars" style="color: #309898;"></i>
                                                </span>
                                                <select class="form-select border-0 bg-light py-2" name="jenis_kelamin"
                                                    id="jenis_kelamin" required>
                                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                                    <option value="L" {{ old('jenis_kelamin', $murid->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="P" {{ old('jenis_kelamin', $murid->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="tgl_lahir" class="form-label fw-bold">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-calendar" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="date"
                                                    name="tgl_lahir" id="tgl_lahir"
                                                    value="{{ old('tgl_lahir', $murid->tgl_lahir) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="id_user" class="form-label fw-bold">ID User</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-fingerprint" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="number"
                                                    name="id_user" id="id_user" value="{{ old('id_user', $murid->id_user) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-2 justify-content-end">
                                    <a href="{{ route('admin.datamurid.index') }}" class="btn btn-light px-4 py-2">
                                        <i class="fas fa-times me-1" style="color: #309898;"></i> Batal
                                    </a>
                                    <button class="btn btn-primary px-4 py-2" type="submit">
                                        <i class="fas fa-save me-1"></i> Update Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .edit-murid-container {
            background-color: #f8f9fc;
            min-height: 100vh;
        }

        .icon-custom-color {
            color: #309898;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%);
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
            border-color: #bac8f3;
        }

        .input-group {
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .input-group-text {
            width: 45px;
            justify-content: center;
        }

        .btn-primary {
            background-color: #309898;
            border-color: #309898;
        }

        .btn-primary:hover {
            background-color: #309898;
            border-color: #309898;
        }

        .btn-light {
            background-color: #f8f9fc;
            border-color: #f8f9fc;
            color: #5a5c69;
        }

        .btn-light:hover {
            background-color: #e2e6f1;
            border-color: #dce0eb;
        }
    </style>
@endsection