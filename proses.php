<?php
require_once "Mahasiswa.php";

$mhsw   = new Mahasiswa();
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'simpan':
        $mhsw->simpan(
            trim($_POST['mhsw_nim']    ?? ''),
            trim($_POST['mhsw_nama']   ?? ''),
            trim($_POST['mhsw_alamat'] ?? '')
        );
        break;

    case 'update':
        $mhsw->update(
            (int) ($_POST['mhsw_id']   ?? 0),
            trim($_POST['mhsw_nim']    ?? ''),
            trim($_POST['mhsw_nama']   ?? ''),
            trim($_POST['mhsw_alamat'] ?? '')
        );
        break;

    case 'delete':
        $id = (int) ($_GET['id'] ?? 0);
        if ($id > 0) {
            $mhsw->delete($id);
        }
        break;

    default:
        // jika action tidak dikenali
        die("Aksi tidak valid.");
}

// redirect ke halaman utama
header("Location: index.php");
exit;