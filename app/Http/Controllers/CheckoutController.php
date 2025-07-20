<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // pastikan barryvdh/laravel-dompdf sudah di-install

class CheckoutController extends Controller
{
    public function index()
    {
        $items = session()->get('cart', []);
        $total = collect($items)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('checkout.index', compact('items', 'total'));
    }

    public function process(Request $request)
    {
        $items = session()->get('cart', []);
        $total = collect($items)->sum(fn($item) => $item['price'] * $item['quantity']);

        session()->put('checkout_data', [
            'items' => $items,
            'total' => $total,
            'payment_method' => $request->input('payment_method', 'Transfer Bank'),
        ]);

        session()->forget('cart');

        return redirect()->route('checkout.receipt')->with('success', 'Checkout berhasil!');
    }

    public function receipt()
    {
        $data = session('checkout_data');

        if (!$data) {
            return redirect()->route('belanja.index')->with('error', 'Data checkout tidak ditemukan.');
        }

        return view('checkout.receipt', [
            'items' => $data['items'],
            'total' => $data['total'],
            'payment_method' => $data['payment_method']
        ]);
    }

    public function download()
    {
        $data = session('checkout_data');

        if (!$data) {
            return redirect()->route('belanja.index')->with('error', 'Data checkout tidak ditemukan.');
        }

        $pdf = PDF::loadView('checkout.receipt-pdf', [
            'items' => $data['items'],
            'total' => $data['total'],
            'payment_method' => $data['payment_method']
        ]);

        return $pdf->download('nota-pembelian.pdf');
    }
}
