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
                                <a href="{{ route('nilai.index') }}" class="btn btn-light btn-sm rounded-pill px-3">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
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
                                            <label for="id_mapel" class="form-label fw-bold">Mata Pelajaran</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-book" style="color: #309898;"></i>
                                                </span>
                                                <select class="form-select border-0 bg-light py-2" name="id_mapel" id="id_mapel" required>
                                                    <option value="" disabled>Pilih Mapel</option>
                                                    @foreach ($mapel as $m)
                                                        <option value="{{ $m->id }}" {{ $nilai->id_mapel == $m->id ? 'selected' : '' }}>
                                                            {{ $m->mata_pelajaran }}
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
                                                    <i class="fas fa-pen" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="number" name="nilai" id="nilai" value="{{ $nilai->nilai }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-2 justify-content-end">
                                    <a href="{{ route('nilai.index') }}" class="btn btn-light px-4 py-2">
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

        .bg-gradient-primary {
            background: linear-gradient(135deg, #ffffff 0%, #ffffff 100%);
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
            border-color: #bac8f3;
        }

        .input-group {
            box-shadow: 0 3px 8px
