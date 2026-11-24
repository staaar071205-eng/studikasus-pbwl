<?php

class Mahasiswa
{
    // Property untuk menampung koneksi database
    private PDO $db;

    // Constructor: otomatis dijalankan saat objek dibuat
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=dbakademik;charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->db = new PDO($dsn, "root", "", $options);
    }

    // Menampilkan seluruh data mahasiswa
    public function tampil(): array
    {
        $sql  = "SELECT * FROM tb_mhsw ORDER BY mhsw_id DESC";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    // Menyimpan data mahasiswa baru
    public function simpan(string $nim, string $nama, string $alamat): void
    {
        $sql = "INSERT INTO tb_mhsw (mhsw_nim, mhsw_nama, mhsw_alamat)
                VALUES (:mhsw_nim, :mhsw_nama, :mhsw_alamat)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":mhsw_nim"    => $nim,
            ":mhsw_nama"   => $nama,
            ":mhsw_alamat" => $alamat,
        ]);
    }

    // Mengambil satu data mahasiswa berdasarkan id
    public function edit(int $id): array|false
    {
        $sql  = "SELECT * FROM tb_mhsw WHERE mhsw_id = :mhsw_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":mhsw_id" => $id]);

        return $stmt->fetch();
    }

    // Memperbarui data mahasiswa
    public function update(int $id, string $nim, string $nama, string $alamat): void
    {
        $sql = "UPDATE tb_mhsw
                   SET mhsw_nim     = :mhsw_nim,
                       mhsw_nama    = :mhsw_nama,
                       mhsw_alamat  = :mhsw_alamat
                 WHERE mhsw_id      = :mhsw_id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ":mhsw_nim"    => $nim,
            ":mhsw_nama"   => $nama,
            ":mhsw_alamat" => $alamat,
            ":mhsw_id"     => $id,
        ]);
    }

    // Menghapus data mahasiswa
    public function delete(int $id): void
    {
        $sql  = "DELETE FROM tb_mhsw WHERE mhsw_id = :mhsw_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":mhsw_id" => $id]);
    }
}