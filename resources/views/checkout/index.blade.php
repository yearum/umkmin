<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">🧾 Checkout</h2>

    <div class="bg-white p-4 rounded shadow">
        <h4 class="mb-3">Detail Belanjaan</h4>
        <ul>
            @foreach($items as $item)
                <li>{{ $item['name'] }} - {{ $item['quantity'] }} x Rp{{ number_format($item['price'], 0, ',', '.') }}</li>
            @endforeach
        </ul>

        <p class="mt-3 fw-bold text-primary">Total: Rp{{ number_format($total, 0, ',', '.') }}</p>

        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf
            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran:</label>
                <select name="payment_method" id="payment_method" class="form-select">
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="QRIS">QRIS</option>
                    <option value="COD">Cash on Delivery</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">💵 Bayar Sekarang</button>
        </form>
    </div>
</div>

</body>
</html>
