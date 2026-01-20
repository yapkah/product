@extends('layouts.app')
@section('title','Products')
@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}">Create New Product</a>

<form method="GET" action="{{ route('products.index') }}">
    <select name="category_id">
        <option value="">All Categories</option>
        @foreach($categories as $c)
        <option value="{{ $c->id }}" {{ request('category_id')==$c->id?'selected':'' }}>{{ $c->name }}</option>
        @endforeach
    </select>
    <button type="submit">Filter</button>
</form>

<form method="POST" action="{{ route('products.bulk-delete') }}">
    @csrf
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td><input type="checkbox" name="ids[]" value="{{ $p->id }}"></td>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category->name }}</td>
                <td>{{ $p->price }}</td>
                <td>
                    <a href="{{ route('products.edit',$p) }}">Edit</a> |
                    <form method="POST" action="{{ route('products.destroy',$p) }}" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" onclick="return confirm('Delete selected?')">Bulk Delete</button>
</form>

{{ $products->appends(['category_id' => request('category_id')])->links() }}

<a href="{{ route('products.export') }}">Export to Excel</a>
@endsection
