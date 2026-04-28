<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Penerimaan Produksi</title>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <style>
        body {
            margin: 0;
            font-family: system-ui, -apple-system, sans-serif;

            /* 🌙 DARK MOON LIGHT BACKGROUND */
            background:
                radial-gradient(circle at 15% 20%, rgba(99, 102, 241, 0.25), transparent 40%),
                radial-gradient(circle at 85% 10%, rgba(59, 130, 246, 0.18), transparent 45%),
                radial-gradient(circle at 50% 90%, rgba(168, 85, 247, 0.12), transparent 50%),
                #0b1220;

            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* CARD TETAP PUTIH */
        .login-card {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 18px;

            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.35),
                0 0 0 1px rgba(255, 255, 255, 0.05);

            backdrop-filter: blur(12px);
        }

        .brand-badge {
            width: 80px;
            height: 80px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .form-label {
            font-weight: 600;
            font-size: 14px;
            color: #111827;
        }

        .form-control-custom {
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            transition: 0.2s;
        }

        .form-control-custom:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
            background: #fff;
        }

        .input-group-text {
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
        }

        /* BUTTON FUTURISTIC */
        .btn-login {
            width: 100%;
            padding: 0.85rem;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.25);
            transition: 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.35);
        }

        .btn-toggle {
            border: 1px solid #e5e7eb;
            background: #f3f4f6;
            border-left: 0;
            border-radius: 0 12px 12px 0;
        }

        .alert-custom {
            background: #fef2f2;
            color: #991b1b;
            border-radius: 12px;
            padding: 12px;
            border: 1px solid #fecaca;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="p-4 p-md-5">
            <div class="d-flex flex-column align-items-center text-center mb-4">
                <div class="brand-badge mb-1">
                    <img src="{{ asset('images/logo-gt.png') }}" alt="GT Logo" class="img-fluid"
                        style="max-height: 60px;">
                </div>
                <div class="text-muted mb-3"
                    style="font-size: 0.7rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase;">
                    PT GAJAH TUNGGAL TBK
                </div>

                <p class="mb-0" style="font-weight: 600; color: #374151;">
                    Silakan login untuk melanjutkan
                </p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form id="loginForm" action="{{ route('login') }}" method="POST" autocomplete="on">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"
                            style="width: 46px; justify-content: center;">
                            <i data-lucide="user" class="text-muted" style="width: 18px; height: 18px;"></i>
                        </span>
                        <input type="text" class="form-control form-control-custom border-start-0" id="name"
                            name="name" value="{{ old('name') }}" required placeholder="Username"
                            autocomplete="username">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0"
                            style="width: 46px; justify-content: center;">
                            <i data-lucide="lock" class="text-muted" style="width: 18px; height: 18px;"></i>
                        </span>
                        <input type="password" class="form-control form-control-custom border-start-0" id="password"
                            name="password" required placeholder="Password" autocomplete="current-password">
                        <button type="button" class="btn btn-toggle" id="togglePassword" tabindex="-1">
                            <i data-lucide="eye"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                </div>

                <button id="loginBtn" type="submit" class="btn btn-login">
                    <span id="loginBtnText">Masuk</span>
                    <span id="loginSpinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"
                        aria-hidden="true"></span>
                </button>

                <div class="text-center mt-4">
                    <small class="text-muted">Belum punya akun? Hubungi Administrator</small>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/lucide.min.js') }}"></script>
    <script>
        lucide.createIcons();

        const form = document.getElementById('loginForm');
        const btn = document.getElementById('loginBtn');
        const spinner = document.getElementById('loginSpinner');
        const text = document.getElementById('loginBtnText');

        if (form && btn && spinner && text) {
            form.addEventListener('submit', function() {
                btn.disabled = true;
                spinner.classList.remove('d-none');
                text.textContent = 'Memproses...';
            });
        }

        // Toggle show/hide password
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').setAttribute('data-lucide', type === 'password' ? 'eye' : 'eye-off');
            lucide.createIcons();
        });

        // Register Service Worker (PWA)
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('{{ asset('sw.js') }}')
                    .then(function(reg) {
                        console.log('Service Worker registered.', reg);
                    })
                    .catch(function(err) {
                        console.log('Service Worker registration failed: ', err);
                    });
            });
        }
    </script>
</body>

</html>
