<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('kategori', $request->category);
        }

        $products = $query->paginate(10);

        // Ambil semua kategori unik dari database
        $categories = Produk::select('kategori')->distinct()->pluck('kategori');

        return view('produk.index', compact('produk', 'categories'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }
}
