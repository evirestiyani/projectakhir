@extends('layouts.layout')

@section('content')
    <div class="container-fluid py-4">
        <!-- Dashboard Header with Modern Design -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm mb-4 text-white"
                    style="background: linear-gradient(135deg, #309898, #57b9b3);">
                    <div class="card-body p-4">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="text-white-50 mb-1">Selamat Datang di</h5>
                                <h2 class="fw-bold text-white mb-0">Manajemen Data Murid</h2>
                                <p class="text-white-50 mt-2 mb-0">Kelola dan lihat semua data murid di satu tempat</p>
                            </div>
                            <div class="mt-3 mt-sm-0">
                                <a href="{{ route('admin.datamurid.create') }}" class="btn btn-light text-dark">
                                    <i class="fas fa-user-plus me-1"></i> Tambah Murid Baru
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Breadcrumbs in separate card -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="#">Dashboard</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Murid</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Stats Cards with Modern Design -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-stats border-0 shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold text-muted">Total Murid</p>
                                    <h3 class="font-weight-bold mb-0">{{ $murid->total() }}</h3>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-primary text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-stats border-0 shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold text-muted">Murid Laki-laki</p>
                                    <h3 class="font-weight-bold mb-0">{{ $murid->where('jenis_kelamin', 'L')->count() }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-male"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-stats border-0 shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold text-muted">Murid Perempuan</p>
                                    <h3 class="font-weight-bold mb-0">{{ $murid->where('jenis_kelamin', 'P')->count() }}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-female"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card card-stats border-0 shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold text-muted">Total Kelas</p>
                                    <h3 class="font-weight-bold mb-0">{{ count($kelasList) }}</h3>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-school"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <form method="GET" action="{{ route('admin.datamurid.index') }}" class="d-flex">
                                    <div class="input-group w-100">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="fas fa-search"></i>
                                        </span>
                                        <input type="text" class="form-control ps-0 border-start-0" name="search"
                                            value="{{ request('search') }}"
                                            placeholder="Cari murid berdasarkan nama atau NIS..." style="width: 70%;">
                                        <button class="btn" type="submit"
                                            style="width: 20%; background-color: #309898; color: white;">
                                            Cari
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-md-end">
                                    <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#advancedFilter" aria-expanded="false">
                                        <i class="fas fa-filter me-2"></i> Filter
                                    </button>
                                    <a href="{{ route('admin.datamurid.exportPDF') }}" class="btn btn-outline-danger">
                                        <i class="fas fa-file-pdf me-2"></i> Export PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Filter Collapse -->
    <div class="collapse mb-4" id="advancedFilter">
        <div class="card border-0 shadow-sm">
            <div class="card-body bg-light p-3">
                <form method="GET" action="{{ route('admin.datamurid.index') }}" class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold">Kelas</label>
                        <select name="kelas" class="form-select form-select-sm">
                            <option value="">Semua Kelas</option>
                            @foreach ($kelasList as $kelas)
                                <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
                                    {{ $kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-bold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div class="d-grid gap-2 d-md-flex w-100">
                            <button type="submit" class="btn btn-sm flex-fill"
                                style="background-color: #309898; border-color: #309898; color: white;">
                                <i class="fas fa-search me-1"></i> Terapkan Filter
                            </button>
                            <a href="{{ route('admin.datamurid.index') }}"
                                class="btn btn-outline-secondary btn-sm flex-fill">
                                <i class="fas fa-undo me-1"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Alert Message with Modern Design -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle fa-lg mt-1"></i>
                </div>
                <div class="ms-3">
                    <h5 class="alert-heading mb-1">Berhasil!</h5>
                    <p class="mb-0">{{ session('success') }}</p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Main Content Card with Modern Design -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h5 class="mb-0 fw-bold">Daftar Murid</h5>
            <span class="badge" style="background-color: #309898; color: white;">Total: {{ $murid->total() }}</span>
        </div>

        <!-- Table Content with Modern Styling -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>No. Telepon</th>
                            <th>Gender</th>
                            <th>Tanggal Lahir</th>
                            <th>ID User</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($murid as $item)
                            <tr>
                                <td class="ps-3">{{ $item->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0 text-dark">{{ $item->nama }}</h6>
                                            <small class="text-muted">Lahir:
                                                {{ \Carbon\Carbon::parse($item->tgl_lahir)->format('d-m-Y') }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->nis }}</td>
                                <td>
                                    <span class="badge bg-soft-info text-info rounded-pill px-3 py-2">
                                        {{ $item->kelas }}
                                    </span>
                                </td>
                                <td>{{ $item->no_telp }}</td>
                                <td>
                                    <span
                                        class="badge {{ $item->jenis_kelamin == 'L' ? 'bg-soft-primary text-primary' : 'bg-soft-danger text-danger' }} rounded-pill px-3 py-2">
                                        <i class="fas fa-{{ $item->jenis_kelamin == 'L' ? 'mars' : 'venus' }} me-1"></i>
                                        {{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $item->id_user }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.datamurid.show', $item->id) }}" class="btn btn-sm"
                                            style="background-color: #17a2b8; color: white;" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.datamurid.edit', $item->id) }}" class="btn btn-sm"
                                            style="background-color: #ffc107; color: white;" title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('datamurid.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus murid ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm"
                                                style="background-color: #dc3545; color: white;" title="Hapus Data">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="py-5 text-center">
                                    <div class="empty-state">
                                        <div class="empty-state-icon bg-light">
                                            <i class="fas fa-user-slash text-muted"></i>
                                        </div>
                                        <h5 class="mt-4">Belum ada data murid</h5>
                                        <p class="text-muted mb-4">Tambahkan murid baru untuk mulai mengelola data.</p>
                                        <a href="{{ route('admin.datamurid.create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus-circle me-1"></i> Tambah Murid Baru
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Table Footer with Modern Design -->
        <div class="card-footer bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6 small text-muted">
                    Menampilkan {{ $murid->firstItem() ?? 0 }} sampai {{ $murid->lastItem() ?? 0 }}
                    dari {{ $murid->total() }} data murid
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end">
                        {{ $murid->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Success Modal with Animation -->
    @if (session('success'))
        <style>
            .pagination .page-link {
                color: #309898;
                border-color: #309898;
            }

            .pagination .page-item.active .page-link {
                background-color: #309898;
                border-color: #309898;
                color: white;
            }

            .pagination .page-link:hover {
                background-color: #267270;
                border-color: #267270;
                color: white;
            }

            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translate3d(0, -50px, 0);
                }

                to {
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                }
            }

            @keyframes pulse {
                0% {
                    transform: scale(0.95);
                    box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.4);
                }

                70% {
                    transform: scale(1);
                    box-shadow: 0 0 0 10px rgba(76, 175, 80, 0);
                }

                100% {
                    transform: scale(0.95);
                    box-shadow: 0 0 0 0 rgba(76, 175, 80, 0);
                }
            }

            #successModal .modal-content {
                animation: fadeInDown 0.5s ease forwards;
            }

            #successModal .btn {
                transition: all 0.3s ease;
            }

            #successModal .btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 15px rgba(76, 175, 80, 0.4);
            }

            #successModal .rounded-circle {
                animation: pulse 2s infinite;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Show modal
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

                // Animate progress bar
                setTimeout(function() {
                    var progressBar = document.getElementById('successProgressBar');
                    progressBar.style.transition = 'width 2.5s ease';
                    progressBar.style.width = '100%';
                }, 300);

                // Auto close after 3.5 seconds
                setTimeout(function() {
                    successModal.hide();
                }, 3500);
            });
        </script>
    @endif

    <!-- Additional Styles for Version 3 Design -->
    <style>
        /* Card Styles */
        .card {
            border-radius: 0.75rem;
            overflow: hidden;
        }

        /* Background gradient */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #6993FF 0%, #3C75FF 100%);
        }

        /* Avatar styles */
        .avatar-sm {
            width: 36px;
            height: 36px;
            font-size: 0.875rem;
        }

        /* Icon shape */
        .icon-shape {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.75rem;
        }

        /* Soft background colors for badges */
        .bg-soft-primary {
            background-color: rgba(60, 117, 255, 0.1);
        }

        .bg-soft-success {
            background-color: rgba(66, 186, 150, 0.1);
        }

        .bg-soft-info {
            background-color: rgba(17, 205, 239, 0.1);
        }

        .bg-soft-warning {
            background-color: rgba(251, 99, 64, 0.1);
        }

        .bg-soft-danger {
            background-color: rgba(245, 54, 92, 0.1);
        }

        /* Empty State */
        .empty-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 20px;
        }

        .empty-state-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        /* Action buttons */
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 0.25rem;
        }

        /* Pagination styling */
        .pagination {
            margin-bottom: 0;
        }

        .page-item:first-child .page-link,
        .page-item:last-child .page-link {
            border-radius: 0.5rem;
        }

        .page-link {
            margin: 0 3px;
            border-radius: 0.5rem;
        }

        .page-item.active .page-link {
            background-color: #3C75FF;
            border-color: #3C75FF;
        }
    </style>
@endsection
