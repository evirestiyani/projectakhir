<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Penilaian</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    
    <!-- Google Fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    
    <style>
        :root {
            --primary-color: #309898;
            --secondary-color: #b2eae3;
            --accent-color: #f8fffe;
            --text-color: #333333;
            --error-color: #e74c3c;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f8fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Background Decoration */
        .background-shape {
            position: absolute;
            z-index: -1;
        }
        
        .shape-1 {
            top: -100px;
            left: -100px;
            width: 300px;
            height: 300px;
            background: var(--secondary-color);
            border-radius: 53% 47% 32% 68% / 27% 58% 42% 73%;
            opacity: 0.3;
            animation: float 8s ease-in-out infinite;
        }
        
        .shape-2 {
            bottom: -150px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: var(--secondary-color);
            border-radius: 24% 76% 35% 65% / 27% 35% 65% 73%;
            opacity: 0.2;
            animation: float 10s ease-in-out infinite alternate;
        }
        
        .shape-3 {
            top: 50%;
            left: 10%;
            width: 150px;
            height: 150px;
            background: var(--primary-color);
            border-radius: 50%;
            opacity: 0.1;
            animation: pulse 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
            100% {
                transform: translateY(0) rotate(0deg);
            }
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.15;
            }
            100% {
                transform: scale(1);
                opacity: 0.1;
            }
        }
        
        /* Login Card */
        .login-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            animation: fadeIn 0.8s ease forwards;
        }
        
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
        
        .card-decoration {
            position: absolute;
            top: -40px;
            left: -40px;
            width: 120px;
            height: 120px;
            opacity: 0.3;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo img {
            width: 80px;
            height: auto;
        }
        
        .welcome-text {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .welcome-text h2 {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        
        .welcome-text p {
            color: #777;
            font-size: 0.9rem;
        }
        
        /* Form Styling */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-control {
            height: 50px;
            border-radius: 12px;
            border: 2px solid #e9ecef;
            padding-left: 48px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(48, 152, 152, 0.15);
        }
        
        .form-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        
        .form-control:focus + .form-icon {
            color: var(--primary-color);
        }
        
        .btn-login {
            background-color: var(--primary-color);
            border: none;
            border-radius: 12px;
            color: white;
            height: 50px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover, .btn-login:focus {
            background-color: #2a8585;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(48, 152, 152, 0.2);
        }
        
        .alert-danger {
            background-color: rgba(231, 76, 60, 0.1);
            border: none;
            border-left: 4px solid var(--error-color);
            color: var(--error-color);
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #777;
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .login-container {
                max-width: 90%;
                padding: 2rem;
            }
            
            .welcome-text h2 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <!-- Background Decorations -->
    <div class="background-shape shape-1"></div>
    <div class="background-shape shape-2"></div>
    <div class="background-shape shape-3"></div>
    
    <div class="login-container">
        <!-- SVG Decoration -->
        <svg class="card-decoration" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="rgba(142, 236, 200, 0.2)" d="M42.8,-65.2C54.9,-56.5,63.8,-43.2,70.2,-28.7C76.7,-14.1,80.8,1.7,78.7,16.6C76.6,31.5,68.2,45.6,56.3,54.1C44.4,62.6,29,65.5,13.9,68.9C-1.3,72.3,-16.1,76.1,-30.3,73.1C-44.5,70.1,-58.1,60.2,-66.7,47.2C-75.3,34.2,-78.9,18.1,-78.2,2.5C-77.5,-13.1,-72.4,-27.8,-63.3,-38.3C-54.1,-48.9,-41,-55.3,-28.1,-63C-15.2,-70.7,-2.6,-79.9,9.2,-79.7C21,-79.6,30.6,-73.9,42.8,-65.2Z" transform="translate(100 100)" />
        </svg>
        
        <!-- Logo -->
        <div class="logo">
            <img src="https://cdn-icons-png.flaticon.com/512/3588/3588472.png" alt="Logo Sistem Penilaian">
        </div>
        
        <!-- Welcome Text -->
        <div class="welcome-text">
            <h2>Selamat Datang</h2>
            <p>Silakan masuk untuk mengakses Sistem Informasi Penilaian</p>
        </div>
        
        <!-- Error Alert -->
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ $errors->first() }}
        </div>
        @endif
        
        <!-- Login Form -->
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="identifier" placeholder="NIP atau NIS" required autofocus>
                <i class="fas fa-user form-icon"></i>
            </div>
            
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <i class="fas fa-lock form-icon"></i>
            </div>
            
            <div class="d-grid">
                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                </button>
            </div>
        </form>
        
        <!-- Footer -->
        <div class="footer-text">
            <p>&copy; 2025 Sistem Informasi Penilaian. All rights reserved.</p>
        </div>
    </div>
    
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>