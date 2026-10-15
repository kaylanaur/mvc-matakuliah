# MVC PHP Native - Data Mata Kuliah

Aplikasi CRUD sederhana untuk mengelola data mata kuliah dengan pola Model-View-Controller pada PHP Native.

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- XAMPP atau Laragon
- Git

## Instalasi
1. Clone atau salin project ke folder `htdocs`.
2. Import `database/akademik.sql` lewat phpMyAdmin.
3. Sesuaikan koneksi di `config/database.php`.
4. Buka `http://localhost/mvc-matakuliah/public/index.php`.

## Struktur MVC
- `app/models/` : akses dan operasi data
- `app/controllers/` : alur request
- `app/views/` : tampilan HTML
- `config/` : koneksi database
- `database/` : skema dan data awal SQL
- `public/` : entry point aplikasi

## Fitur
- Menampilkan data mata kuliah
- Menambah data mata kuliah
- Mengubah data mata kuliah
- Menghapus data mata kuliah

## Histori Git
Lihat dengan: `git log --oneline --graph --decorate`