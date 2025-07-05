@extends('layouts.app')

@section('content')
<div class="container max-w-md">
    <h1 class="text-2xl font-bold mb-4 text-black dark:text-white">Edit Produk</h1>

    {{-- Tampilkan error validasi --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 dark:bg-red-200">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="editProductForm" action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold text-black dark:text-white">Nama Produk</label>
            <input type="text" name="name"
                value="{{ old('name', $product->name) }}"
                class="w-full px-4 py-2 border rounded text-black dark:text-white dark:bg-gray-800 @error('name') border-red-500 @enderror">
        </div>

        <div>
            <label class="block font-semibold text-black dark:text-white">Kategori</label>
            <input type="text" name="category"
                value="{{ old('category', $product->category) }}"
                class="w-full px-4 py-2 border rounded text-black dark:text-white dark:bg-gray-800 @error('category') border-red-500 @enderror">
        </div>

        <div>
            <label class="block font-semibold text-black dark:text-white">Stok</label>
            <input type="number" name="stock"
                value="{{ old('stock', $product->stock) }}"
                class="w-full px-4 py-2 border rounded text-black dark:text-white dark:bg-gray-800 @error('stock') border-red-500 @enderror">
        </div>

        <div>
            <label class="block font-semibold text-black dark:text-white">Harga Beli</label>
            <input type="number" name="price_buy"
                value="{{ old('price_buy', $product->price_buy) }}"
                class="w-full px-4 py-2 border rounded text-black dark:text-white dark:bg-gray-800 @error('price_buy') border-red-500 @enderror">
        </div>

        <div>
            <label class="block font-semibold text-black dark:text-white">Harga Jual</label>
            <input type="number" name="price_sell"
                value="{{ old('price_sell', $product->price_sell) }}"
                class="w-full px-4 py-2 border rounded text-black dark:text-white dark:bg-gray-800 @error('price_sell') border-red-500 @enderror">
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

{{-- Validasi Client-Side --}}
<script>
    document.getElementById('editProductForm').addEventListener('submit', function(e) {
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
            alert('Mohon lengkapi semua field wajib!');
        }
    });
</script>
@endsection
