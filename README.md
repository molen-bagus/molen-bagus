<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Molen Bagus - Website Toko Molen

Website toko molen yang dibangun dengan Laravel 12, menampilkan produk-produk molen dengan fitur admin panel untuk manajemen produk.

## Fitur Utama

### 🏠 Website Publik
- Halaman home dengan showcase produk molen
- Responsive design dengan Tailwind CSS
- Galeri produk dengan gambar dan deskripsi

### 🔐 Sistem Autentikasi
- Login dan registrasi user
- Session management
- Password hashing dengan bcrypt
- CSRF protection

### 👨‍💼 Role-Based Access Control
- **Admin**: Akses penuh ke admin panel
- **User**: Hanya akses ke fitur publik
- Middleware protection untuk routes admin
- Conditional UI berdasarkan role

### ⚙️ Admin Panel (Khusus Admin)
- CRUD produk (Create, Read, Update, Delete)
- Upload dan manajemen gambar produk
- Status produk (aktif/tidak aktif)
- Responsive admin interface

## Dokumentasi

- [📖 Sistem Autentikasi](README_AUTH.md)
- [🛠️ Admin CRUD](README_ADMIN_CRUD.md)
- [🔒 Role-Based Access Control](README_ROLE_BASED_ACCESS.md)

## Akun Testing

### Admin Account
- **Email**: `admin@molenbagus.com`
- **Password**: `admin123`
- **Akses**: Admin panel + fitur publik

### User Account
- **Email**: `test@example.com`
- **Password**: `password`
- **Akses**: Hanya fitur publik

## Quick Start

1. Clone repository
2. Install dependencies: `composer install`
3. Copy environment: `cp .env.example .env`
4. Generate key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Seed database: `php artisan db:seed`
7. Create storage link: `php artisan storage:link`
8. Start server: `php artisan serve`

## Teknologi

- **Backend**: Laravel 12
- **Frontend**: Tailwind CSS, Font Awesome
- **Database**: SQLite
- **Authentication**: Laravel Auth
- **File Storage**: Laravel Storage

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
