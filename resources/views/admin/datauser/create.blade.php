@extends('layouts.layout')

@section('content')
    <div class="create-guru-container py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg rounded-lg">
                        <div class="card-header bg-gradient-primary p-4 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-black mb-0 font-weight-bold">Tambah Data User</h3>
                                <a href="{{ route('admin.datauser.index') }}" class="btn btn-light btn-sm rounded-pill px-3">
                                    <i class="fas fa-arrow-left me-1"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <form action="{{ route('datauser.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="id" class="form-label fw-bold">ID</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-id-badge" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="number" name="id"
                                                    id="id" value="{{ old('id') }}" required>
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
                                                <input class="form-control border-0 bg-light py-2" type="text" name="username"
                                                    id="username" value="{{ old('username') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="password" class="form-label fw-bold">Password</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0">
                                                    <i class="fas fa-lock" style="color: #309898;"></i>
                                                </span>
                                                <input class="form-control border-0 bg-light py-2" type="password" name="password"
                                                    id="password" required autocomplete="new-password">
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
                                                <select class="form-select border-0 bg-light py-2" name="role" id="role"
                                                    required>
                                                    <option value="" selected disabled>Pilih Role</option>
                                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                                        Admin
                                                    </option>
                                                    <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>
                                                        Guru
                                                    </option>
                                                    <option value="murid" {{ old('role') == 'murid' ? 'selected' : '' }}>
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
                                    <button class="btn btn-primary px-4 py-2" type="submit">
                                        <i class="fas fa-save me-1"></i> Simpan Data
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
