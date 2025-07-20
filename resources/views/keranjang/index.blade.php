@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">🧺 Keranjang Belanja</h2>

    {{-- ✅ Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Daftar item di keranjang --}}
    @forelse ($items as $item)
        <div class="card mb-3 shadow-sm">
            <div class="row g-0">
                <div class="col-md-2">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
                         class="img-fluid rounded-start" style="height: 100%; object-fit: cover;">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['name'] }}</h5>
                        <p class="card-text text-muted">{{ $item['description'] }}</p>
                        <p class="card-text text-primary fw-semibold">
                            Rp{{ number_format($item['price'], 0, ',', '.') }} × {{ $item['quantity'] }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Tidak ada item di keranjang.</p>
    @endforelse

    {{-- ✅ Ringkasan jika ada item --}}
    @if(count($items) > 0)
        <h4 class="mt-5 mb-3">📦 Ringkasan Keranjang</h4>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($items as $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h5 class="text-end fw-bold mt-3">Total: Rp{{ number_format($total, 0, ',', '.') }}</h5>

        {{-- ✅ Tombol aksi --}}
        <div class="d-flex justify-content-between mt-4">
            <form action="{{ route('keranjang.clear') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    🗑️ Kosongkan Keranjang
                </button>
            </form>

            <form action="{{ route('checkout.index') }}" method="GET">
                <button type="submit" class="btn btn-success">
                    💳 Checkout
                </button>
            </form>
        </div>
    @endif
</div>
@endsection
