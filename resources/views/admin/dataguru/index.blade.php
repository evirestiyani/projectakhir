<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Guru - EvaluaTech</title>
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
                    <i class="bi bi-person-lines-fill"></i> <!-- Ikon user dengan data -->
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
                <a class="nav-link" href="{{ url('/datamatapelajaran') }}">
                    <i class="bi bi-book-half"></i> <!-- Buku terbuka -->
                    Data Mata Pelajaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/datamurid') }}">
                    <i class="fas fa-user-graduate"></i>
                    Data Murid
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
                <h4>Data Guru</h4>
                <p>Kelola informasi guru di sekolah Anda</p>
            </div>
        </div>


        <!-- Filter Section -->
        <form class="filter-form" method="GET" action="{{ url('/dataguru') }}">
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="filterSearch" class="form-label">Pencarian</label>
                    <input type="text" class="form-control" id="filterSearch" name="search"
                        value="{{ request('search') }}" placeholder="Cari nama atau NIP...">
                </div>
                <div class="col-md-4">
                    <label for="filterSubject" class="form-label">Mata Pelajaran</label>
                    <select id="filterSubject" class="form-select" name="subject">
                        <option value="">Semua Mata Pelajaran</option>
                        <option value="math" {{ request('subject') == 'math' ? 'selected' : '' }}>Matematika</option>
                        <option value="science" {{ request('subject') == 'science' ? 'selected' : '' }}>IPA</option>
                        <option value="language" {{ request('subject') == 'language' ? 'selected' : '' }}>Bahasa Indonesia</option>
                        <option value="english" {{ request('subject') == 'english' ? 'selected' : '' }}>Bahasa Inggris</option>
                        <option value="social" {{ request('subject') == 'social' ? 'selected' : '' }}>IPS</option>
                    </select>
                </div>
            </div>
        </form>
        
        <!-- Table Card -->
        <div class="table-card">
            <div class="table-header">
                <h5 class="table-title">Daftar Guru</h5>
                <div class="table-actions">
                    <button class="btn btn-light me-2" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="fas fa-file-import me-1"></i> Import
                    </button>
                    <button class="btn btn-light me-2">
                        <i class="fas fa-file-export me-1"></i> Export
                    </button>
                    <a href="{{ route('dataguru.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Guru
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="teachersTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Jenkel</th>
                            <th>Tanggal lahir</th>
                            <th>Id User</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guru as $g)
                        <tr>
                            <td>{{ $g->id }}</td>
                            <td>{{ $g->nama }}</td>
                            <td>{{ $g->nip }}</td>
                            <td>{{ $g->email }}</td>
                            <td>{{ $g->no_telp }}</td>
                            <td>{{ $g->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td> <!-- Display gender -->
                            <td>{{ \Carbon\Carbon::parse($g->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $g->id_user }}</td>
                            <td>{{ $g->mata_pelajaran }}</td> <!-- Assuming 'mataPelajaran' is related and has 'nama' field -->
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('dataguru.edit', $g->id) }}" class="action-btn me-1" data-bs-toggle="tooltip" title="Edit">                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('dataguru.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
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
                    {{ $guru->links() }}
                </div>
                
            </div>

    </div>

    <script></script>
</body>

</html>
