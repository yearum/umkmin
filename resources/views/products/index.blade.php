@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold text-black dark:text-white">Daftar Produk</h1>
@endsection

@section('content')
    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-200 text-green-800 dark:bg-green-700 dark:text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Pencarian + Filter Kategori --}}
    <form action="{{ route('products.index') }}" method="GET" class="mb-4 flex flex-wrap gap-2 items-center">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk..."
            class="px-4 py-2 border rounded w-full md:w-1/3 dark:bg-gray-800 dark:text-white dark:border-gray-600">

        <select name="category" class="px-4 py-2 border rounded dark:bg-gray-800 dark:text-white dark:border-gray-600">
            <option value="">Semua Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>

        @if(request('search') || request('category'))
            <a href="{{ route('products.index') }}" class="ml-2 text-sm text-red-500 hover:underline">Reset</a>
        @endif
    </form>

    {{-- Keterangan hasil pencarian dan filter --}}
    @if(request('search') || request('category'))
        <p class="mb-4 text-gray-700 dark:text-gray-300">
            Menampilkan hasil
            @if(request('search'))
                untuk: <strong>"{{ request('search') }}"</strong>
            @endif
            @if(request('category'))
                di kategori <strong>{{ request('category') }}</strong>
            @endif
        </p>
    @endif

    <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Produk</a>

    <table class="w-full table-auto border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-black dark:text-white">
        <thead>
            <tr class="bg-gray-100 dark:bg-gray-700 text-center">
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Harga Beli</th>
                <th class="px-4 py-2">Harga Jual</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="border-t border-gray-200 dark:border-gray-700 text-center">
                <td class="px-4 py-2">{{ $product->name }}</td>
                <td class="px-4 py-2">{{ $product->category }}</td>
                <td class="px-4 py-2">{{ $product->stock }}</td>
                <td class="px-4 py-2">Rp{{ number_format($product->price_buy) }}</td>
                <td class="px-4 py-2">Rp{{ number_format($product->price_sell) }}</td>
                <td class="px-4 py-2 flex justify-center gap-2">
                    <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline">Edit</a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4 text-gray-500 dark:text-gray-300">Belum ada produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection