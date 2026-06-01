@extends('layouts.app')
@section('title', __('site.products'))

@section('content')
<div class="page-hero">
    <h1>{{ __('site.products') }}</h1>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">{{ __('site.home') }}</a>
        <span>/</span>
        <span>{{ __('site.products') }}</span>
    </div>
</div>

<section class="products-page-section">
    <div class="products-grid large">
        @forelse($products as $product)
        <div class="product-card">
            <a href="{{ route('products.show', $product->id) }}" class="product-link">
                <div class="product-img">
                    <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}">
                    <div class="product-overlay"></div>
                </div>
                <div class="product-info">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ Str::limit($product->description, 150) }}@if(Str::length($product->description) > 150)...@endif</p>
                </div>
            </a>
            <div class="p-4 border-t border-gray-200 flex justify-center">
                <a href="{{ route('products.show', $product->id) }}" class="inline-flex items-center gap-2 px-6 py-2 bg-yellow-600 text-white font-semibold rounded hover:bg-yellow-500 transition-all duration-200">
                    <i class="fas fa-eye"></i>
                    {{ __('site.view_product') }}
                </a>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-box"></i>
            <p>{{ __('site.no_products_available') }}</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination Links --}}
    <div class="pagination-container">
        {{ $products->links() }}
    </div>
</section>
@endsection
