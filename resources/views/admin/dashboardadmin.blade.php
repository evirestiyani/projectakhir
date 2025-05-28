@extends('layouts.layout')
@section('content')


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
                <div class="dashboard-card card-student p-3"
                    style="position: relative; background: #f8fffe; border-radius: 15px; overflow: hidden;">
                    <!-- Background Decoration -->
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                        style="position: absolute; top: -40px; left: -40px; width: 120px; height: 120px; opacity: 0.3;">
                        <path fill="rgba(142, 236, 200, 0.2)"
                            d="M42.8,-65.2C54.9,-56.5,63.8,-43.2,70.2,-28.7C76.7,-14.1,80.8,1.7,78.7,16.6C76.6,31.5,68.2,45.6,56.3,54.1C44.4,62.6,29,65.5,13.9,68.9C-1.3,72.3,-16.1,76.1,-30.3,73.1C-44.5,70.1,-58.1,60.2,-66.7,47.2C-75.3,34.2,-78.9,18.1,-78.2,2.5C-77.5,-13.1,-72.4,-27.8,-63.3,-38.3C-54.1,-48.9,-41,-55.3,-28.1,-63C-15.2,-70.7,-2.6,-79.9,9.2,-79.7C21,-79.6,30.6,-73.9,42.8,-65.2Z"
                            transform="translate(100 100)" />
                    </svg>

                    <!-- Card Content -->
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/2995/2995430.png" alt="Students"
                            style="width: 36px; height: 36px; margin-right: 10px;">
                        <h6 class="mb-0">Jumlah Siswa</h6>
                    </div>

                    <div class="d-flex align-items-center mb-1">
                        {{-- <h4 class="mb-0">{{ $jumlahSiswa }}</h4> --}}
                        <span class="text-success ms-2" style="font-size: 0.9rem;">
                            <i class="fas fa-arrow-up"></i> 6%
                        </span>
                    </div>

                    <small class="text-muted">Aktif pembelajaran</small>

                    <!-- Small Decoration -->
                    <img src="https://cdn-icons-png.flaticon.com/512/3588/3588472.png" alt="Decoration"
                        style="position: absolute; bottom: 10px; right: 10px; width: 24px; height: 24px; opacity: 0.5;">
                </div>
            </div>

            <div class="col-md-4">
                <div class="dashboard-card card-student p-3"
                    style="position: relative; background: #f8fffe; border-radius: 15px; overflow: hidden;">
                    <!-- Background Decoration -->
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                        style="position: absolute; top: -40px; left: -40px; width: 120px; height: 120px; opacity: 0.3;">
                        <path fill="rgba(142, 236, 200, 0.2)"
                            d="M42.8,-65.2C54.9,-56.5,63.8,-43.2,70.2,-28.7C76.7,-14.1,80.8,1.7,78.7,16.6C76.6,31.5,68.2,45.6,56.3,54.1C44.4,62.6,29,65.5,13.9,68.9C-1.3,72.3,-16.1,76.1,-30.3,73.1C-44.5,70.1,-58.1,60.2,-66.7,47.2C-75.3,34.2,-78.9,18.1,-78.2,2.5C-77.5,-13.1,-72.4,-27.8,-63.3,-38.3C-54.1,-48.9,-41,-55.3,-28.1,-63C-15.2,-70.7,-2.6,-79.9,9.2,-79.7C21,-79.6,30.6,-73.9,42.8,-65.2Z"
                            transform="translate(100 100)" />
                    </svg>

                    <!-- Card Content -->
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/2995/2995430.png" alt="Students"
                            style="width: 36px; height: 36px; margin-right: 10px;">
                        <h6 class="mb-0">Jumlah Guru</h6>
                    </div>

                    <div class="d-flex align-items-center mb-1">
                        {{-- <h4 class="mb-0">{{ $jumlahGuru }}</h4> --}}
                        <span class="text-success ms-2" style="font-size: 0.9rem;">
                            <i class="fas fa-arrow-up"></i> 6%
                        </span>
                    </div>

                    <small class="text-muted">Aktif mengajar</small>

                    <!-- Small Decoration -->
                    <img src="https://cdn-icons-png.flaticon.com/512/3588/3588472.png" alt="Decoration"
                        style="position: absolute; bottom: 10px; right: 10px; width: 24px; height: 24px; opacity: 0.5;">
                </div>
            </div>



            <div class="col-md-4">
                <div class="dashboard-card card-student p-3"
                    style="position: relative; background: #f8fffe; border-radius: 15px; overflow: hidden;">
                    <!-- Background Decoration -->
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
                        style="position: absolute; top: -40px; left: -40px; width: 120px; height: 120px; opacity: 0.3;">
                        <path fill="rgba(142, 236, 200, 0.2)"
                            d="M42.8,-65.2C54.9,-56.5,63.8,-43.2,70.2,-28.7C76.7,-14.1,80.8,1.7,78.7,16.6C76.6,31.5,68.2,45.6,56.3,54.1C44.4,62.6,29,65.5,13.9,68.9C-1.3,72.3,-16.1,76.1,-30.3,73.1C-44.5,70.1,-58.1,60.2,-66.7,47.2C-75.3,34.2,-78.9,18.1,-78.2,2.5C-77.5,-13.1,-72.4,-27.8,-63.3,-38.3C-54.1,-48.9,-41,-55.3,-28.1,-63C-15.2,-70.7,-2.6,-79.9,9.2,-79.7C21,-79.6,30.6,-73.9,42.8,-65.2Z"
                            transform="translate(100 100)" />
                    </svg>

                    <!-- Card Content -->
                    <div class="d-flex align-items-center mb-2">
                        <img src="https://cdn-icons-png.flaticon.com/512/2995/2995430.png" alt="Students"
                            style="width: 36px; height: 36px; margin-right: 10px;">
                        <h6 class="mb-0">Jumlah Penilaian</h6>
                    </div>

                    <div class="d-flex align-items-center mb-1">
                        {{-- <h4 class="mb-0">{{ $jumlahPenilaian }}</h4> --}}
                        <span class="text-success ms-2" style="font-size: 0.9rem;">
                            <i class="fas fa-arrow-up"></i> 6%
                        </span>
                    </div>

                    <small class="text-muted">Penilaian Terbaru</small>

                    <!-- Small Decoration -->
                    <img src="https://cdn-icons-png.flaticon.com/512/3588/3588472.png" alt="Decoration"
                        style="position: absolute; bottom: 10px; right: 10px; width: 24px; height: 24px; opacity: 0.5;">
                </div>
            </div>


        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
    <h5>Aksi Cepat</h5>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('admin.datamurid.create') }}" class="action-button d-block text-decoration-none text-dark">
                <i class="fas fa-plus-circle" style="color: #309898;"></i> Tambah Siswa
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('admin.dataguru.create') }}" class="action-button d-block text-decoration-none text-dark">
                <i class="fas fa-plus-circle" style="color: #309898;"></i> Tambah Guru
            </a>
        </div>

        <div class="col-md-4">
            <a href="#" class="action-button d-block text-decoration-none text-dark">
                <i class="fas fa-clipboard-list" style="color: #309898;"></i> Input Nilai
            </a>
        </div>
    </div>
</div>


        <div class="analytics-section mt-4">
            <div class="row g-4">
                <!-- Grafik Garis - Trend Perkembangan -->
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
                <!-- Diagram Lingkaran - Distribusi -->

            </div>
        </div>

        <!-- CSS tambahan untuk animasi dan perbaikan responsif -->
        <style>
            .dashboard-card {
                transition: all 0.3s ease;
                overflow: hidden;
            }

            .dashboard-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            }

            .chart-container {
                transition: all 0.3s ease;
            }

            .chart-container:hover {
                transform: scale(1.01);
            }

            .analytics-section {
                margin-bottom: 30px;
            }

            @media (max-width: 768px) {
                .chart-container {
                    height: 250px !important;
                }
            }

            /* Animasi untuk kartu statistik */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }


            .dashboard-card {
                animation: fadeIn 0.5s ease forwards;
            }

            .action-button {
                background-color: #e5f7f6;
                border: none;
                border-radius: 10px;
                padding: 10px 16px;
                width: 100%;
                color: #309898;
                font-weight: 600;
                transition: background-color 0.3s ease;
            }

            .action-button:hover {
                background-color: #d0efee;
            }

            .status-badge {
                padding: 4px 8px;
                border-radius: 8px;
                font-size: 0.85rem;
                font-weight: 500;
            }

            .badge-success {
                background-color: #d4edda;
                color: #155724;
            }

            .badge-warning {
                background-color: #fff3cd;
                color: #856404;
            }

            .badge-danger {
                background-color: #f8d7da;
                color: #721c24;
            }

            .user-icon {
                width: 32px;
                height: 32px;
                border-radius: 50%;
                background-color: #b2eae3;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 10px;
                font-weight: bold;
            }

            .quick-actions h5 {
                margin-top: 30px;
                margin-bottom: 20px;
                font-weight: 600;
            }

            .recent-table {
                background: #ffffff;
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
            }

            .table-responsive table {
                font-size: 0.95rem;
            }

            .table-responsive table th {
                background-color: #f1fdfc;
            }

            .table-responsive table td {
                vertical-align: middle;
            }


            /* Perbaikan responsivitas */
            @media (max-width: 576px) {

                .btn-group,
                .dropdown {
                    width: 100%;
                    margin-top: 10px;
                }

                .d-flex.justify-content-between {
                    flex-direction: column;
                    align-items: start !important;
                }

                .chart-container {
                    margin-top: 20px;
                }
            }
        </style>

        <!-- Recent Activities Table -->


        <!-- Footer -->
        <div class="footer">
            <p>© 2025 Sistem Informasi Penilaian. All rights reserved.</p>
        </div>
    </div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Toggle sidebar functionality
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('main-content').classList.toggle('expanded');
        });

        // Data untuk grafik garis - Perkembangan Nilai Rata-rata
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
                datasets: [{
                        label: 'Matematika',
                        data: [78, 82, 80, 85, 83, 87, 89],
                        borderColor: '#3498db',
                        backgroundColor: 'rgba(52, 152, 219, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#3498db',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    },
                    {
                        label: 'B. Indonesia',
                        data: [75, 78, 80, 79, 82, 84, 85],
                        borderColor: '#2ecc71',
                        backgroundColor: 'rgba(46, 204, 113, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#2ecc71',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    },
                    {
                        label: 'IPA',
                        data: [72, 75, 77, 80, 83, 85, 84],
                        borderColor: '#f1c40f',
                        backgroundColor: 'rgba(241, 196, 15, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#f1c40f',
                        pointRadius: 4,
                        pointHoverRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            font: {
                                family: 'Poppins'
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Perkembangan Nilai Rata-rata',
                        font: {
                            size: 16,
                            family: 'Poppins',
                            weight: 'bold'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#333',
                        bodyColor: '#666',
                        bodyFont: {
                            family: 'Poppins'
                        },
                        titleFont: {
                            family: 'Poppins',
                            weight: 'bold'
                        },
                        borderColor: '#ddd',
                        borderWidth: 1,
                        caretSize: 8,
                        cornerRadius: 8,
                        displayColors: true,
                        boxPadding: 6
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 60,
                        max: 100,
                        ticks: {
                            stepSize: 10,
                            font: {
                                family: 'Poppins'
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: 'Poppins'
                            }
                        }
                    }
                },
                elements: {
                    line: {
                        borderWidth: 3
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false
                }
            }
        });

        // Data untuk diagram lingkaran - Distribusi Tingkat Ketuntasan
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Tuntas Sempurna', 'Tuntas', 'Belum Tuntas', 'Perlu Remedial'],
                datasets: [{
                    data: [25, 45, 20, 10],
                    backgroundColor: [
                        '#2ecc71', // Hijau
                        '#3498db', // Biru
                        '#f1c40f', // Kuning
                        '#e74c3c' // Merah
                    ],
                    borderColor: '#fff',
                    borderWidth: 2,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            font: {
                                family: 'Poppins',
                                size: 12
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Distribusi Tingkat Ketuntasan',
                        font: {
                            size: 16,
                            family: 'Poppins',
                            weight: 'bold'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#333',
                        bodyColor: '#666',
                        bodyFont: {
                            family: 'Poppins'
                        },
                        titleFont: {
                            family: 'Poppins',
                            weight: 'bold'
                        },
                        borderColor: '#ddd',
                        borderWidth: 1,
                        caretSize: 8,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((acc, data) => acc + data, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${percentage}% (${value} siswa)`;
                            }
                        }
                    }
                },
                animation: {
                    animateRotate: true,
                    animateScale: true
                }
            }
        });


    @endsection
