<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Platform Crowdfunding')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Vite assets, jika Anda menggunakan Vite untuk CSS manual Anda --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f4; }
        .header { background-color: #333; color: white; padding: 15px 20px; text-align: center; }
        .header a { color: white; text-decoration: none; margin: 0 15px; }
        .container { width: 90%; margin: 20px auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .campaign-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .campaign-item { border: 1px solid #ddd; border-radius: 8px; overflow: hidden; background-color: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .campaign-item img { width: 100%; height: 200px; object-fit: cover; }
        .campaign-content { padding: 15px; }
        .campaign-title { font-size: 1.2em; margin-top: 0; margin-bottom: 10px; }
        .progress-bar-container { background-color: #e0e0e0; border-radius: 5px; height: 10px; margin-top: 10px; }
        .progress-bar { height: 100%; background-color: #4CAF50; border-radius: 5px; text-align: center; color: white; font-size: 0.8em; line-height: 10px; }
        .campaign-footer { display: flex; justify-content: space-between; font-size: 0.9em; color: #555; margin-top: 10px; }
        .footer { text-align: center; padding: 20px; margin-top: 40px; background-color: #333; color: white; }
        .alert.alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .alert.alert-danger ul {
            margin: 0;
            padding-left: 20px;
        }
        /* CSS tambahan untuk halaman donasi dan pembayaran (dari langkah sebelumnya) */
        .donation-form-container, .payment-detail-container, .confirmation-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 600px; /* atau 700px untuk payment */
            margin: 20px auto;
            text-align: center;
        }
        .donation-form-container h1, .payment-detail-container h1, .confirmation-container h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .donation-form .form-group { margin-bottom: 15px; }
        .donation-form label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        .donation-form input[type="text"], .donation-form input[type="number"], .donation-form select {
            width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;
        }
        .btn-submit-donation, .btn-paid, .btn-cancel, .btn-primary, .btn-secondary {
            display: inline-block; padding: 12px 25px; margin: 0 10px; text-decoration: none; border-radius: 5px;
            font-weight: bold; transition: background-color 0.3s ease;
        }
        .btn-submit-donation, .btn-primary { background-color: #007bff; color: white; border: none;}
        .btn-submit-donation:hover, .btn-primary:hover { background-color: #0056b3; }
        .btn-paid { background-color: #5cb85c; color: white; }
        .btn-paid:hover { background-color: #4cae4c; }
        .btn-cancel, .btn-secondary { background-color: #6c757d; color: white; }
        .btn-cancel:hover, .btn-secondary:hover { background-color: #5a6268; }

        .payment-info-box { border: 1px dashed #ccc; padding: 20px; margin-bottom: 30px; background-color: #f9f9f9; border-radius: 8px; }
        .info-item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #eee; }
        .info-item.highlight .value { color: #d9534f; font-size: 1.2em; font-weight: bold; }
        .qris-image { max-width: 100%; height: auto; display: block; margin: 0 auto; }

        .confirmation-icon { font-size: 5em; color: #5cb85c; margin-bottom: 20px; line-height: 1; }
        .unique-code-info { font-size: 1.2em; font-weight: bold; color: #d9534f; margin-bottom: 30px; }
        .status-badge { display: inline-block; padding: 5px 15px; border-radius: 20px; font-weight: bold; color: white; margin: 10px 0; }
        .status-pending { background-color: #f0ad4e; }
        .status-paid { background-color: #007bff; }
        .status-verified { background-color: #5cb85c; }
        .status-cancelled { background-color: #d9534f; }
    </style>
</head>
<body>
    {{-- Header ini akan sama untuk semua halaman publik --}}
    <div class="header">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="#">Tentang Kami</a>
        <a href="#">Hubungi Kami</a>
        {{-- Tambahkan link login/admin jika diperlukan --}}
        @guest
            <a href="{{ route('login') }}">Login Admin</a>
        @endguest
    </div>

    {{-- Konten utama dari setiap halaman akan dimasukkan di sini --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Footer ini akan sama untuk semua halaman publik --}}
    <div class="footer">
        <p>&copy; {{ date('Y') }} Platform Crowdfunding Anda. Semua Hak Dilindungi.</p>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>