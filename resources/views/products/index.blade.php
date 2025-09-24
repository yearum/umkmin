@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold text-black">Daftar Produk</h1>
@endsection

@section('content')
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('produk.index') }}" method="GET" class="mb-4 flex flex-wrap gap-2 items-center">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk..."
            class="px-4 py-2 border rounded w-full md:w-1/3">

        <select name="category" class="px-4 py-2 border rounded">
            <option value="">Semua Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>

        @if(request('search') || request('category'))
            <a href="{{ route('produk.index') }}" class="ml-2 text-sm text-red-500 hover:underline">Reset</a>
        @endif
    </form>

    @if(request('search') || request('category'))
        <p class="mb-4 text-gray-700">
            Menampilkan hasil
            @if(request('search'))
                untuk: <strong>"{{ request('search') }}"</strong>
            @endif
            @if(request('category'))
                di kategori <strong>{{ request('category') }}</strong>
            @endif
        </p>
    @endif

    <table class="w-full table-auto border border-gray-300 bg-white text-black">
        <thead>
            <tr class="bg-gray-100 text-center">
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Harga Beli</th>
                <th class="px-4 py-2">Harga Jual</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produk as $item)
            <tr class="border-t border-gray-200 text-center">
                <td class="px-4 py-2">{{ $item->nama }}</td>
                <td class="px-4 py-2">{{ $item->kategori }}</td>
                <td class="px-4 py-2">{{ $item->stok }}</td>
                <td class="px-4 py-2">Rp{{ number_format($item->harga_beli) }}</td>
                <td class="px-4 py-2">Rp{{ number_format($item->harga_jual) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-gray-500">Belum ada produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $produk->links() }}
    </div>
@endsection
