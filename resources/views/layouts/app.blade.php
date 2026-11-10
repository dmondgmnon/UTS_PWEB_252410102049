<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gudang Bahan Baku') | StokDapur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-50 text-stone-800 min-h-screen flex flex-col">

    {{-- Navbar hanya tampil setelah login --}}
    @if (session('username'))
        <x-navbar />
    @endif

    <main class="flex-1 w-full max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>
