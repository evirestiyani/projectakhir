<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvaluaTech Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #007bff;
            --light-text: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
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
</head>
<body>
    {{-- Sidebar --}}
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

    {{-- Main Content --}}
    <div id="main-content" class="main-content">
        @yield('content')
    </div>

    {{-- Toggle Sidebar Script (Optional) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const toggleBtn = document.getElementById('toggle-sidebar');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('active');
                });
            }

            window.addEventListener('resize', function () {
                if (window.innerWidth >= 992) {
                    sidebar.classList.remove('active');
                    mainContent.style.marginLeft = '250px';
                } else {
                    mainContent.style.marginLeft = '0';
                }
            });
        });
    </script>
</body>
</html>
