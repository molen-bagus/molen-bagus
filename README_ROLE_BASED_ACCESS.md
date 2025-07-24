# Role-Based Access Control (RBAC) - Molen Bagus

## Overview
Sistem Role-Based Access Control telah diimplementasikan untuk memastikan bahwa hanya admin yang dapat mengakses admin panel, sementara user biasa tidak memiliki akses ke fitur administratif.

## Fitur Utama

### 1. Role System
- **Admin**: Memiliki akses penuh ke admin panel dan semua fitur administratif
- **User**: Hanya dapat mengakses fitur publik website, tidak dapat mengakses admin panel

### 2. Middleware Protection
- Admin routes dilindungi oleh middleware `AdminMiddleware`
- Middleware memeriksa apakah user sudah login dan memiliki role 'admin'
- Jika bukan admin, user akan diredirect ke home dengan pesan error

### 3. UI/UX Conditional Display
- Menu "Admin Panel" hanya muncul untuk user dengan role admin
- User biasa tidak akan melihat menu admin panel di navigation

## Implementasi Teknis

### Database Schema
```sql
-- Kolom role ditambahkan ke tabel users
ALTER TABLE users ADD COLUMN role ENUM('admin', 'user') DEFAULT 'user';
```

### Model User
```php
// Method untuk mengecek role
public function isAdmin(): bool
{
    return $this->role === 'admin';
}

public function isUser(): bool
{
    return $this->role === 'user';
}
```

### Middleware AdminMiddleware
```php
// Proteksi routes admin
if (!Auth::user()->isAdmin()) {
    return redirect()->route('home')->with('error', 'Akses ditolak.');
}
```

### Routes Protection
```php
// Admin routes dengan middleware protection
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', AdminProductController::class);
});
```

### Conditional Navigation
```blade
@if(Auth::user()->isAdmin())
    <a href="{{ route('admin.products.index') }}">Admin Panel</a>
@endif
```

## Akun Testing

### Admin Account
- **Email**: `admin@molenbagus.com`
- **Password**: `admin123`
- **Role**: `admin`
- **Akses**: Dapat mengakses admin panel dan semua fitur

### User Account
- **Email**: `test@example.com`
- **Password**: `password`
- **Role**: `user`
- **Akses**: Hanya dapat mengakses fitur publik

## Cara Testing

### Test Admin Access
1. Login dengan akun admin (`admin@molenbagus.com` / `admin123`)
2. Cek bahwa menu "Admin Panel" muncul di navigation
3. Klik menu "Admin Panel" - harus berhasil masuk ke `/admin/products`
4. Coba akses langsung ke `/admin/products` - harus berhasil

### Test User Access
1. Login dengan akun user (`test@example.com` / `password`)
2. Cek bahwa menu "Admin Panel" TIDAK muncul di navigation
3. Coba akses langsung ke `/admin/products` - harus diredirect ke home dengan error message

### Test Unauthorized Access
1. Logout dari semua akun
2. Coba akses langsung ke `/admin/products` - harus diredirect ke login

## File yang Dimodifikasi

### Migration
- `database/migrations/2025_07_22_235259_add_role_to_users_table.php`

### Models
- `app/Models/User.php` - Tambah role functionality

### Middleware
- `app/Http/Middleware/AdminMiddleware.php` - Middleware baru
- `bootstrap/app.php` - Register middleware

### Routes
- `routes/web.php` - Tambah middleware admin ke routes

### Views
- `resources/views/layouts/app.blade.php` - Conditional admin menu

### Seeders
- `database/seeders/DatabaseSeeder.php` - Tambah admin dan user accounts

## Keamanan

### Proteksi Berlapis
1. **Middleware Level**: Routes admin dilindungi middleware
2. **UI Level**: Menu admin disembunyikan dari user biasa
3. **Database Level**: Role disimpan di database dengan enum constraint

### Error Handling
- User yang tidak authorized mendapat pesan error yang jelas
- Redirect ke halaman yang sesuai (home untuk user, login untuk guest)

## Troubleshooting

### Admin Panel Tidak Muncul
1. Pastikan user sudah login
2. Cek role user di database: `SELECT role FROM users WHERE email = 'your-email'`
3. Pastikan role adalah 'admin'

### Error 403 Forbidden
1. Cek apakah middleware terdaftar di `bootstrap/app.php`
2. Cek apakah routes menggunakan middleware 'admin'
3. Clear cache: `php artisan route:clear`

### User Tidak Bisa Login
1. Cek password di database (harus di-hash)
2. Cek apakah email benar
3. Cek log Laravel untuk error detail

## Pengembangan Selanjutnya

### Role Tambahan
Sistem ini dapat diperluas dengan role tambahan seperti:
- `moderator`: Akses terbatas ke admin panel
- `editor`: Hanya dapat mengedit konten
- `viewer`: Hanya dapat melihat data admin

### Permission System
Implementasi permission granular untuk kontrol akses yang lebih detail per fitur.

### Audit Log
Tambah logging untuk aktivitas admin untuk tracking dan security.
