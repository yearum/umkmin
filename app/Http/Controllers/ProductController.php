<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $query = Product::query();

    // Ambil semua kategori unik untuk filter
    $categories = Product::select('category')->distinct()->pluck('category');

    // Filter by keyword pencarian
    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filter by kategori jika dipilih
    if ($request->has('category') && $request->category !== '') {
        $query->where('category', $request->category);
    }

    $products = $query->get();

    return view('products.index', compact('products', 'categories'));
}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'nullable|string|max:255',
        'stock' => 'required|integer|min:0',
        'price_buy' => 'required|numeric|min:0',
        'price_sell' => 'required|numeric|min:0',
    ]);

    Product::create($request->all());

    return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
{
      return view('products.edit', compact('product'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required',
        'category' => 'nullable',
        'stock' => 'required|integer',
        'price_buy' => 'required|numeric',
        'price_sell' => 'required|numeric',
    ]);

    $product->update($validated);

    return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
}
}

