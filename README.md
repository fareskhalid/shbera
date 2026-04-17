# Shbera - Chemical & Petrochemical Export Platform

A modern, professional web application for showcasing and managing chemical and petrochemical products. Built with Laravel, Tailwind CSS, and Vite.

![Shbera Banner](public/images/logo.png)

---

## 📋 Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Database](#database)
- [Localization](#localization)
- [Contributing](#contributing)
- [License](#license)

---

## ✨ Features

### Public Pages

- **Home Page**: Hero section with featured products, statistics, and company overview
- **About Us**: Company mission, vision, and core values
- **Contact Us**: Contact form with business information and hours
- **Products Catalog**: Browse all available chemical and petrochemical products
- **Bilingual Support**: Full English and Arabic localization

### Admin Features

- **Dashboard**: Secure admin interface with authentication
- **Product Management**: Create, read, update, and delete products
- **Inventory Control**: Manage product status and sorting
- **User Authentication**: Built-in authentication with Laravel Breeze

### UI/UX

- **Responsive Design**: Mobile-first approach with Tailwind CSS
- **Modern Branding**: Navy, gold, and white color scheme
- **Bootstrap Icons**: Comprehensive icon library
- **Smooth Animations**: Professional transitions and effects

---

## 🛠 Tech Stack

### Backend

- **Laravel 10.x**: Modern PHP framework
- **PHP 8.1+**: Latest PHP version
- **Laravel Breeze**: Lightweight authentication scaffolding
- **MySQL/SQLite**: Database options

### Frontend

- **Tailwind CSS 3**: Utility-first CSS framework
- **Vite 5**: Fast build tool and dev server
- **Alpine.js 3**: Lightweight JavaScript framework
- **Bootstrap Icons**: Icon library

### DevTools

- **Laravel Pint**: Code style fixer
- **PHPUnit 10**: Testing framework
- **Laravel Tinker**: REPL for code interaction

---

## 📦 Requirements

- **PHP**: 8.1 or higher
- **Composer**: Latest version
- **Node.js**: 16 or higher
- **npm or yarn**: Package manager
- **Database**: MySQL 8.0+ or SQLite

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/shbera.git
cd shbera
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Create Environment File

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Create Database and Migrate

```bash
php artisan migrate
```

### 7. Seed the Database (Optional)

```bash
php artisan db:seed
```

### 8. Create Symbolic Link for Storage (Optional)

```bash
php artisan storage:link
```

---

## ⚙️ Configuration

### Environment Variables

Key variables in `.env`:

```env
APP_NAME=Shbera
APP_ENV=production
APP_DEBUG=false
APP_URL=https://shbera.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shbera
DB_USERNAME=root
DB_PASSWORD=

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
```

### Localization Setup

The application supports English and Arabic. Language files are located in:

- `lang/en/` - English translations
- `lang/ar/` - Arabic translations

Switch locale via the language toggle in the navigation bar.

---

## 📖 Usage

### Development Server

Start the development server:

```bash
php artisan serve
```

In another terminal, start the Vite dev server:

```bash
npm run dev
```

Visit `http://localhost:8000`

### Production Build

Build assets for production:

```bash
npm run build
```

### Dashboard Access

1. Navigate to `/login`
2. Register a new account or use demo credentials
3. Access the admin dashboard at `/dashboard`

---

## 📁 Project Structure

```text
shbera/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── PageController.php       # Public page controllers
│   │   │   └── Dashboard/
│   │   │       └── ProductController.php # Admin product management
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   │   ├── User.php
│   │   └── Product.php
│   ├── Providers/
│   └── View/
│       └── Components/
├── resources/
│   ├── views/
│   │   ├── home.blade.php              # Home page
│   │   ├── about-us.blade.php          # About page
│   │   ├── contact-us.blade.php        # Contact page
│   │   ├── products.blade.php          # Products listing
│   │   ├── layouts/
│   │   │   ├── app.blade.php           # Main layout
│   │   │   ├── guest.blade.php         # Auth layout
│   │   │   └── dashboard.blade.php     # Admin layout
│   │   ├── auth/                       # Authentication views
│   │   ├── dashboard/                  # Admin views
│   │   └── components/                 # Reusable components
│   ├── css/
│   │   └── app.css                     # Main stylesheet (Tailwind)
│   └── js/
│       ├── app.js
│       └── bootstrap.js
├── routes/
│   ├── web.php                         # Web routes
│   ├── api.php                         # API routes
│   ├── auth.php                        # Authentication routes
│   └── console.php                     # Console commands
├── database/
│   ├── migrations/                     # Database migrations
│   ├── seeders/                        # Database seeders
│   └── factories/                      # Model factories
├── lang/
│   ├── en/                             # English translations
│   └── ar/                             # Arabic translations
├── public/
│   ├── images/                         # Static images
│   ├── build/                          # Compiled assets (generated)
│   └── index.php
├── storage/                            # Logs, cache, sessions
├── config/                             # Configuration files
├── bootstrap/                          # Bootstrap files
├── tests/                              # Test files
└── vendor/                             # Composer packages (ignored)
```

---

## 🗄 Database

### Models

#### Product

- `id` - Primary key
- `name` - Product name
- `description` - Product description
- `thumbnail_url` - Product image URL
- `is_active` - Publishing status
- `sort_order` - Display order
- `created_at`, `updated_at` - Timestamps

#### User

- `id` - Primary key
- `name` - User name
- `email` - Email address (unique)
- `password` - Hashed password
- `email_verified_at` - Verification timestamp
- `created_at`, `updated_at` - Timestamps

### Migrations

Run migrations:

```bash
php artisan migrate
```

Refresh database (warning: deletes data):

```bash
php artisan migrate:refresh
```

---

## 🌍 Localization

### Supported Languages

- **English** (en)
- **Arabic** (ar)

### Adding Translations

1. Add keys to `lang/en/site.php` and `lang/ar/site.php`
2. Use in views: `{{ __('site.key') }}`
3. The app automatically detects locale from user session

### Example

```php
// lang/en/site.php
'welcome' => 'Welcome to Shbera',

// In Blade template
<h1>{{ __('site.welcome') }}</h1>
```

---

## 🎨 Styling

### Color Scheme

- **Primary Navy**: `#0a1628`
- **Navy 2**: `#0f2040`
- **Navy 3**: `#162b52`
- **Accent Gold**: `#c9a84c`
- **Light Gray**: `#f4f6f9`

### Fonts

- **Arabic**: Cairo (Sans-serif)
- **English**: Inter (Sans-serif)

Both fonts are loaded from Google Fonts in the main layout.

---

## 🧪 Testing

Run PHPUnit tests:

```bash
php artisan test
```

Run specific test:

```bash
php artisan test tests/Feature/ExampleTest.php
```

---

## 📝 Code Style

This project uses Laravel Pint for code formatting.

Format code:

```bash
./vendor/bin/pint
```

Check without formatting:

```bash
./vendor/bin/pint --test
```

---

## 🔐 Security

- All routes include CSRF protection
- Password hashing with bcrypt
- Input validation on all forms
- Authentication middleware on protected routes
- Environment variables for sensitive data

---

## 🚢 Deployment

### Hosting Requirements

- PHP 8.1+ with extensions: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON
- MySQL 8.0+ or compatible database
- Composer installed on server
- Node.js for building assets

### Pre-deployment Checklist

```bash
# 1. Build production assets
npm run build

# 2. Install production dependencies
composer install --optimize-autoloader --no-dev

# 3. Generate optimized configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 4. Run migrations on production database
php artisan migrate --force

# 5. Set correct permissions
chmod -R 755 storage bootstrap/cache
chmod -R 777 storage bootstrap/cache

# 6. Set .env to production mode
APP_ENV=production
APP_DEBUG=false
```
