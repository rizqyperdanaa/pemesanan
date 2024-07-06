<?php
include "connect.php";
$id_listorder = (isset($_POST['id_listorder'])) ? htmlentities($_POST['id_listorder']) : "";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['delete_itempesan_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM list_pesan WHERE id_list_order = '$id_listorder'");
    if ($query) {
        $message = '<script>alert(' . htmlspecialchars("Menu yang dimasukkan sudah dipesan") . ');window.location="../home.php?x=itempesan&order=' . htmlspecialchars($kode_order) . '&meja=' . htmlspecialchars($meja) . '&pelanggan=' . htmlspecialchars($pelanggan) . '"</script>';
    
    } else {
        $message = '<script>alert(' . htmlspecialchars("Menu yang dimasukkan sudah dipesan") . ');window.location="../home.php?x=itempesan&order=' . htmlspecialchars($kode_order) . '&meja=' . htmlspecialchars($meja) . '&pelanggan=' . htmlspecialchars($pelanggan) . '"</script>';
    }

}
echo $message;

?>