<?php
session_start();
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";
$pembayaran = (isset($_POST['pembayaran'])) ? htmlentities($_POST['pembayaran']) : "";
$kembalian = $pembayaran - $total;

if (!empty($_POST['bayar_validate'])) {
    if ($total < $pembayaran) {
        $message = '<script>alert("Nominal tidak mencukupi");window.location="../home.php?x=itempesan&order=' . $kode_order . '&meja."=' . $meja . '&pelanggan=' . $pelanggan . '"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO pembayaran (id_pembayaran,nominal_uang,jumlah_total) VALUES ('$kode_order','$pembayaran','$total')");
        if ($query) {
            $message = '<script>alert(' . htmlspecialchars("Pembayaran berhasil dilakukan") . ');window.location="../home.php?x=itempesan&order=' . htmlspecialchars($kode_order) . '&meja=' . htmlspecialchars($meja) . '&pelanggan=' . htmlspecialchars($pelanggan) . '"</script>';
        } else {
            $message = '<script>alert(' . htmlspecialchars("Pembayaran gagal dilakukan") . ');window.location="../home.php?x=itempesan&order=' . htmlspecialchars($kode_order) . '&meja=' . htmlspecialchars($meja) . '&pelanggan=' . htmlspecialchars($pelanggan) . '"</script>';
        }
    }
}
echo $message;

?>