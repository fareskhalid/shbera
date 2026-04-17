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
            <div class="product-img">
                <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}">
                <div class="product-overlay"></div>
            </div>
            <div class="product-info">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="bi bi-box-seam"></i>
            <p>{{ app()->getLocale() === 'ar' ? 'لا توجد منتجات حتى الآن' : 'No products yet.' }}</p>
        </div>
        @endforelse
    </div>
</section>
@endsection