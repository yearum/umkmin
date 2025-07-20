@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">🛍️ Halaman Belanja</h2>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card h-100 shadow">
                <img src="{{ Str::startsWith($product['image'], 'http') ? $product['image'] : asset($product['image']) }}"
                     class="card-img-top" alt="{{ $product['name'] }}"
                     style="height: 200px; object-fit: cover;">

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text text-muted mb-2" style="flex-grow: 1;">{{ $product['description'] }}</p>
                    <p class="text-primary fw-bold fs-5">Rp{{ number_format($product['price'], 0, ',', '.') }}</p>

                    <form method="POST" action="{{ route('keranjang.store') }}" class="mt-auto">
                        @csrf
                        <input type="hidden" name="name" value="{{ $product['name'] }}">
                        <input type="hidden" name="price" value="{{ $product['price'] }}">
                        <input type="hidden" name="image" value="{{ $product['image'] }}">
                        <input type="hidden" name="description" value="{{ $product['description'] }}">

                        <div class="mb-2">
                            <label for="quantity_{{ $loop->index }}" class="form-label">Jumlah:</label>
                            <input type="number" name="quantity" id="quantity_{{ $loop->index }}"
                                   class="form-control" value="1" min="1">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            + Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
