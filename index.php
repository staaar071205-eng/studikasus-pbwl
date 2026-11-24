<?php
require_once "Mahasiswa.php";

$mhsw = new Mahasiswa();
$data = $mhsw->tampil();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>

    <h2>Data Mahasiswa</h2>

    <a href="mhsw_tambah.php">+ Tambah Mahasiswa</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= (int) $row['mhsw_id'] ?></td>
                        <td><?= htmlspecialchars($row['mhsw_nim']) ?></td>
                        <td><?= htmlspecialchars($row['mhsw_nama']) ?></td>
                        <td><?= htmlspecialchars($row['mhsw_alamat'] ?? '') ?></td>
                        <td class="aksi">
                            <a href="mhsw_edit.php?id=<?= (int) $row['mhsw_id'] ?>">Edit</a>
                            <a href="proses.php?action=delete&id=<?= (int) $row['mhsw_id'] ?>"
                               onclick="return confirm('Yakin mau hapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">Belum ada data mahasiswa</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>