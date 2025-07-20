<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    /**
     * Menampilkan isi keranjang
     */
    public function index()
    {
        // Ambil data keranjang dari session, jika tidak ada isi dengan array kosong
        $items = session()->get('cart', []);

        // Tampilkan halaman keranjang
        return view('keranjang.index', compact('items'));
    }

    /**
     * Menyimpan item baru ke keranjang
     */
    public function store(Request $request)
    {
        // Ambil data produk dari form
        $item = $request->only(['name', 'price', 'image', 'description']);
        $item['quantity'] = $request->input('quantity', 1);

        // Ambil keranjang saat ini dari session
        $cart = session()->get('cart', []);

        // Tambahkan item ke keranjang
        $cart[] = $item;

        // Simpan kembali ke session
        session()->put('cart', $cart);

        // Redirect ke halaman keranjang dengan pesan sukses
        return redirect()->route('keranjang.index')->with('success', 'Produk ditambahkan ke keranjang!');
    }
    public function clear()
{
    session()->forget('cart');
    return redirect()->route('belanja.index')->with('success', 'Keranjang berhasil dikosongkan.');
}

}

