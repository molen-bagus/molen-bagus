# Deployment ke Server Production

## Status Saat Ini
- ✅ Kode sudah di-push ke GitHub
- ❌ Migration role belum dijalankan di server production
- ❌ User admin belum dibuat di server production

## Langkah Deployment

### 1. Akses Server Production
Login ke CPanel atau SSH server production `molen-bagus.zaraas.my.id`

### 2. Jalankan Migration
```bash
# Masuk ke folder aplikasi
cd /public_html

# Jalankan migration untuk menambah kolom role
php artisan migrate

# Atau jika ada masalah permission:
php -d memory_limit=512M artisan migrate
```

### 3. Update Database Production
Jalankan seeder atau manual query untuk membuat user admin:

#### Option A: Via Artisan Seeder
```bash
php artisan db:seed --class=DatabaseSeeder
```

#### Option B: Manual SQL Query
Jika seeder tidak bisa dijalankan, eksekusi SQL ini di phpMyAdmin:

```sql
-- Tambah kolom role jika belum ada
ALTER TABLE users ADD COLUMN role ENUM('admin', 'user') DEFAULT 'user' AFTER email;

-- Update user existing menjadi admin (ganti email sesuai kebutuhan)
UPDATE users SET role = 'admin' WHERE email = 'admin@molenbagus.com';

-- Atau buat user admin baru
INSERT INTO users (name, email, password, role, created_at, updated_at) 
VALUES (
    'Admin', 
    'admin@molenbagus.com', 
    '$2y$12$Xtjee5ID6NaP7wOZt7PW4e/LIm9kKnzT3EjyjuD0WkrctzWQcc9O6', -- password: admin123
    'admin', 
    NOW(), 
    NOW()
);
```

### 4. Clear Cache di Server
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear
```

### 5. Set Permission (jika diperlukan)
```bash
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/
```

## Konfigurasi Database Production

Pastikan file `.env` di server production menggunakan MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=195.88.211.226
DB_PORT=3306
DB_DATABASE=zaraasmy_molen
DB_USERNAME=zaraasmy_admin
DB_PASSWORD=Bebek12345!
```

## Testing Setelah Deployment

1. **Akses website:** https://molen-bagus.zaraas.my.id/
2. **Login dengan admin:**
   - Email: `admin@molenbagus.com`
   - Password: `admin123`
3. **Cek menu Admin Panel** harus muncul
4. **Test akses:** https://molen-bagus.zaraas.my.id/admin/products

## Troubleshooting

### Jika Migration Gagal
```bash
# Cek status migration
php artisan migrate:status

# Rollback jika perlu
php artisan migrate:rollback

# Jalankan ulang
php artisan migrate
```

### Jika Admin Panel Tidak Muncul
1. Cek apakah kolom `role` sudah ada di tabel `users`
2. Cek apakah user memiliki role `admin`
3. Clear semua cache
4. Cek log error di `storage/logs/laravel.log`

### Jika Error 500
1. Cek file permission
2. Cek log error
3. Pastikan semua dependency ter-install
4. Jalankan `composer install --no-dev --optimize-autoloader`

## Akun Testing Production

### Admin Account
- **Email**: `admin@molenbagus.com`
- **Password**: `admin123`
- **Role**: `admin`

### User Account (jika ada)
- **Email**: `test@example.com`
- **Password**: `password`
- **Role**: `user`
