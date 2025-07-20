<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nota Pembelian</title>
    <style>
        body { font-family: sans-serif; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>Nota Pembelian</h2>
    <ul>
        @foreach ($items as $item)
            <li>{{ $item['name'] }} - {{ $item['quantity'] }} x Rp{{ number_format($item['price'], 0, ',', '.') }}</li>
        @endforeach
    </ul>
    <p><strong>Total:</strong> Rp{{ number_format($total, 0, ',', '.') }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ $payment_method }}</p>
</body>
</html>
