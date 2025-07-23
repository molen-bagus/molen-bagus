-- =====================================================
-- PRODUCTION SETUP SQL untuk molen-bagus.zaraas.my.id
-- =====================================================

-- 1. Tambah kolom role ke tabel users (jika belum ada)
-- Cek dulu apakah kolom sudah ada, jika belum jalankan query ini:
ALTER TABLE users ADD COLUMN role ENUM('admin', 'user') DEFAULT 'user' AFTER email;

-- 2. Buat atau update user admin
-- Hapus user admin lama jika ada
DELETE FROM users WHERE email = 'admin@molenbagus.com';

-- Buat user admin baru
INSERT INTO users (name, email, email_verified_at, password, role, created_at, updated_at) 
VALUES (
    'Admin',
    'admin@molenbagus.com',
    NOW(),
    '$2y$12$Xtjee5ID6NaP7wOZt7PW4e/LIm9kKnzT3EjyjuD0WkrctzWQcc9O6', -- password: admin123
    'admin',
    NOW(),
    NOW()
);

-- 3. Update user existing menjadi role 'user' (jika ada user lain)
UPDATE users SET role = 'user' WHERE role IS NULL OR role = '';

-- 4. Buat user testing (optional)
INSERT IGNORE INTO users (name, email, email_verified_at, password, role, created_at, updated_at) 
VALUES (
    'Test User',
    'test@example.com',
    NOW(),
    '$2y$12$iDSQk3rqsnSQI49QupSNy.EbpmjqdMUUJDSAjxQWTPAPS1WWs7Bs2', -- password: password
    'user',
    NOW(),
    NOW()
);

-- 5. Verifikasi hasil
SELECT id, name, email, role, created_at FROM users ORDER BY id;

-- =====================================================
-- NOTES:
-- - Password untuk admin@molenbagus.com adalah: admin123
-- - Password untuk test@example.com adalah: password
-- - Pastikan menjalankan php artisan cache:clear setelah ini
-- =====================================================
