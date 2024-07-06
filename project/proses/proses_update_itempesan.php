<?php
session_start();
include "connect.php";
$id_list_order = (isset($_POST['id_list_order'])) ? htmlentities($_POST['id_list_order']) : "";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";
$menu = (isset($_POST['menu'])) ? htmlentities($_POST['menu']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";

if (!empty($_POST['update_itempesan_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM list_pesan WHERE menu = '$menu' && kode_order = '$kode_order' && id_list_order != $id_list_order");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Menu yang dimasukkan sudah dipesan");window.location="../home.php?x=itempesan&order=' . $kode_order . '&meja."=' . $meja . '&pelanggan=' . $pelanggan . '"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE list_pesan SET menu='$menu',jumlah='$jumlah',catatan='$catatan' WHERE id_list_order='$id_list_order' ");
        if ($query) {
            $message = '<script>alert(' . htmlspecialchars("Menu yang dimasukkan sudah dipesan") . ');window.location="../home.php?x=itempesan&order=' . htmlspecialchars($kode_order) . '&meja=' . htmlspecialchars($meja) . '&pelanggan=' . htmlspecialchars($pelanggan) . '"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukkan!");window.location="../home.php?x=itempesan&order=' . $kode_order . '&meja."=' . $meja . '&pelanggan=' . $pelanggan . '"</script>';
        }
    }
}
echo $message;

?>