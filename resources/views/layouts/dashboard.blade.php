<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — Shbera Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="dash-body">
    <aside class="dash-sidebar">
        <div class="sidebar-logo">⬡ Shbera</div>
        <nav class="sidebar-nav">
            <a href="{{ route('dashboard.products.index') }}" class="{{ request()->routeIs('dashboard.products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i> Products
            </a>
            <a href="{{ route('home') }}" target="_blank"><i class="bi bi-globe"></i> View Site</a>
        </nav>
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"><i class="bi bi-box-arrow-left"></i> Logout</button>
            </form>
        </div>
    </aside>
    <main class="dash-main">
        @yield('content')
    </main>
</body>
</html>