<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>

    <h2>Tambah Mahasiswa</h2>

    <form action="proses.php?action=simpan" method="POST">
        <label for="mhsw_nim">NIM</label>
        <input type="text" name="mhsw_nim" id="mhsw_nim" required>

        <label for="mhsw_nama">Nama</label>
        <input type="text" name="mhsw_nama" id="mhsw_nama" required>

        <label for="mhsw_alamat">Alamat</label>
        <textarea name="mhsw_alamat" id="mhsw_alamat" rows="3" required></textarea>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>

</body>
</html>