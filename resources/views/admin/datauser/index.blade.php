<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data User - EvaluaTech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for better icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/datatables.net-responsive-bs5@2.4.1/css/responsive.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="text-center">
                <i class="fas fa-chart-line sidebar-logo text-white"></i>
                <h4 class="sidebar-brand">EvaluaTech | Admin</h4>
            </div>
        </div>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/datauser') }}">
                    <i class="bi bi-person-lines-fill"></i>
                    Data User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dataguru') }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Data Guru
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/datapelajaran') }}">
                    <i class="bi bi-book-half"></i>
                    Data Mata Pelajaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user-graduate"></i>
                    Data Siswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-clipboard-list"></i>
                    Penilaian
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-chart-bar"></i>
                    Statistik
                </a>
            </li>
        </ul>
        <div class="p-3 mt-auto">
            <a class="btn btn-light w-100 text-dark d-flex align-items-center justify-content-center" href="#">
                <i class="fas fa-sign-out-alt me-2"></i>
                Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <button class="toggle-sidebar" id="toggle-sidebar">
            <i class="fas fa-bars"></i>
        </button>

        <div class="top-bar">
            <div class="page-title">
                <h4>Data User</h4>
                <p>Kelola informasi user sistem</p>
            </div>
        </div>

        <!-- Filter Section -->
        <form class="filter-form" method="GET" action="{{ url('/datauser') }}">
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="filterSearch" class="form-label">Pencarian</label>
                    <input type="text" class="form-control" id="filterSearch" name="search"
                        value="{{ request('search') }}" placeholder="Cari nama atau email...">
                </div>
                <div class="col-md-4">
                    <label for="filterRole" class="form-label">Role</label>
                    <select id="filterRole" class="form-select" name="role">
                        <option value="">Semua Role</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="guru" {{ request('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="siswa" {{ request('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    </select>
                </div>
            </div>
        </form>

        <!-- Table Card -->
        <div class="table-card">
            <div class="table-header">
                <h5 class="table-title">Daftar User</h5>
                <div class="table-actions">
                    <button class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="fas fa-file-import me-1"></i> Import
                    </button>
                    <button class="btn btn-light me-2">
                        <i class="fas fa-file-export me-1"></i> Export
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="fas fa-plus me-1"></i> Tambah User
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="usersTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ ucfirst($u->role) }}</td>
                            <td>{{ \Carbon\Carbon::parse($u->created_at)->format('d-m-Y') }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('datauser.edit', $u->id) }}" class="action-btn me-1" data-bs-toggle="tooltip" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('datauser.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3 d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

</body>

</html>
