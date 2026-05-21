<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Helper untuk membuat data produk random.
     * Tugas memperbolehkan data diisi random karena belum memakai database.
     */
    private function generateProducts($count = 20)
    {
        $names = ['Laptop', 'Mouse', 'Keyboard', 'Monitor', 'Headset',
                  'Webcam', 'Printer', 'Speaker', 'Flashdisk', 'Harddisk'];
        $products = [];
        for ($i = 1; $i <= $count; $i++) {
            $products[] = [
                'id'          => $i,
                'name'        => $names[array_rand($names)] . ' Model ' . rand(1, 99),
                'description' => 'Deskripsi singkat untuk produk nomor ' . $i,
                'price'       => rand(50000, 5000000),
            ];
        }
        return $products;
    }

    // Poin 5 — menampilkan daftar produk
    function index(Request $request)
    {
        $products = $this->generateProducts(20); // Poin 12 — 20 produk
        return view('products.list', [
            'products' => $products,
        ]);
    }

    // Poin 6 — menampilkan form tambah produk
    function create(Request $request)
    {
        return view('products.form');
    }

    // Poin 8 — memproses data dari form
    function store(Request $request)
    {
        $name        = $request->name;
        $description = $request->description;
        $price       = $request->price;

        // Belum ada database, jadi langsung diarahkan kembali ke daftar produk
        return redirect()->route('products');
    }

    // Poin 10 — menampilkan detail satu produk
    function show(Request $request, $id)
    {
        $product = [
            'id'          => $id,
            'name'        => 'Produk ' . $id,
            'description' => 'Deskripsi lengkap untuk produk ' . $id,
            'price'       => rand(50000, 5000000),
        ];
        return view('products.show', [
            'product' => $product,
        ]);
    }

    // Poin 7 — menampilkan form edit produk
    function edit(Request $request, $id)
    {
        $product = [
            'id'          => $id,
            'name'        => 'Produk ' . $id,
            'description' => 'Deskripsi produk ' . $id,
            'price'       => rand(50000, 5000000),
        ];
        return view('products.form', [
            'product' => $product,
        ]);
    }

    // Poin 9 — memproses data edit produk
    function update(Request $request, $id)
    {
        $name        = $request->name;
        $description = $request->description;
        $price       = $request->price;

        return redirect()->route('products');
    }
}