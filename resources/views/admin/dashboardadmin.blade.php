@extends('layouts.layout')
@section('content')
    <style>
        :root {
            --primary-color: #309898;
            --secondary-color: #3498db;
            --accent-color: #2ecc71;
            --light-bg: #f9fafb;
            --dark-text: #333;
            --light-text: #f8f9fa;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --hover-bg: rgba(52, 152, 219, 0.1);
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Poppins', sans-serif;
            color: var(--dark-text);
        }

        .nav-link {
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8) !important;
            border-radius: 8px;
            margin: 6px 12px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff !important;
            transform: translateX(5px);
        }

        .nav-link i {
            width: 24px;
            text-align: center;
            margin-right: 8px;
        }

        /* Fixed main content positioning */
        .main-content {
            padding: 30px;
            transition: all 0.3s;
            width: calc(100% - 250px); /* Assuming sidebar is 250px wide */
            margin-left: 250px;
            min-height: 100vh; /* Ensures the content stretches to full height */
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .welcome-text h4 {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: #64748b;
            font-size: 14px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-name {
            font-weight: 500;
            margin-right: 10px;
        }

        .dashboard-card {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            height: 100%;
            box-shadow: var(--card-shadow);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: 15px;
            font-size: 24px;
        }

        .icon-students {
            background-color: rgba(46, 204, 113, 0.1);
            color: var(--accent-color);
        }

        .icon-teachers {
            background-color: rgba(52, 152, 219, 0.1);
            color: var(--secondary-color);
        }

        .icon-assessments {
            background-color: rgba(241, 196, 15, 0.1);
            color: #f1c40f;
        }

        .dashboard-card h6 {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .dashboard-card h3 {
            font-weight: 700;
            margin-bottom: 0;
        }

        .card-trend {
            font-size: 12px;
            margin-left: 8px;
        }

        .trend-up {
            color: var(--accent-color);
        }

        .trend-down {
            color: #e74c3c;
        }

        .quick-actions {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: var(--card-shadow);
            margin-top: 30px;
        }

        .quick-actions h5 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .action-button {
            padding: 12px 20px;
            border-radius: 8px;
            background-color: #fff;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            color: var(--dark-text);
            font-weight: 500;
            width: 100%;
            margin-bottom: 15px;
            text-align: left;
        }

        .action-button:hover {
            background-color: var(--hover-bg);
            color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .action-button i {
            margin-right: 10px;
            color: var(--secondary-color);
        }

        .recent-table {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: var(--card-shadow);
            margin-top: 30px;
        }

        .recent-table h5 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .table {
            color: var(--dark-text);
        }

        .table th {
            font-weight: 600;
            color: #64748b;
            border-bottom-width: 1px;
        }

        .table td {
            vertical-align: middle;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge-success {
            background-color: rgba(46, 204, 113, 0.1);
            color: var(--accent-color);
        }

        .badge-warning {
            background-color: rgba(241, 196, 15, 0.1);
            color: #f1c40f;
        }

        .badge-danger {
            background-color: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }

        .user-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--hover-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
            font-weight: 600;
            margin-right: 10px;
        }

        .toggle-sidebar {
            display: none;
            background: none;
            border: none;
            color: var(--primary-color);
            font-size: 20px;
            cursor: pointer;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            color: #64748b;
            font-size: 14px;
            text-align: center;
        }

        /* Add media query for responsive design */
        @media (max-width: 992px) {
            .main-content {
                width: 100%;
                margin-left: 0;
            }
            
            .toggle-sidebar {
                display: block;
            }
        }

        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, var(--primary-color) 0%, #309898 100%);
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 20px 0;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand {
            color: var(--light-text);
            font-weight: 600;
            font-size: 19px;
            letter-spacing: 1px;
        }

        .sidebar-logo {
            max-width: 200px;
            margin-bottom: 25px;
        }

        .main-content {
    margin-left: 250px;
    padding: 20px;
    transition: all 0.3s ease;
    position: relative; /* Tambahkan ini */
}


        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>

<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="text-center">
            <i class="fas fa-chart-line sidebar-logo text-white"></i>
            <h4 class="sidebar-brand">EvaluaTech | Admin</h4>
        </div>
    </div>
    <ul class="nav flex-column mt-4">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('/') }}">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ url('/dataguru') }}">
                <i class="fas fa-chalkboard-teacher me-2"></i> Data Guru
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">
                <i class="fas fa-user-graduate me-2"></i> Data Siswa
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">
                <i class="fas fa-clipboard-list me-2"></i> Penilaian
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">
                <i class="fas fa-chart-bar me-2"></i> Statistik
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">
                <i class="fas fa-cog me-2"></i> Pengaturan
            </a>
        </li>
    </ul>
    <div class="p-3 mt-auto">
        <a class="btn btn-light w-100 text-dark d-flex align-items-center justify-content-center" href="#">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </div>
</div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <button class="toggle-sidebar" id="toggle-sidebar">
            <i class="fas fa-bars"></i>
        </button>

        <div class="top-bar">
            <div class="welcome-text">
                <h4>Selamat Datang, Admin!</h4>
                <p>{{ \Carbon\Carbon::now()->translatedFormat('l, j F Y') }} | Sistem Informasi Penilaian</p>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-icon icon-students">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h6>Jumlah Siswa</h6>
                    <div class="d-flex align-items-center">
                        <h3>{{ $jumlahSiswa }}</h3>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-icon icon-teachers">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h6>Jumlah Guru</h6>
                    <div class="d-flex align-items-center">
                        <h3>{{ $jumlahGuru }}</h3>
                        <span class="card-trend trend-up">
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div class="card-icon icon-assessments">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h6>Total Penilaian</h6>
                    <div class="d-flex align-items-center">
                        <h3>{{ $jumlahPenilaian }}</h3>
                        <span class="card-trend trend-up">
                        </span>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h5>Aksi Cepat</h5>
            <div class="row">
                <div class="col-md-3">
                    <button class="action-button">
                        <i class="fas fa-plus-circle"></i> Tambah Siswa
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="action-button">
                        <i class="fas fa-plus-circle"></i> Tambah Guru
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="action-button">
                        <i class="fas fa-clipboard-list"></i> Input Nilai
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="action-button">
                        <i class="fas fa-file-export"></i> Ekspor Data
                    </button>
                </div>
            </div>
        </div>

        <!-- Recent Activities Table -->
        <div class="recent-table">
            <h5>Aktivitas Terbaru</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Aktivitas</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-icon">S</div>
                                    <div>Siswa A</div>
                                </div>
                            </td>
                            <td>Update Nilai Matematika</td>
                            <td>07 Mei 2025</td>
                            <td><span class="status-badge badge-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-icon">G</div>
                                    <div>Guru B</div>
                                </div>
                            </td>
                            <td>Input Nilai Ulangan</td>
                            <td>06 Mei 2025</td>
                            <td><span class="status-badge badge-warning">Proses</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-icon">A</div>
                                    <div>Admin</div>
                                </div>
                            </td>
                            <td>Reset Password Guru</td>
                            <td>05 Mei 2025</td>
                            <td><span class="status-badge badge-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-icon">S</div>
                                    <div>Siswa C</div>
                                </div>
                            </td>
                            <td>Pendaftaran Baru</td>
                            <td>04 Mei 2025</td>
                            <td><span class="status-badge badge-danger">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="text-end">
                <a href="#" class="btn btn-sm" style="color: var(--secondary-color);">Lihat Semua <i
                        class="fas fa-arrow-right ms-1"></i></a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2025 Sistem Informasi Penilaian. All rights reserved.</p>
        </div>
    </div>
