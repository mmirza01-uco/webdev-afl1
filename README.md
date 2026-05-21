<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Web Development — AFL 1

> Moch Mirza Ilham Tontowi | 0706012424026

Tugas progress report pertama mata kuliah Web Development. Project Laravel yang
mengimplementasikan struktur CRUD produk dengan **Controller**, **Routing**,
**Blade Template**, **Blade Component**, dan **Bootstrap**.

> Catatan: progress report ini belum melibatkan database. Data produk diisi secara
> random di controller sebagai placeholder.

## Tech Stack

- **Laravel** (PHP framework)
- **Blade** — templating engine bawaan Laravel
- **Bootstrap 5.3** — CSS framework (via CDN)
- **Laravel Herd** — environment lokal (PHP, Composer, Nginx)

## Fitur yang Diimplementasikan

Sesuai 14 poin tugas:

1. Controller `ProductController` dengan 6 fungsi (`index`, `create`, `store`, `show`, `edit`, `update`)
2. View dibuat menggunakan Blade template
3. View memanfaatkan Blade component (`<x-template>`) sebagai layout
4. Tampilan menggunakan framework Bootstrap
5. Route `products` — `GET /products` → `index`
6. Route `products.create` — `GET /products/create` → `create`
7. Route `products.edit` — `GET /products/edit/{id}` → `edit`
8. Route `products.store` — `POST /products/store` → `store`
9. Route `products.update` — `POST /products/update/{id}` → `update`
10. Route `products.show` — `GET /products/show/{id}` → `show`
11. Group route berdasarkan URI `/products` dan `ProductController`
12. Menampilkan 20 produk di view `products.list` dengan Blade directive `@foreach`
13. Tombol "Add new product" pada `products.list` mengarah ke route `products.create`
14. View `products.form` memiliki input `name`, `description`, `price`, dan tombol submit yang mengarah ke route `products.store`

## Daftar Route

| Method | URI                       | Name              | Action                              |
| ------ | ------------------------- | ----------------- | ----------------------------------- |
| GET    | `/products`               | `products`        | `ProductController@index`           |
| GET    | `/products/create`        | `products.create` | `ProductController@create`          |
| GET    | `/products/edit/{id}`     | `products.edit`   | `ProductController@edit`            |
| GET    | `/products/show/{id}`     | `products.show`   | `ProductController@show`            |
| POST   | `/products/store`         | `products.store`  | `ProductController@store`           |
| POST   | `/products/update/{id}`   | `products.update` | `ProductController@update`          |

## Struktur Folder Utama

```
.
├── app/
│   └── Http/
│       └── Controllers/
│           └── ProductController.php
├── resources/
│   └── views/
│       ├── components/
│       │   └── template.blade.php       # Blade component (layout)
│       └── products/
│           ├── list.blade.php           # Halaman daftar produk
│           ├── form.blade.php           # Form tambah/edit produk
│           └── show.blade.php           # Detail produk
└── routes/
    └── web.php                          # Definisi route
```

## Cara Menjalankan

### Prasyarat
- [Laravel Herd](https://herd.laravel.com/) (sudah otomatis menyediakan PHP 8.2+, Composer, dan NodeJS)
- Git

### Langkah-langkah

1. Clone repository ini:
   ```bash
   git clone https://github.com/USERNAME/NAMA-REPO.git
   cd NAMA-REPO
   ```

2. Install dependency PHP:
   ```bash
   composer install
   ```

3. Salin file environment dan generate application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Jalankan project:
   - **Dengan Herd**: pindahkan folder project ke direktori yang dikelola Herd (default `~/Herd`), lalu akses `http://nama-folder.test/products` di browser.
   - **Tanpa Herd**: jalankan `php artisan serve`, lalu buka `http://127.0.0.1:8000/products`.

## Pengujian Manual

| Halaman              | URL                              |
| -------------------- | -------------------------------- |
| Daftar produk        | `/products`                      |
| Form tambah produk   | `/products/create`               |
| Detail produk        | `/products/show/1`               |
| Form edit produk     | `/products/edit/1`               |

Route `store` dan `update` menggunakan method POST sehingga tidak bisa diakses langsung
dari address bar. Keduanya diuji melalui tombol submit form. Untuk memverifikasi seluruh
route terdaftar dengan benar:

```bash
php artisan route:list
```
