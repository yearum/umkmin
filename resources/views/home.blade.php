<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="p-4 bg-white shadow">
        <h2 class="text-xl font-semibold">Dashboard UMKMIN</h2>
    </header>

    <main class="p-6">

        <!-- 🔍 Form Filter Produk -->
        <form method="GET" action="{{ route('produk.index') }}" class="mb-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input type="text" name="nama" placeholder="Cari nama produk..." class="border p-2 rounded w-full">

                <select name="kategori" class="border p-2 rounded w-full">
                    <option value="">Semua Kategori</option>
                    <option value="makanan">Makanan</option>
                    <option value="fashion">Fashion</option>
                    <option value="kerajinan">Kerajinan</option>
                </select>

                <select name="stok" class="border p-2 rounded w-full">
                    <option value="">Semua Stok</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="habis">Habis</option>
                </select>
            </div>

            <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
                🔍 Filter Produk
            </button>
        </form>

        <!-- 📊 Grid Dashboard -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card: Info Pengguna -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">👤 Profil Pengguna</h3>
                <p class="text-sm text-gray-700">Nama: Jong</p>
                <p class="text-sm text-gray-700">Status: Aktif</p>
            </div>

            <!-- Card: Produk -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">📦 Produk Tersedia</h3>
                <p class="text-3xl font-bold text-indigo-600">128</p>
                <p class="text-sm text-gray-700">Produk aktif di katalog</p>
            </div>

            <!-- Card: Keranjang -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">🛒 Keranjang</h3>
                <p class="text-3xl font-bold text-green-600">3</p>
                <p class="text-sm text-gray-700">Item dalam keranjang</p>
            </div>

            <!-- Card: Statistik Mingguan -->
            <div class="bg-white p-6 rounded shadow col-span-1 md:col-span-2 lg:col-span-3">
                <h3 class="text-lg font-semibold mb-4">📈 Statistik Mingguan</h3>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div>
                        <p class="text-xl font-bold text-blue-600">Rp 2.500.000</p>
                        <p class="text-sm text-gray-700">Pendapatan</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-yellow-600">45</p>
                        <p class="text-sm text-gray-700">Transaksi</p>
                    </div>
                    <div>
                        <p class="text-xl font-bold text-red-600">12</p>
                        <p class="text-sm text-gray-700">Produk Habis</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
