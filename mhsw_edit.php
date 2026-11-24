<?php
require_once "Mahasiswa.php";

$id = (int) ($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$mhsw = new Mahasiswa();
$data = $mhsw->edit($id);

// Data tidak ditemukan
if ($data === false) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>

    <h2>Edit Mahasiswa</h2>

    <form action="proses.php?action=update" method="POST">
        <input type="hidden" name="mhsw_id" value="<?= (int) $data['mhsw_id'] ?>">

        <label for="mhsw_nim">NIM</label>
        <input type="text" name="mhsw_nim" id="mhsw_nim"
               value="<?= htmlspecialchars($data['mhsw_nim']) ?>" required>

        <label for="mhsw_nama">Nama</label>
        <input type="text" name="mhsw_nama" id="mhsw_nama"
               value="<?= htmlspecialchars($data['mhsw_nama']) ?>" required>

        <label for="mhsw_alamat">Alamat</label>
        <textarea name="mhsw_alamat" id="mhsw_alamat" rows="3" required><?=
            htmlspecialchars($data['mhsw_alamat'] ?? '') ?></textarea>

        <button type="submit">Update</button>
        <a href="index.php">Kembali</a>
    </form>

</body>
</html>