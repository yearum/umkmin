<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    public function index()

{
    $products = [
        [
            'name' => 'Kopi Arabika Premium',
            'description' => 'Kopi lokal khas pegunungan dengan cita rasa kuat.',
            'price' => 35000,
            'image' => 'image/35cd328eaaa7e2886abcbb381b3c9c5c.jpeg'
        ],
        [
            'name' => 'Keripik Pisang Coklat',
            'description' => 'Camilan manis renyah dari UMKM lokal.',
            'price' => 15000,
            'image' => 'image/12-1-2024-9.jpg'
        ],
        [
            'name' => 'Sabun Herbal Alami',
            'description' => 'Sabun handmade dari bahan alami dan ramah kulit.',
            'price' => 25000,
            'image' => 'image/id-11134207-7r98t-lzo8vlbt9ctk15.jpg'
        ]
    ];

    return view('belanja.index', compact('products'));
}
}