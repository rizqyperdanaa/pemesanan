<?php
session_start();
include "connect.php";
$kodeorder = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['update_order_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM pesan WHERE id_order = '$kodeorder'");
        $query = mysqli_query($conn, "UPDATE pesan SET meja='$meja', pelanggan='$pelanggan' WHERE id_order = '$kodeorder'");
        if ($query) {
            $message = '<script>alert("Data Order Masuk!");window.location="../home.php?x=pesan"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukkan!");window.location="../home.php?x=pesan;</script>';
        }
    }
echo $message;

?>