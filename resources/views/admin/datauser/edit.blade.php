@extends('layouts.layout')

@section('content')
    <div class="create-guru-container py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-lg">
                        <div class="card-header bg-gradient-primary p-4 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-black mb-0 font-weight-bold">Edit Data User</h3>
                                <a href="{{ route('admin.datauser.index') }}" class="btn btn-light btn-sm rounded-pill px-3">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('datauser.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="id" class="form-label fw-bold">ID</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-id-badge" style="color: #309898;"></i>
                                                </span>
                                                <!-- Biasanya ID tidak bisa diubah, jadi pakai readonly -->
                                                <input class="form-control border-0 bg-light py-2" type="number"
                                                    name="id" id="id" value="{{ old('id', $user->id) }}"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="username" class="form-label fw-bold">Username</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-user" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="text"
                                                    name="username" id="username"
                                                    value="{{ old('username', $user->username) }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="password" class="form-label fw-bold">Password <small>(Kosongkan jika
                                                    tidak diubah)</small></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-lock" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="password"
                                                    name="password" id="password" autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="role" class="form-label fw-bold">Role</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-user-tag" style="color: #309898;"></i>
                                                </span>
                                                <select class="form-select border-0 bg-light py-2" name="role"
                                                    id="role" required>
                                                    <option value="" disabled>Pilih Role</option>
                                                    <option value="admin"
                                                        {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                                        Admin
                                                    </option>
                                                    <option value="guru"
                                                        {{ old('role', $user->role) == 'guru' ? 'selected' : '' }}>
                                                        Guru
                                                    </option>
                                                    <option value="murid"
                                                        {{ old('role', $user->role) == 'murid' ? 'selected' : '' }}>
                                                        Murid
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex gap-2 justify-content-end">
                                    <a href="{{ route('admin.datauser.index') }}" class="btn btn-light px-4 py-2">
                                        <i class="fas fa-times me-1" style="color: #309898;"></i> Batal
                                    </a>
                                    <button class="btn btn-primary px-4 py-2" type="submit"
                                        style="background-color: #309898; border-color: #309898;">
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
        .create-guru-container {
            background-color: #f8f9fc;
            min-height: 100vh;
        }

        /* Style tetap sama dengan form tambah */
    </style>
@endsection
