@extends('layouts.layout')

@section('content')
    <div class="guru-detail-page">
        <div class="container py-5">
            <div class="dashboard-header mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="text-dark mb-1">Detail Data Guru</h2>
                    <p class="text-muted mb-0">Informasi lengkap mengenai data guru</p>
                </div>
                <div>
                    <a href="{{ route('admin.datamurid.index') }}" class="btn btn-soft-dark rounded-circle me-2">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                </div>
            </div>

          <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="profile-card">
                        <div class="profile-banner"></div>
                        <div class="profile-avatar">
                            <div class="avatar-ring">
                                <span>{{ substr($murid->nama, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="profile-info text-center">
                            <h3 class="mb-1">{{ $murid->nama }}</h3>
                            <p class="text-muted mb-2">{{ $murid->nis }}</p>
                            <div class="mb-3">
                                <span class="badge bg-soft-primary text-primary px-3 py-2 rounded-pill">
                                    {{ $murid->kelas ?? 'Belum ditentukan' }}
                                </span>
                            </div>

                            <div class="gender-indicator d-flex justify-content-center align-items-center mb-3">
                                <div class="gender-icon-container {{ $murid->jenis_kelamin == 'L' ? 'male' : 'female' }}">
                                    <i class="fas fa-{{ $murid->jenis_kelamin == 'L' ? 'mars' : 'venus' }}"></i>
                                </div>
                                <span class="ms-2">{{ $murid->jenis_kelamin == 'L' ? 'Pria' : 'Wanita' }}</span>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <div class="info-tile">
                                <div class="info-tile-header">
                                    <div class="tile-icon primary">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <h5>NIS</h5>
                                </div>
                                <div class="info-tile-body">
                                    <p class="mb-0 tile-value">{{ $murid->nis }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="info-tile">
                                <div class="info-tile-header">
                                    <div class="tile-icon success">
                                        <i class="fas fa-birthday-cake"></i>
                                    </div>
                                    <h5>Tanggal Lahir</h5>
                                </div>
                                <div class="info-tile-body">
                                    <p class="mb-0 tile-value">
                                        {{ \Carbon\Carbon::parse($murid->tgl_lahir)->format('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4">
                            <div class="info-tile">
                                <div class="info-tile-header">
                                    <div class="tile-icon info">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <h5>No. Telepon</h5>
                                </div>
                                <div class="info-tile-body">
                                    <p class="mb-0 tile-value">{{ $murid->no_telp ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Jika ada email di murid, bisa ditambah di sini --}}
                        {{-- <div class="col-md-6 mb-4">
                            <div class="info-tile">
                                <div class="info-tile-header">
                                    <div class="tile-icon info">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <h5>Email</h5>
                                </div>
                                <div class="info-tile-body">
                                    <p class="mb-0 tile-value">{{ $murid->email ?? '-' }}</p>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <style>
        .guru-detail-page {
            background-color: #f8f9fc;
            min-height: 100vh;
        }

        .dashboard-header h2 {
            font-weight: 700;
        }

        .btn-soft-dark {
            background-color: #e9ecef;
            color: #343a40;
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s;
        }

        .btn-soft-dark:hover {
            background-color: #343a40;
            color: white;
        }

        .btn-soft-primary {
            background-color: #e8eaff;
            color: #4e73df;
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.3s;
        }

        .btn-soft-primary:hover {
            background-color: #4e73df;
            color: white;
        }

        .profile-card {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: relative;
            padding-bottom: 25px;
            height: 100%;
        }

       .profile-banner {
    height: 120px;
    background: linear-gradient(to bottom, #36b9cc, #ffffff);
}

        .profile-avatar {
            position: relative;
            margin-top: -50px;
            text-align: center;
        }

        .avatar-ring {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: white;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 5px solid white;
            font-size: 36px;
            font-weight: 700;
            color: #4e73df;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            padding: 20px 25px;
        }

        .divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 15px 0;
        }

        .bg-soft-primary {
            background-color: rgba(78, 115, 223, 0.1);
        }

        .gender-icon-container {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .gender-icon-container.male {
            background-color: rgba(78, 115, 223, 0.1);
            color: #4e73df;
        }

        .gender-icon-container.female {
            background-color: rgba(231, 74, 59, 0.1);
            color: #e74a3b;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .contact-item {
            font-size: 14px;
            color: #5a5c69;
        }

        .info-tile {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            height: 100%;
            transition: all 0.3s;
        }

        .info-tile:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .info-tile-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .info-tile-header h5 {
            margin-bottom: 0;
            font-size: 16px;
            color: #858796;
            font-weight: 500;
        }

        .tile-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 18px;
        }

        .tile-icon.primary {
            background-color: rgba(78, 115, 223, 0.1);
            color: #4e73df;
        }

        .tile-icon.success {
            background-color: rgba(28, 200, 138, 0.1);
            color: #1cc88a;
        }

        .tile-icon.info {
            background-color: rgba(54, 185, 204, 0.1);
            color: #36b9cc;
        }

        .tile-icon.warning {
            background-color: rgba(246, 194, 62, 0.1);
            color: #f6c23e;
        }

        .tile-icon.purple {
            background-color: rgba(137, 80, 252, 0.1);
            color: #8950fc;
        }

        .tile-value {
            font-size: 16px;
            font-weight: 600;
            color: #5a5c69;
        }
    </style>
@endsection
