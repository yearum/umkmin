<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Toggle dark mode dan simpan preferensi
        function toggleDark() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        }

        // Aktifkan dark mode jika sebelumnya dipilih
        if (localStorage.theme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans">

    {{-- Header --}}
    @hasSection('header')
        <header class="bg-white dark:bg-gray-800 shadow p-4 flex justify-between items-center">
            <div>
                @yield('header')
            </div>
            <button onclick="toggleDark()" class="text-sm bg-gray-300 dark:bg-gray-700 px-3 py-1 rounded hover:opacity-80">
                Toggle Dark Mode
            </button>
        </header>
    @endif

    {{-- Main Content --}}
    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
