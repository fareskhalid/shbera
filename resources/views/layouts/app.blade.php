<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('site.company')) | {{ __('site.tagline') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="shbera-body">

    {{-- NAVBAR --}}
    <nav class="shbera-nav">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="nav-logo">
                <img src="/images/logo.png" alt="{{ __('site.company') }}" class="logo-image" style="height: 40px; width: auto;">
                <span class="logo-text">{{ __('site.company') }}</span>
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('site.home') }}</a></li>
                <li><a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'active' : '' }}">{{ __('site.products') }}</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ __('site.about') }}</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('site.contact') }}</a></li>
                @auth
                <li><a href="{{ route('dashboard.products.index') }}"><i class="bi bi-grid"></i> {{ __('site.dashboard') }}</a></li>
                @endauth
            </ul>
            <div class="nav-actions">
                <a href="{{ route('locale', app()->getLocale() === 'ar' ? 'en' : 'ar') }}" class="lang-toggle">
                    {{ app()->getLocale() === 'ar' ? 'EN' : 'العربية' }}
                </a>
                <button class="mobile-menu-btn" id="mobileMenuBtn"><i class="bi bi-list"></i></button>
            </div>
        </div>
        <div class="mobile-menu" id="mobileMenu">
            <a href="{{ route('home') }}">{{ __('site.home') }}</a>
            <a href="{{ route('products') }}">{{ __('site.products') }}</a>
            <a href="{{ route('about') }}">{{ __('site.about') }}</a>
            <a href="{{ route('contact') }}">{{ __('site.contact') }}</a>
            @auth <a href="{{ route('dashboard.products.index') }}">{{ __('site.dashboard') }}</a> @endauth
            <a href="{{ route('locale', app()->getLocale() === 'ar' ? 'en' : 'ar') }}">{{ app()->getLocale() === 'ar' ? 'EN' : 'العربية' }}</a>
        </div>
    </nav>

    @yield('content')

    {{-- FOOTER --}}
    <footer class="shbera-footer">
        <div class="footer-container">
            <div class="footer-brand">
                <img src="/images/logo.png" alt="{{ __('site.company') }}" style="height: 50px; width: auto; margin-bottom: 0.5rem;">
                <span class="logo-text">{{ __('site.company') }}</span>
                <p>{{ __('site.tagline') }}</p>
            </div>
            <div class="footer-links">
                <h4>{{ __('site.quick_links') }}</h4>
                <a href="{{ route('home') }}">{{ __('site.home') }}</a>
                <a href="{{ route('about') }}">{{ __('site.about') }}</a>
                <a href="{{ route('products') }}">{{ __('site.products') }}</a>
            </div>
            <div class="footer-contact">
                <h4>{{ __('site.contact') }}</h4>
                <p><i class="bi bi-envelope"></i> <a href="mailto:info@shbera.com" style="color: rgba(255,255,255,.6); text-decoration: none;">info@shbera.com</a></p>
                <p><i class="bi bi-telephone"></i> +201152525064</p>
                <p><i class="bi bi-geo-alt"></i> El Tagamoa El Awwal, New Cairo, Egypt</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© {{ date('Y') }} {{ __('site.company') }}. {{ __('site.all_rights_reserved') }}.</p>
        </div>
    </footer>

    <script>
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('open');
        });
    </script>
    @stack('scripts')
</body>
</html>