@extends('layouts.layout')

@section('content')
    <div class="edit-nilai-container py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-lg">
                        <div class="card-header bg-gradient-primary p-4 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-black mb-0 font-weight-bold">Edit Data Nilai</h3>
                                <a href="{{ route('admin.datanilai.index') }}" class="btn btn-light btn-sm rounded-pill px-3">
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

                            <form action="{{ route('datanilai.update', $nilai->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="id_guru" class="form-label fw-bold">Guru</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-chalkboard-teacher" style="color: #309898;"></i>
                                                </span>
                                                <select class="form-select border-0 bg-light py-2" name="id_guru" id="id_guru" required>
                                                    <option value="" disabled>Pilih Guru</option>
                                                    @foreach ($guru as $g)
                                                        <option value="{{ $g->id }}" {{ $nilai->id_guru == $g->id ? 'selected' : '' }}>
                                                            {{ $g->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="id_murid" class="form-label fw-bold">Nama Murid</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-user-graduate" style="color: #309898;"></i>
                                                </span>
                                                <select class="form-select border-0 bg-light py-2" name="id_murid" id="id_murid" required>
                                                    <option value="" disabled>Pilih Murid</option>
                                                    @foreach ($murid as $m)
                                                        <option value="{{ $m->id }}" {{ $nilai->id_murid == $m->id ? 'selected' : '' }}>
                                                            {{ $m->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="id_mata_pelajaran" class="form-label fw-bold">Mata Pelajaran</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-book" style="color: #309898;"></i>
                                                </span>
                                                <select class="form-select border-0 bg-light py-2" name="id_mata_pelajaran" id="id_mata_pelajaran" required>
                                                    <option value="" disabled>Pilih Mapel</option>
                                                    @foreach ($mapel as $mp)
                                                        <option value="{{ $mp->id }}" {{ $nilai->id_mata_pelajaran == $mp->id ? 'selected' : '' }}>
                                                            {{ $mp->mata_pelajaran }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="nilai" class="form-label fw-bold">Nilai</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-star" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="number" name="nilai" id="nilai" value="{{ $nilai->nilai }}" required min="0" max="100">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="predikat" class="form-label fw-bold">Predikat</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-award" style="color: #309898;"></i>
                                                </span>
                                                <select name="predikat" id="predikat" class="form-select border-0 bg-light py-2" required>
                                                    <option value="" disabled>Pilih Predikat</option>
                                                    <option value="A" {{ $nilai->predikat == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="B" {{ $nilai->predikat == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="C" {{ $nilai->predikat == 'C' ? 'selected' : '' }}>C</option>
                                                    <option value="D" {{ $nilai->predikat == 'D' ? 'selected' : '' }}>D</option>
                                                    <option value="E" {{ $nilai->predikat == 'E' ? 'selected' : '' }}>E</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="semester" class="form-label fw-bold">Semester</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-calendar-alt" style="color: #309898;"></i>
                                                </span>
                                                <select name="semester" id="semester" class="form-select border-0 bg-light py-2" required>
                                                    <option value="" disabled>Pilih Semester</option>
                                                    <option value="1" {{ $nilai->semester == '1' ? 'selected' : '' }}>1</option>
                                                    <option value="2" {{ $nilai->semester == '2' ? 'selected' : '' }}>2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-2 justify-content-end">
                                    <a href="{{ route('admin.datanilai.index') }}" class="btn btn-light px-4 py-2">
                                        <i class="fas fa-times me-1" style="color: #309898;"></i> Batal
                                    </a>
                                    <button class="btn btn-primary px-4 py-2" type="submit">
                                        <i class="fas fa-save me-1"></i> Simpan Perubahan
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
        .edit-nilai-container {
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