@extends('layouts.layout')

@section('content')
    <div class="create-nilai-container py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-lg">
                        <div class="card-header bg-gradient-primary p-4 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-black mb-0 font-weight-bold">Tambah Data Nilai</h3>
                                <a href="{{ route('nilai.index') }}" class="btn btn-light btn-sm rounded-pill px-3">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('nilai.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="id_guru" class="form-label fw-bold">Guru</label>
                                        <select class="form-select border-0 bg-light py-2" name="id_guru" required>
                                            <option value="" disabled selected>Pilih Guru</option>
                                            @foreach ($guru as $g)
                                                <option value="{{ $g->id }}" {{ old('id_guru') == $g->id ? 'selected' : '' }}>
                                                    {{ $g->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="id_murid" class="form-label fw-bold">Murid</label>
                                        <select class="form-select border-0 bg-light py-2" name="id_murid" required>
                                            <option value="" disabled selected>Pilih Murid</option>
                                            @foreach ($murid as $m)
                                                <option value="{{ $m->id }}" {{ old('id_murid') == $m->id ? 'selected' : '' }}>
                                                    {{ $m->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="id_mata_pelajaran" class="form-label fw-bold">Mata Pelajaran</label>
                                        <select class="form-select border-0 bg-light py-2" name="id_mata_pelajaran" required>
                                            <option value="" disabled selected>Pilih Mapel</option>
                                            @foreach ($mapel as $mp)
                                                <option value="{{ $mp->id }}" {{ old('id_mata_pelajaran') == $mp->id ? 'selected' : '' }}>
                                                    {{ $mp->mata_pelajaran }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="nilai" class="form-label fw-bold">Nilai</label>
                                        <input type="number" name="nilai" class="form-control border-0 bg-light py-2"
                                            value="{{ old('nilai') }}" required min="0" max="100">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="predikat" class="form-label fw-bold">Predikat</label>
                                        <select name="predikat" class="form-select border-0 bg-light py-2" required>
                                            <option value="" disabled selected>Pilih Predikat</option>
                                            <option value="A" {{ old('predikat') == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B" {{ old('predikat') == 'B' ? 'selected' : '' }}>B</option>
                                            <option value="C" {{ old('predikat') == 'C' ? 'selected' : '' }}>C</option>
                                            <option value="D" {{ old('predikat') == 'D' ? 'selected' : '' }}>D</option>
                                            <option value="E" {{ old('predikat') == 'E' ? 'selected' : '' }}>E</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="semester" class="form-label fw-bold">Semester</label>
                                        <select name="semester" class="form-select border-0 bg-light py-2" required>
                                            <option value="" disabled selected>Pilih Semester</option>
                                            <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-2 justify-content-end">
                                    <a href="{{ route('nilai.index') }}" class="btn btn-light px-4 py-2">
                                        <i class="fas fa-times me-1" style="color: #309898;"></i> Batal
                                    </a>
                                    <button class="btn btn-primary px-4 py-2" type="submit">
                                        <i class="fas fa-save me-1"></i> Simpan Nilai
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
        .create-nilai-container {
            background-color: #f8f9fc;
            min-height: 100vh;
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
