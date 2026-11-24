# Project 5 – Studi Kasus 1

## Aplikasi Pengelolaan Data Mahasiswa

Project ini merupakan aplikasi web sederhana berbasis PHP dan MySQL untuk mengelola data mahasiswa. Aplikasi menerapkan operasi CRUD (*Create, Read, Update, Delete*) dengan menggunakan PDO sebagai penghubung ke database.

### Fitur
- Menampilkan seluruh data mahasiswa.
- Menambahkan data mahasiswa baru.
- Mengubah data mahasiswa berdasarkan ID.
- Menghapus data mahasiswa.
- Menyimpan NIM, nama, dan alamat mahasiswa.
- Menggunakan prepared statement PDO pada proses penyimpanan, pembaruan, pencarian, dan penghapusan data.

### Teknologi yang Digunakan
- PHP (disarankan PHP 8.0 atau lebih baru).
- MySQL / MariaDB.
- HTML.
- PDO untuk koneksi dan pengolahan database.

### Struktur Folder

```text
studikasus1/
├── database.sql       # Script pembuatan database dan tabel
├── index.php          # Halaman utama untuk menampilkan data mahasiswa
├── Mahasiswa.php      # Class untuk koneksi database dan operasi CRUD
├── mhsw_tambah.php    # Form tambah data mahasiswa
├── mhsw_edit.php      # Form edit data mahasiswa
├── proses.php         # Proses simpan, update, dan hapus data
└── README.md          # Dokumentasi project
```

### Persiapan dan Instalasi

1. Pastikan aplikasi web server lokal seperti **XAMPP** sudah terpasang.
2. Jalankan modul **Apache** dan **MySQL** melalui XAMPP Control Panel.
3. Ekstrak folder `studikasus1` ke dalam direktori:

   ```text
   C:\xampp\htdocs\
   ```

4. Buka **phpMyAdmin** melalui browser:

   ```text
   http://localhost/phpmyadmin
   ```

5. Pilih menu **Import**, kemudian pilih file `database.sql` dari folder project.
6. Jalankan proses import. Script tersebut akan membuat database `dbakademik` dan tabel `tb_mhsw`.
7. Pastikan konfigurasi koneksi pada file `Mahasiswa.php` sesuai dengan pengaturan MySQL lokal:

   ```php
   $dsn = "mysql:host=localhost;dbname=dbakademik;charset=utf8mb4";
   $this->db = new PDO($dsn, "root", "", $options);
   ```

   Konfigurasi di atas menggunakan host `localhost`, database `dbakademik`, username `root`, dan password kosong. Sesuaikan username atau password apabila konfigurasi MySQL berbeda.

8. Buka aplikasi melalui browser:

   ```text
   http://localhost/studikasus1/
   ```

### Cara Menggunakan

1. **Melihat data:** halaman utama menampilkan daftar mahasiswa yang tersimpan di database.
2. **Menambah data:** klik tautan **Tambah Mahasiswa**, isi NIM, nama, dan alamat, lalu klik **Simpan**.
3. **Mengedit data:** klik **Edit** pada baris mahasiswa yang ingin diubah, perbarui data, lalu klik **Update**.
4. **Menghapus data:** klik **Delete** pada baris data yang ingin dihapus, kemudian konfirmasi penghapusan.

### Struktur Database

Database yang digunakan bernama `dbakademik`, dengan satu tabel yaitu `tb_mhsw`.

| Kolom | Tipe Data | Keterangan |
|---|---|---|
| `mhsw_id` | INT UNSIGNED | Primary key dan bertambah otomatis |
| `mhsw_nim` | VARCHAR(25) | NIM mahasiswa, bersifat unik |
| `mhsw_nama` | VARCHAR(100) | Nama mahasiswa |
| `mhsw_alamat` | TEXT | Alamat mahasiswa |

### Catatan
- Pastikan Apache dan MySQL aktif sebelum membuka aplikasi.
- NIM tidak boleh sama karena kolom `mhsw_nim` memiliki batasan `UNIQUE`.
- Jika koneksi database gagal, periksa kembali nama database, host, username, dan password pada `Mahasiswa.php`.
- Project ini merupakan aplikasi studi kasus sederhana untuk latihan pengelolaan data mahasiswa menggunakan PHP dan MySQL.
