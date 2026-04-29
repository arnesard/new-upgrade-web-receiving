<!DOCTYPE html>

<html lang="id">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Menu</title>


    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/lucide.min.js') }}"></script>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: radial-gradient(circle at top, #1e293b, #020617);
            color: #e2e8f0;
        }

        .container-box {
            max-width: 420px;
            margin: auto;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .title {
            text-align: center;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .card-menu {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(10px);
            text-decoration: none;
            color: #e2e8f0;
            transition: 0.25s ease;
            border: 1px solid rgba(255, 255, 255, 0.06);
        }

        .card-menu:hover {
            transform: translateY(-5px);
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.15);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.25);
        }

        .icon-box {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            background: rgba(59, 130, 246, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .menu-text {
            font-size: 15px;
            font-weight: 600;
        }

        /* subtle glow effect */
        .card-menu::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 18px;
            opacity: 0;
            transition: 0.3s;
        }

        .card-menu:hover::after {
            opacity: 1;
        }

        .logout-btn {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            padding: 14px;
            margin-top: 10px;

            border-radius: 14px;
            border: 1px solid rgba(255, 255, 255, 0.08);

            background: rgba(239, 68, 68, 0.08);
            color: #fca5a5;

            font-weight: 600;
            font-size: 14px;

            cursor: pointer;
            transition: 0.25s ease;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.18);
            border-color: rgba(239, 68, 68, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.2);
        }
    </style>


</head>

<body>


    <div class="container-box">

        <div class="title">
            PILIH MENU
        </div>

        <div class="menu">

            <a href="{{ route('penerimaan.index') }}" class="card-menu">
                <div class="icon-box">
                    <i data-lucide="package"></i>
                </div>
                <div class="menu-text">
                    Penerimaan Produksi
                </div>
            </a>

            <a href="{{ route('transfer.index') }}" class="card-menu">
                <div class="icon-box">
                    <i data-lucide="repeat"></i>
                </div>
                <div class="menu-text">
                    Monitoring Transfer Rak
                </div>
            </a>
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 30px;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i data-lucide="log-out"></i>
                    <span>Logout</span>
                </button>
            </form>

        </div>

    </div>


    <script>
        lucide.createIcons();
    </script>


</body>

</html>
