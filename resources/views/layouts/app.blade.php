<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <title>Toko Elektronik</title>
</head>

<body style="padding-top: 70px; padding-bottom: 60px;">
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Toko Elektronik</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('product.index') }}">Daftar Produk</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('product.create') }}">Tambah Produk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- CONTENT --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- FOOTER --}}
    <footer class="bg-dark text-white text-center py-3 fixed-bottom border-top">
        <div class="container">
            <small>&copy; {{ date('Y') }} Sistem Inventaris Toko Elektronik</small>
        </div>
    </footer>

    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    @stack('scripts')

</body>

</html>
