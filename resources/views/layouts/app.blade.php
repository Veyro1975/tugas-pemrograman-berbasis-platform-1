<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toko Buku')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <nav class="bg-indigo-600 text-white px-6 py-4">
        <a href="{{ route('books.index') }}"
            class="font-bold text-lg">Toko Buku</a>
    </nav>
    
    <main class="max-w-4xl mx-auto px-4 py-8">

    <!-- Flash Messages — tampil dari session -->
        @foreach (['success', 'error', 'warning', 'info'] as $type)
            @if (session($type))
                <x-alert :type="$type" :message="session($type)" />
            @endif
        @endforeach

    <!-- Konten halaman -->
        @yield('content')
    </main>
</body>
</html>