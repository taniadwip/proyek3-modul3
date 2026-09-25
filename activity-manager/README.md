# Activity Manager (Modul 3 - Laravel Basic)

Aplikasi manajemen aktivitas perkuliahan dan tugas praktikum menggunakan Laravel 13 dan SQLite.

## Fitur Utama

- CRUD Kegiatan Lengkap (Index, Detail, Tambah, Edit, Hapus)
- Validasi Form Request (BR-01 s/d BR-03)
- Pemisahan Business Logic Transisi Status via `ActivityService`
- Filter Status Kegiatan (Planned, Ongoing, Done)

## Cara Menjalankan Proyek

1. Jalankan migrasi dan seeder:
    ```bash
    php artisan migrate:fresh --seed
    ```
