<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index() {
    return view('keranjang.index');
}

public function add($id) {
    // logika tambah ke keranjang
    return redirect()->route('keranjang');
}

public function remove($id) {
    // logika hapus dari keranjang
    return redirect()->route('keranjang');
}

}
