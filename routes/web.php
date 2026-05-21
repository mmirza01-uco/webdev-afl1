<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Halaman utama diarahkan ke daftar produk (opsional, untuk kemudahan)
Route::get('/', function () {
    return redirect()->route('products');
});

// Poin 11 — Group route berdasarkan URI /products dan Controller ProductController
Route::controller(ProductController::class)->prefix('products')->group(function () {

    // Poin 5 — products  | GET  /products            -> index
    Route::get('/', 'index')->name('products');

    // Poin 6 — products.create | GET  /products/create -> create
    Route::get('/create', 'create')->name('products.create');

    // Poin 7 — products.edit   | GET  /products/edit/{id} (id wajib) -> edit
    Route::get('/edit/{id}', 'edit')->name('products.edit');

    // Poin 8 — products.store  | POST /products/store -> store
    Route::post('/store', 'store')->name('products.store');

    // Poin 9 — products.update | POST /products/update/{id} (id wajib) -> update
    Route::post('/update/{id}', 'update')->name('products.update');

    // Poin 10 — products.show  | GET  /products/show/{id} (id wajib) -> show
    Route::get('/show/{id}', 'show')->name('products.show');
});