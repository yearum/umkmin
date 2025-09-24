<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
    return view('checkout.index');
}

public function process() {
    // logika proses checkout
    return redirect()->route('home')->with('success', 'Checkout berhasil!');
}

}
