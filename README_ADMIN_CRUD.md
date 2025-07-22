# Admin CRUD System - Molen Bagus

## Overview
Sistem CRUD (Create, Read, Update, Delete) untuk mengelola produk di halaman admin Molen Bagus. Sistem ini memungkinkan admin untuk mengelola semua produk yang ditampilkan di website.

## Fitur Utama

### 1. **Dashboard Admin**
- Layout khusus admin dengan sidebar navigasi
- Header dengan informasi user yang login
- Flash messages untuk feedback operasi

### 2. **Kelola Produk**
- **Lihat Semua Produk**: Tabel dengan pagination, search, dan filter
- **Tambah Produk**: Form lengkap dengan upload gambar
- **Edit Produk**: Form edit dengan data yang sudah ada
- **Detail Produk**: Halaman detail lengkap produk
- **Hapus Produk**: Konfirmasi sebelum menghapus

### 3. **Fitur Search & Filter**
- Search berdasarkan nama dan deskripsi produk
- Filter berdasarkan kategori (molen, soes, onde-onde, pastel)
- Filter berdasarkan status (aktif/tidak aktif)
- Reset filter untuk kembali ke tampilan semua produk

### 4. **Upload Gambar**
- Validasi file gambar (JPEG, PNG, JPG, GIF)
- Maksimal ukuran file 2MB
- Preview gambar sebelum upload
- Otomatis menghapus gambar lama saat update
- Penyimpanan di storage/app/public/images

## Akses Admin Panel

### URL Admin
- **Dashboard**: `/admin/products`
- **Tambah Produk**: `/admin/products/create`
- **Edit Produk**: `/admin/products/{id}/edit`
- **Detail Produk**: `/admin/products/{id}`

### Cara Akses
1. Login ke website dengan akun yang sudah terdaftar
2. Klik dropdown nama user di navigation bar
3. Pilih "Admin Panel"
4. Atau akses langsung ke `/admin/products`

## Akun Testing

### Admin Account
- **Email**: `admin@molenbagus.com`
- **Password**: `admin123`

### User Account (dari seeder)
- **Email**: `test@example.com`
- **Password**: `password`

## File Structure

### Controllers
- `app/Http/Controllers/AdminProductController.php` - Handle semua operasi CRUD

### Views
- `resources/views/admin/layouts/app.blade.php` - Layout khusus admin
- `resources/views/admin/products/index.blade.php` - Daftar produk
- `resources/views/admin/products/create.blade.php` - Form tambah produk
- `resources/views/admin/products/edit.blade.php` - Form edit produk
- `resources/views/admin/products/show.blade.php` - Detail produk

### Routes
- `routes/web.php` - Routes admin dengan prefix `/admin` dan middleware `auth`

## Validasi Form

### Tambah/Edit Produk
- **Nama Produk**: Required, maksimal 255 karakter
- **Harga**: Required, numeric, minimal 0
- **Kategori**: Required, string
- **Gambar**: Required saat tambah, optional saat edit, format image, maksimal 2MB
- **Deskripsi**: Optional, text
- **Status**: Boolean (aktif/tidak aktif)

## Fitur Keamanan
- Middleware `auth` untuk semua routes admin
- CSRF protection pada semua form
- Validasi file upload untuk keamanan
- Sanitasi input data

## Storage Configuration
- Symbolic link sudah dibuat: `public/storage -> storage/app/public`
- Gambar disimpan di `storage/app/public/images/`
- Akses gambar melalui `storage/images/filename`

## Cara Penggunaan

### 1. Menambah Produk Baru
1. Login ke admin panel
2. Klik "Tambah Produk"
3. Isi semua field yang required
4. Upload gambar produk
5. Klik "Simpan Produk"

### 2. Mengedit Produk
1. Di halaman daftar produk, klik icon edit (pensil)
2. Ubah data yang diperlukan
3. Upload gambar baru jika diperlukan (optional)
4. Klik "Update Produk"

### 3. Menghapus Produk
1. Di halaman daftar produk, klik icon hapus (trash)
2. Konfirmasi penghapusan
3. Produk dan gambarnya akan dihapus permanent

### 4. Mencari & Filter Produk
1. Gunakan search box untuk mencari berdasarkan nama/deskripsi
2. Pilih kategori dari dropdown filter
3. Pilih status aktif/tidak aktif
4. Klik "Filter" atau "Reset"

## Responsive Design
- Layout admin responsive untuk desktop dan mobile
- Tabel produk dengan horizontal scroll pada mobile
- Form yang user-friendly di semua device

## Status Produk
- **Aktif**: Produk ditampilkan di website publik
- **Tidak Aktif**: Produk tersembunyi dari website publik

## Teknologi yang Digunakan
- **Backend**: Laravel 12
- **Frontend**: Tailwind CSS, Font Awesome
- **Database**: SQLite (default Laravel)
- **File Storage**: Laravel Storage dengan symbolic link

## Troubleshooting

### Gambar Tidak Muncul
1. Pastikan symbolic link sudah dibuat: `php artisan storage:link`
2. Cek permission folder storage
3. Pastikan file gambar ada di `storage/app/public/images/`

### Error 404 Admin Panel
1. Pastikan sudah login
2. Cek routes di `routes/web.php`
3. Clear cache: `php artisan route:clear`

### Upload Gambar Gagal
1. Cek ukuran file (maksimal 2MB)
2. Cek format file (JPEG, PNG, JPG, GIF)
3. Cek permission folder storage
