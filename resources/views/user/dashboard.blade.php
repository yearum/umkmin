@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; margin: 40px auto;">
    <div class="card">
        <h2 style="margin-bottom: 20px;">📋 Dashboard Pengguna</h2>

        <button onclick="toggleDarkMode()" style="margin-bottom: 20px;">🌓 Toggle Dark Mode</button>

        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            <a href="/belanja" style="padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;">🛍️ Belanja Produk</a>
            <a href="/keranjang" style="padding: 10px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">🛒 Lihat Keranjang</a>
            <a href="/checkout" style="padding: 10px 15px; background: #ffc107; color: black; text-decoration: none; border-radius: 5px;">💳 Checkout Pembelian</a>
        </div>
    </div>
</div>
@endsection
