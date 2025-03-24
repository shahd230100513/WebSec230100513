@extends('layouts.master')

@section('title', 'Supermarket Bill')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Supermarket Bill</h1>
        
        <!-- Bill Table -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Item Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price ($)</th>
                    <th scope="col">Subtotal ($)</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($bill['items']) && is_array($bill['items']) && count($bill['items']) > 0)
                    @foreach ($bill['items'] as $item)
                        <tr>
                            <td>{{ $item['name'] ?? 'N/A' }}</td>
                            <td>{{ $item['quantity'] ?? 0 }}</td>
                            <td>{{ number_format($item['price'] ?? 0, 2) }}</td>
                            <td>{{ number_format(($item['quantity'] ?? 0) * ($item['price'] ?? 0), 2) }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No items found in the bill.</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr class="table-success">
                    <td colspan="3" class="text-end fw-bold">Total</td>
                    <td class="fw-bold">{{ number_format($bill['total'] ?? 0, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection