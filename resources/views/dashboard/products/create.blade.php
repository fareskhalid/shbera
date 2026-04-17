@extends('layouts.dashboard')
@section('title', isset($product) ? 'Edit Product' : 'Add Product')

@section('content')
<div class="dash-header">
    <h1>{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h1>
    <a href="{{ route('dashboard.products.index') }}" class="btn-outline">← Back</a>
</div>

<form action="{{ isset($product) ? route('dashboard.products.update', $product) : route('dashboard.products.store') }}"
      method="POST" enctype="multipart/form-data" class="product-form">
    @csrf
    @if(isset($product)) @method('PUT') @endif

    <div class="form-grid">
        <div class="form-group">
            <label>Product Name (Arabic) *</label>
            <input type="text" name="name_ar" value="{{ old('name_ar', $product->name_ar ?? '') }}" required>
            @error('name_ar')<span class="err">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label>Product Name (English) *</label>
            <input type="text" name="name_en" value="{{ old('name_en', $product->name_en ?? '') }}" required>
            @error('name_en')<span class="err">{{ $message }}</span>@enderror
        </div>
        <div class="form-group full">
            <label>Description (Arabic) *</label>
            <textarea name="description_ar" rows="4" required>{{ old('description_ar', $product->description_ar ?? '') }}</textarea>
        </div>
        <div class="form-group full">
            <label>Description (English) *</label>
            <textarea name="description_en" rows="4" required>{{ old('description_en', $product->description_en ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label>Thumbnail Image</label>
            @if(isset($product) && $product->thumbnail)
                <img src="{{ $product->thumbnail_url }}" class="current-thumb">
            @endif
            <input type="file" name="thumbnail" accept="image/*">
        </div>
        <div class="form-group">
            <label>Sort Order</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $product->sort_order ?? 0) }}" min="0">
        </div>
        <div class="form-group">
            <label class="checkbox-label">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                Active (visible on site)
            </label>
        </div>
    </div>

    <button type="submit" class="btn-primary">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
</form>
@endsection