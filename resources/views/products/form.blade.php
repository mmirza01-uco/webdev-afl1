<x-template title="Form Produk">
    <h1>{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</h1>

    {{-- Poin 14 — form dikirim ke route products.store dengan method POST --}}
    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ $product['name'] ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"
                      rows="4" required>{{ $product['description'] ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control"
                   value="{{ $product['price'] ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-template>