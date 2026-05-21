<x-template title="Daftar Produk">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Produk</h1>

        {{-- Poin 13 — tombol "Add new product" menuju route products.create --}}
        <a href="{{ route('products.create') }}" class="btn btn-success">
            Add new product
        </a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Poin 12 — menampilkan 20 produk memakai Blade directive @foreach --}}
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>Rp {{ number_format($product['price'], 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('products.show', $product['id']) }}"
                           class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('products.edit', $product['id']) }}"
                           class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-template>