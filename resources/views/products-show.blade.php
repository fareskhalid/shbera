@extends('layouts.app')
@section('title', $product->name)

@section('content')
<div x-data="{ showModal: false }" class="w-full">
    <div class="page-hero">
        <h1>{{ $product->name }}</h1>
        <div class="breadcrumb">
            <a href="{{ route('home') }}">{{ __('site.home') }}</a>
            <span>/</span>
            <a href="{{ route('products') }}">{{ __('site.products') }}</a>
            <span>/</span>
            <span>{{ $product->name }}</span>
        </div>
    </div>

    <section class="product-detail-section">
        {{-- Flash Messages --}}
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 flex justify-between items-center" role="alert">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.style.display='none';" class="text-green-700 hover:text-green-900 font-bold text-xl">×</button>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 flex justify-between items-center" role="alert">
            <span>{{ session('error') }}</span>
            <button onclick="this.parentElement.style.display='none';" class="text-red-700 hover:text-red-900 font-bold text-xl">×</button>
        </div>
        @endif

        <div class="product-detail-container">
            <div class="product-detail-image">
                <img src="{{ $product->thumbnail_url }}" alt="{{ $product->name }}" class="product-detail-img">
            </div>

            <div class="product-detail-info">
                <h2>{{ $product->name }}</h2>
                <div class="product-description">
                    <p>{{ $product->description }}</p>
                </div>

                <div class="product-actions">
                    <button @click="showModal = true" type="button" class="inline-flex items-center gap-2 px-8 py-3 bg-yellow-600 text-white font-bold rounded hover:bg-yellow-500 transition-all duration-200 transform hover:-translate-y-1">
                        <i class="bi bi-cart-plus"></i>
                        {{ __('site.order_product') }}
                    </button>
                    <a href="{{ route('products') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-transparent border-2 border-yellow-600 text-yellow-600 font-bold rounded transition-all duration-200 transform hover:-translate-y-1">
                        <i class="bi bi-arrow-left"></i>
                        {{ __('site.back_to_products') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Order Modal -->
    <div x-show="showModal" @click="if($event.target === $el) showModal = false" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4" style="display: none;">
        <div @click.stop class="bg-white rounded-lg shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-900 to-blue-800 text-white px-6 py-4 flex justify-between items-center sticky top-0">
                <h3 class="text-xl font-bold">{{ __('site.order_form_title') }}: {{ $product->name }}</h3>
                <button @click="showModal = false" class="text-white hover:text-gray-200 text-3xl leading-none font-bold w-8 h-8 flex items-center justify-center">×</button>
            </div>

            <!-- Modal Body -->
            <form action="{{ route('products.order', $product->id) }}" method="POST" class="p-6">
                @csrf
                <div class="space-y-4">
                    <!-- Name Field -->
                    <div>
                        <label for="orderName" class="block text-sm font-semibold text-dark mb-2">{{ __('site.form_name') }}</label>
                        <input type="text" id="orderName" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-2 border-2 border-gray-300 rounded hover:border-yellow-600 focus:border-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-200 transition @error('name') border-red-500 bg-red-50 @enderror">
                        @error('name')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="orderEmail" class="block text-sm font-semibold text-dark mb-2">{{ __('site.form_email') }}</label>
                        <input type="email" id="orderEmail" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-2 border-2 border-gray-300 rounded hover:border-yellow-600 focus:border-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-200 transition @error('email') border-red-500 bg-red-50 @enderror">
                        @error('email')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Phone Field -->
                    <div>
                        <label for="orderPhone" class="block text-sm font-semibold text-dark mb-2">{{ __('site.form_phone') }}</label>
                        <input type="tel" id="orderPhone" name="phone" value="{{ old('phone') }}"
                               class="w-full px-4 py-2 border-2 border-gray-300 rounded hover:border-yellow-600 focus:border-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-200 transition @error('phone') border-red-500 bg-red-50 @enderror">
                        @error('phone')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Company Field -->
                    <div>
                        <label for="orderCompany" class="block text-sm font-semibold text-dark mb-2">{{ __('site.company_name') }}</label>
                        <input type="text" id="orderCompany" name="company" value="{{ old('company') }}"
                               class="w-full px-4 py-2 border-2 border-gray-300 rounded hover:border-yellow-600 focus:border-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-200 transition @error('company') border-red-500 bg-red-50 @enderror">
                        @error('company')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="orderMessage" class="block text-sm font-semibold text-dark mb-2">{{ __('site.special_requests') }}</label>
                        <textarea id="orderMessage" name="message" rows="3"
                                  class="w-full px-4 py-2 border-2 border-gray-300 rounded hover:border-yellow-600 focus:border-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-200 transition @error('message') border-red-500 bg-red-50 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-200">
                    <button type="button" @click="showModal = false"
                            class="px-6 py-2 bg-gray-200 text-dark font-semibold rounded hover:bg-gray-300 transition">
                        {{ __('site.cancel') }}
                    </button>
                    <button type="submit"
                            class="px-6 py-2 bg-yellow-600 text-dark font-bold rounded hover:bg-yellow-500 transition transform hover:-translate-y-0.5">
                        {{ __('site.submit_order') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
