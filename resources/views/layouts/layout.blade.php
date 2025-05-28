<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvaluaTech Admin - Version 3</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        /* SIDEBAR VERSION 3 - GLASS MORPHISM STYLE */
        .sidebar {
            height: 100vh;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            box-shadow: 0 0 30px rgba(48, 152, 152, 0.1);
            transition: all 0.3s ease;
            z-index: 1000;
            border-right: 1px solid rgba(48, 152, 152, 0.1);
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-header {
            padding: 25px 20px;
            text-align: left;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(48, 152, 152, 0.1);
            margin-bottom: 20px;
        }

        .sidebar-logo {
            background: linear-gradient(135deg, #309898, #38b6b6);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            box-shadow: 0 5px 15px rgba(48, 152, 152, 0.2);
        }

        .sidebar-logo i {
            color: white;
            font-size: 20px;
        }

        .sidebar-brand {
            color: var(--dark-text);
            font-weight: 600;
            font-size: 18px;
            margin: 0;
            line-height: 1.2;
        }

        .sidebar-brand span {
            display: block;
            font-size: 12px;
            font-weight: 400;
            color: var(--primary-color);
        }

        .menu-divider {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #98a6ad;
            padding: 10px 30px;
            margin-top: 15px;
        }

        .nav-item {
            position: relative;
            padding: 0 20px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #667085 !important;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s;
            margin: 3px 0;
            position: relative;
            z-index: 1;
            border-left: 0 solid transparent;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background-color: rgba(48, 152, 152, 0.1);
            border-radius: 8px;
            z-index: -1;
            transition: all 0.3s ease;
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            border-left: 3px solid var(--primary-color);
            padding-left: 12px;
        }

        .nav-link.active {
            color: var(--primary-color) !important;
            background: rgba(48, 152, 152, 0.15);
            border-left: 3px solid var(--primary-color);
            padding-left: 12px;
            font-weight: 600;
        }

        .nav-link i {
            font-size: 18px;
            width: 24px;
            text-align: center;
            margin-right: 10px;
            opacity: 0.7;
            transition: all 0.3s;
        }

        .nav-link:hover i,
        .nav-link.active i {
            opacity: 1;
            color: var(--primary-color);
        }

        .nav-indicator {
            position: absolute;
            left: 0;
            top: 11px;
            height: 22px;
            width: 3px;
            border-radius: 3px;
            background-color: var(--primary-color);
            opacity: 0;
            transition: all 0.3s;
        }

        .nav-link.active+.nav-indicator {
            opacity: 1;
        }

        .admin-profile {
            margin: 25px 20px;
            background: linear-gradient(to right, rgba(48, 152, 152, 0.1), rgba(255, 255, 255, 0.7));
            border-radius: 10px;
            padding: 15px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .admin-profile::before {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(48, 152, 152, 0.2), transparent);
            right: -50px;
            bottom: -50px;
            border-radius: 50%;
        }

        .admin-avatar {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-color);
        }

        .admin-details {
            flex-grow: 1;
        }

        .admin-name {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 2px;
        }

        .admin-role {
            font-size: 12px;
            color: #667085;
        }

        .admin-menu {
            margin-left: auto;
            color: #667085;
            font-size: 18px;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .admin-menu:hover {
            color: var(--primary-color);
        }

        .logout-section {
            padding: 20px;
            margin-top: auto;
            border-top: 1px solid rgba(48, 152, 152, 0.1);
        }

        .btn-logout {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: rgba(231, 76, 60, 0.2);
            transform: translateY(-2px);
        }

        .btn-logout i {
            margin-right: 8px;
        }

        .sidebar-footer {
            padding: 15px 20px;
            font-size: 12px;
            color: #98a6ad;
            text-align: center;
            border-top: 1px solid rgba(48, 152, 152, 0.1);
        }

        /* Main content positioning */
        .main-content {
            padding: 30px;
            transition: all 0.3s;
            width: calc(100% - 280px);
            margin-left: 280px;
            min-height: 100vh;
        }

        /* Media query for responsive design */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                width: 100%;
                margin-left: 0;
            }

            .toggle-sidebar {
                display: block;
            }
        }

        /* Toggle sidebar button */
        .toggle-sidebar {
            display: none;
            position: fixed;
            right: 20px;
            bottom: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            color: var(--primary-color);
            font-size: 18px;
            cursor: pointer;
            z-index: 999;
            transition: all 0.3s;
        }

        .toggle-sidebar:hover {
            transform: rotate(90deg);
            background: var(--primary-color);
            color: white;
        }

       .logout-button {
        padding: 10px 24px;
        background-color: #F7CFD8; /* pastel pink */
        color: #4B4453; /* soft dark text */
        border: none;
        border-radius: 12px;
        cursor: pointer;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .logout-button:hover {
        background-color: #f4bfc8; /* slightly darker on hover */
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-chart-line"></i>
            </div>
            <h4 class="sidebar-brand">
                EvaluaTech
                <span>Admin Dashboard</span>
            </h4>
        </div>

        <div class="admin-profile">
            <div class="admin-avatar">
                A
            </div>
            <div class="admin-details">
                <div class="admin-name">Admin User</div>
                <div class="admin-role">Administrator</div>
            </div>
            <div class="admin-menu">
                <i class="fas fa-ellipsis-v"></i>
            </div>
        </div>

        <div class="menu-divider">Main Menu</div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.dashboardadmin') ? 'active' : '' }}"
                    href="{{ route('admin.dashboardadmin') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <div class="nav-indicator"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.dataguru.index') ? 'active' : '' }}"
                    href="{{ route('admin.dataguru.index') }}">
                    <i class="fas fa-chalkboard-teacher"></i> Data Guru
                </a>
                <div class="nav-indicator"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('datamatapelajaran.index') ? 'active' : '' }}"
                    href="{{ route('datamatapelajaran.index') }}">
                    <i class="fas fa-book"></i> Data Mata Pelajaran
                </a>
                <div class="nav-indicator"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.datamurid.index') ? 'active' : '' }}"
                    href="{{ route('admin.datamurid.index') }}">
                    <i class="fas fa-user-graduate"></i> Data Murid
                </a>
                <div class="nav-indicator"></div>
            </li>
        </ul>

        <div class="menu-divider">Management</div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.datanilai.index') ? 'active' : '' }}"
                    href="{{ route('admin.datanilai.index') }}">
                    <i class="fas fa-clipboard-list"></i> Penilaian
                </a>
                <div class="nav-indicator"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('admin.datauser.index') ? 'active' : '' }}"
                    href="{{ route('admin.datauser.index') }}">
                    <i class="fas fa-users"></i> Data User
                </a>
                <div class="nav-indicator"></div>
            </li>
        </ul>
        
  <div class="logout-section mt-auto" style="text-align: center; margin-top: 20px;">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>
</div>


        <div class="sidebar-footer">
            EvaluaTech Admin Panel &copy; 2025
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="main-content">
        <button class="toggle-sidebar" id="toggle-sidebar">
            <i class="fas fa-bars"></i>
        </button>
        @yield('content')
    </div>

    <!-- Toggle Sidebar Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const toggleBtn = document.getElementById('toggle-sidebar');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }

            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    sidebar.classList.remove('active');
                    mainContent.style.marginLeft = '280px';
                } else {
                    mainContent.style.marginLeft = '0';
                }
            });
        });
    </script>
</body>

</html>
