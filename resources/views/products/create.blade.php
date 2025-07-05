@extends('layouts.app')

@section('content')
<div class="container max-w-md">
    <h1 class="text-2xl font-bold mb-4 text-black dark:text-white">Tambah Produk</h1>

    {{-- Tampilkan Pesan Error --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 dark:bg-red-200">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="productForm" action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold text-black dark:text-white">Nama Produk</label>
            <input type="text" name="name"
                value="{{ old('name') }}"
                class="w-full rounded p-2 border text-black dark:text-white dark:bg-gray-800 @error('name') border-red-500 @enderror"
                required>
        </div>

        <div>
            <label class="block font-semibold text-black dark:text-white">Kategori</label>
            <input type="text" name="category"
                value="{{ old('category') }}"
                class="w-full rounded p-2 border text-black dark:text-white dark:bg-gray-800 @error('category') border-red-500 @enderror">
        </div>

        <div>
            <label class="block font-semibold text-black dark:text-white">Stok</label>
            <input type="number" name="stock"
                value="{{ old('stock', 0) }}"
                class="w-full rounded p-2 border text-black dark:text-white dark:bg-gray-800 @error('stock') border-red-500 @enderror"
                required>
        </div>

        <div>
            <label class="block font-semibold text-black dark:text-white">Harga Beli</label>
            <input type="number" name="price_buy"
                value="{{ old('price_buy') }}"
                class="w-full rounded p-2 border text-black dark:text-white dark:bg-gray-800 @error('price_buy') border-red-500 @enderror"
                required>
        </div>

        <div>
            <label class="block font-semibold text-black dark:text-white">Harga Jual</label>
            <input type="number" name="price_sell"
                value="{{ old('price_sell') }}"
                class="w-full rounded p-2 border text-black dark:text-white dark:bg-gray-800 @error('price_sell') border-red-500 @enderror"
                required>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

{{-- JavaScript Validasi --}}
<script>
    document.getElementById('productForm').addEventListener('submit', function(e) {
        const fields = ['name', 'stock', 'price_buy', 'price_sell'];
        let isValid = true;

        fields.forEach(field => {
            const input = document.querySelector(`[name="${field}"]`);
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                isValid = false;
            } else {
                input.classList.remove('border-red-500');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Mohon lengkapi semua field yang wajib diisi.');
        }
    });
</script>
@endsection
