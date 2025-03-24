@extends('layouts.master')

@section('title')
    Product List
@endsection

@section('content')
    <div class="card mt-2">
        <div class="card-body">
            <div class="col col-12 col-lg-8 mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Model</th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $seenCodes = [];
                        @endphp
                        @foreach($products as $product)
                            @if(!in_array($product->code, $seenCodes))
                                @php
                                    $seenCodes[] = $product->code;
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/' . $product->photo) }}" alt="{{ $product->name }}" width="50" height="50" style="object-fit: cover;">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->model }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary add-to-cart-btn" data-product="{{ json_encode($product) }}">Add to Cart</button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        @if(empty($seenCodes))
                            <tr>
                                <td colspan="6">No products available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const product = JSON.parse(this.getAttribute('data-product'));
                    alert(`Added ${product.name} to cart!`);
                });
            });
        });
    </script>
@endsection