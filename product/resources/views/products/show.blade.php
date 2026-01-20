@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Product Details</h2>

    <table class="table table-bordered">
        <tr>
            <th width="200">Name</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $product->category->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ number_format($product->price, 2) }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $product->description }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $product->created_at }}</td>
        </tr>
    </table>

    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
        Edit
    </a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">
        Back
    </a>
</div>
@endsection
