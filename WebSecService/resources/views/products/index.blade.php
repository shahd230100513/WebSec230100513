<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Products</h1>

        <a href="{{ route('products.create') }}" class="btn btn-success mb-4">Add Product</a>

        <form method="GET" action="{{ route('products.list') }}" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Search by name"
                        value="{{ request('name') }}">
                </div>
                <div class="col-md-4">
                    <select name="sort" class="form-control">
                        <option value="">Sort by Price</option>
                        <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Low to High</option>
                        <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>High to Low</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('products.list') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($product->photo)
                            <img src="{{ asset($product->photo) }}" class="card-img-top" alt="{{ $product->name }}">
                        @else
                            <img src="https://placehold.co/150x150" class="card-img-top" alt="No Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Price:</strong> Rp
                                {{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
