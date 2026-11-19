<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | BCOMP - Garuda Daya Pratama Sejahtera</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons untuk ikon mata / logo -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --brand-navy: #192231;
            --brand-blue: #0084ff;
            --brand-blue-hover: #0070db;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Inter', sans-serif;
            /* Ganti url(...) dengan path background Anda di akhir */
            background: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset("images/bg-login.jpeg") }}') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 40px 80px;
            color: #ffffff;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            z-index: 10;
        }

        /* Brand / Logo Header */
        .brand-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .brand-logo {
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 4px;
        }

        .brand-logo img {
            width: 100%;
            height: auto;
        }

        .brand-title {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #ffffff;
        }

        .brand-subtitle {
            font-size: 10px;
            color: #94a3b8;
            letter-spacing: 0.8px;
            font-weight: 500;
        }

        /* Welcome Text */
        .welcome-text h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 8px 0;
            letter-spacing: -0.5px;
            color: #ffffff;
        }

        .welcome-text p {
            color: #94a3b8;
            font-size: 14px;
            margin: 0 0 28px 0;
        }

        /* Form Inputs */
        .field {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #e2e8f0;
            font-size: 13px;
            font-weight: 500;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            height: 48px;
            padding: 0 16px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            color: #ffffff;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
        }

        input::placeholder {
            color: #64748b;
        }

        input:focus {
            border-color: var(--brand-blue);
            background: rgba(15, 23, 42, 0.85);
            box-shadow: 0 0 0 4px rgba(0, 132, 255, 0.15);
        }

        .password-box input {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            font-size: 16px;
        }

        .toggle-password:hover {
            color: #ffffff;
        }

        /* Remember Me & Checkbox */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            font-size: 13px;
            color: #cbd5e1;
            cursor: pointer;
        }

        .remember-row input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--brand-blue);
            border-radius: 4px;
            cursor: pointer;
        }

        /* Submit Button */
        .btn-sign-in {
            width: 100%;
            height: 48px;
            background: var(--brand-blue);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            box-shadow: 0 4px 12px rgba(0, 132, 255, 0.3);
        }

        .btn-sign-in:hover {
            background: var(--brand-blue-hover);
        }

        .btn-sign-in:active {
            transform: scale(0.99);
        }

        /* Divider OR CONTINUE WITH */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 24px 0;
            color: #64748b;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .divider::before {
            margin-right: 15px;
        }

        .divider::after {
            margin-left: 15px;
        }

        /* Microsoft Login Button */
        .btn-microsoft {
            width: 100%;
            height: 48px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-microsoft:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Error Box */
        .errors {
            margin-bottom: 20px;
            padding: 12px 16px;
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 10px;
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            font-size: 13px;
        }

        .errors ul {
            margin: 0;
            padding-left: 16px;
        }

        /* Responsive Mobile */
        @media (max-width: 576px) {
            body {
                padding: 24px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Logo & Header -->
        <div class="brand-header">
            <div class="brand-logo">
                <!-- Sesuaikan path asset logo GDPS Anda -->
                <img src="{{ asset('images/gdps-icon.webp') }}" alt="GDPS Logo">
            </div>
            <div>
                <div class="brand-title">BCOMP</div>
                <div class="brand-subtitle">BUSINEES COMPLAINANCE DASHBOARD</div>
            </div>
        </div>

        <!-- Greeting -->
        <div class="welcome-text">
            <h1>Welcome back</h1>
            <p>Sign in to your businees compliance dashboard.</p>
        </div>

        <!-- Error Alert (jika ada) -->
        @if ($errors->any())
            <div class="errors" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email">Email address or Employee Code</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="name@garudapratama.com" autocomplete="username" required autofocus>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <div class="password-box">
                    <input id="password" type="password" name="password" placeholder="••••••••" autocomplete="current-password" required>
                    <button class="toggle-password" type="button" aria-controls="password" aria-label="Tampilkan password" onclick="togglePassword()">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                </div>
            </div>

            <label class="remember-row" for="remember">
                <input id="remember" type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                <span>Keep me signed in</span>
            </label>

            <button class="btn-sign-in" type="submit">Sign in</button>
        </form>

        <div class="divider">OR CONTINUE WITH</div>

        <!-- Microsoft 365 Login Button -->
        <a href="{{ route('microsoft.login') }}" class="btn-microsoft">
            <svg width="18" height="18" viewBox="0 0 21 21" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="1" width="9" height="9" fill="#f25022"/>
                <rect x="11" y="1" width="9" height="9" fill="#7fba00"/>
                <rect x="1" y="11" width="9" height="9" fill="#01a4ef"/>
                <rect x="11" y="11" width="9" height="9" fill="#ffb900"/>
            </svg>
            Login with Microsoft Account
        </a>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            const isVisible = input.type === 'text';
            
            input.type = isVisible ? 'password' : 'text';
            icon.className = isVisible ? 'bi bi-eye' : 'bi bi-eye-slash';
        }
    </script>
</body>
</html>