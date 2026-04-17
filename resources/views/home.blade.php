@extends('layouts.app')
@section('title', __('site.home'))

@section('content')
{{-- HERO --}}
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-badge">{{ __('site.tagline') }}</div>
        <h1>{{ __('site.hero_title') }}</h1>
        <p>{{ __('site.hero_sub') }}</p>
        <div class="hero-actions">
            <a href="{{ route('products') }}" class="btn-primary">{{ __('site.explore') }}</a>
            <a href="{{ route('about') }}" class="btn-outline">{{ __('site.about') }}</a>
        </div>
    </div>
    <div class="hero-scroll"><i class="bi bi-chevron-double-down"></i></div>
</section>

{{-- STATS STRIP --}}
<section class="stats-strip">
    <div class="stat-item"><span class="stat-num">30+</span><span class="stat-label">{{ app()->getLocale() === 'ar' ? 'دولة مُصدِّر إليها' : 'Export Countries' }}</span></div>
    <div class="stat-item"><span class="stat-num">15+</span><span class="stat-label">{{ app()->getLocale() === 'ar' ? 'سنة خبرة' : 'Years Experience' }}</span></div>
    <div class="stat-item"><span class="stat-num">500+</span><span class="stat-label">{{ app()->getLocale() === 'ar' ? 'عميل راضٍ' : 'Satisfied Clients' }}</span></div>
    <div class="stat-item"><span class="stat-num">50+</span><span class="stat-label">{{ app()->getLocale() === 'ar' ? 'منتج متاح' : 'Products Available' }}</span></div>
</section>

{{-- FEATURED PRODUCTS --}}
@if($featuredProducts->count())
<section class="section-products">
    <div class="section-header">
        <span class="section-tag">{{ __('site.products') }}</span>
        <h2>{{ app()->getLocale() === 'ar' ? 'منتجاتنا المميزة' : 'Featured Products' }}</h2>
    </div>
    <div class="products-grid">
        @foreach($featuredProducts as $product)
        <div class="product-card">
            <div class="product-img">
                <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}">
                <div class="product-overlay"></div>
            </div>
            <div class="product-info">
                <h3>{{ $product->name }}</h3>
                <p>{{ Str::limit($product->description, 100) }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="section-cta">
        <a href="{{ route('products') }}" class="btn-primary">{{ __('site.all_products') }} →</a>
    </div>
</section>
@endif

{{-- ABOUT --}}
<section class="about-section" id="about">
    <div class="about-grid">
        <div class="about-visual">
            <div class="about-hex-grid">
                <div class="hex h1"></div><div class="hex h2"></div><div class="hex h3"></div>
            </div>
        </div>
        <div class="about-content">
            <span class="section-tag">{{ __('site.about') }}</span>
            <h2>{{ __('site.company') }}</h2>
            <p>{{ __('site.about_text') }}</p>
            <div class="features-list">
                <div class="feature"><i class="bi bi-award"></i><div><h4>{{ __('site.quality') }}</h4><p>{{ __('site.quality_desc') }}</p></div></div>
                <div class="feature"><i class="bi bi-globe2"></i><div><h4>{{ __('site.global') }}</h4><p>{{ __('site.global_desc') }}</p></div></div>
                <div class="feature"><i class="bi bi-shield-check"></i><div><h4>{{ __('site.reliable') }}</h4><p>{{ __('site.reliable_desc') }}</p></div></div>
            </div>
        </div>
    </div>
</section>
@endsection