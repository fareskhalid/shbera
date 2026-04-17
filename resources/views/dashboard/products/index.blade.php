@extends('layouts.dashboard')
@section('title', 'Products')

@section('content')
<div class="dash-header">
    <h1>Products</h1>
    <a href="{{ route('dashboard.products.create') }}" class="btn-primary">+ Add Product</a>
</div>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="dash-table-wrap">
    <table class="dash-table">
        <thead>
            <tr><th>#</th><th>Thumbnail</th><th>Name (AR)</th><th>Name (EN)</th><th>Active</th><th>Order</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td><img src="{{ $product->thumbnail_url }}" class="table-thumb"></td>
            <td>{{ $product->name_ar }}</td>
            <td>{{ $product->name_en }}</td>
            <td><span class="badge {{ $product->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $product->is_active ? 'Active' : 'Inactive' }}</span></td>
            <td>{{ $product->sort_order }}</td>
            <td class="action-btns">
                <a href="{{ route('dashboard.products.edit', $product) }}" class="btn-edit"><i class="bi bi-pencil"></i></a>
                <form action="{{ route('dashboard.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-delete"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination-wrap">{{ $products->links() }}</div>
</div>
@endsection