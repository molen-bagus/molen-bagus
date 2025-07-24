# Sistem Authentication Molen Bagus

## Fitur yang Telah Ditambahkan

### 1. **Registrasi Pengguna**
- **URL**: `/register`
- **Fitur**:
  - Form registrasi dengan validasi lengkap
  - Validasi nama, email, dan password
  - Konfirmasi password
  - Email harus unik
  - Password minimal 6 karakter
  - Desain responsif sesuai tema website

### 2. **Login Pengguna**
- **URL**: `/login`
- **Fitur**:
  - Form login dengan email dan password
  - Opsi "Remember Me"
  - Toggle show/hide password
  - Validasi input
  - Redirect ke halaman yang dimaksud setelah login
  - Desain responsif sesuai tema website

### 3. **Logout Pengguna**
- **Fitur**:
  - Logout melalui dropdown menu di navigation
  - Session invalidation
  - Redirect ke halaman utama

### 4. **Navigation Bar**
- **Untuk Guest (Belum Login)**:
  - Tombol "Login" dan "Daftar" di navigation
  - Tersedia di desktop dan mobile view

- **Untuk User yang Sudah Login**:
  - Dropdown menu dengan nama user
  - Menampilkan email user
  - Tombol logout
  - Tersedia di desktop dan mobile view

### 5. **Database**
- Menggunakan tabel `users` yang sudah ada
- Fields: id, name, email, password, remember_token, timestamps
- Database SQLite sudah dikonfigurasi

## Cara Penggunaan

### Testing dengan User yang Sudah Ada
- **Email**: `test@molenbagus.com`
- **Password**: `password123`

### Alur Penggunaan
1. **Registrasi**: 
   - Kunjungi `/register`
   - Isi form registrasi
   - Setelah berhasil, akan diarahkan ke halaman login

2. **Login**:
   - Kunjungi `/login` atau klik tombol "Login" di navigation
   - Masukkan email dan password
   - Setelah berhasil login, akan diarahkan ke halaman utama
   - Navigation akan menampilkan nama user dan dropdown menu

3. **Logout**:
   - Klik nama user di navigation
   - Pilih "Logout" dari dropdown menu
   - Akan diarahkan kembali ke halaman utama

## File yang Dibuat/Dimodifikasi

### Controller
- `app/Http/Controllers/AuthController.php` - Handle authentication logic

### Views
- `resources/views/auth/login.blade.php` - Halaman login
- `resources/views/auth/register.blade.php` - Halaman registrasi
- `resources/views/layouts/app.blade.php` - Updated navigation dan flash messages

### Routes
- `routes/web.php` - Added authentication routes

## Fitur Keamanan
- Password di-hash menggunakan bcrypt
- CSRF protection pada semua form
- Session regeneration setelah login
- Guest middleware untuk halaman login/register
- Auth middleware untuk logout

## Notifikasi
- Flash messages untuk success/error
- Toast notifications yang muncul otomatis
- Validasi real-time pada form

## Responsive Design
- Semua halaman authentication responsive
- Mobile-friendly navigation
- Konsisten dengan desain website Molen Bagus

## Server Development
Untuk menjalankan server development:
```bash
php artisan serve
```
Website akan tersedia di: http://127.0.0.1:8000
