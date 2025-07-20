<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota Pembayaran</title>
    <style>
        body { font-family: sans-serif; }
        .total { color: blue; font-weight: bold; }
        .section { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>🧾 Nota Pembayaran</h2>

    <div class="section">
        <h4>Detail Belanjaan:</h4>
        <ul>
            @foreach($items as $item)
                <li>{{ $item['name'] }} - {{ $item['quantity'] }} x Rp{{ number_format($item['price'], 0, ',', '.') }}</li>
            @endforeach
        </ul>
        <p class="total">Total: Rp{{ number_format($total, 0, ',', '.') }}</p>
    </div>

    <div class="section">
        <h4>Metode Pembayaran:</h4>
        <p>{{ $payment_method }}</p>

        @if($payment_method === 'QRIS')
            <img src="{{ public_path('images/qris.png') }}" alt="QRIS" width="200">
        @elseif($payment_method === 'Transfer Bank')
            <p>Bank: BCA<br>No Rek: 1234567890<br>Nama: Toko Contoh</p>
        @elseif($payment_method === 'COD')
            <p>Bayar di tempat (COD).</p>
        @endif
    </div>
</body>
</html>
