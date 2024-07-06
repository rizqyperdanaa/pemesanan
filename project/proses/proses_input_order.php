<?php
session_start();
include "connect.php";
$kodeorder = (isset($_POST['kodeorder'])) ? htmlentities($_POST['kodeorder']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";

if (!empty($_POST['input_order_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM pesan WHERE id_order = '$kodeorder'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Order yang dimasukkan sudah ada");window.location="../home.php?x=pesan"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO pesan (id_order,pelanggan,meja,pelayan) VALUES ('$kodeorder','$pelanggan','$meja','$_SESSION[id_warungkisam]')");
        if ($query) {
            $message = '<script>alert("Data Order Masuk!");window.location="../home.php?x=itempesan&order='.$kodeorder.'&meja='.$meja.'&pelanggan='.$pelanggan.';"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukkan!");window.location="../home.php?x=pesan;</script>';
        }
    }
    echo $message;
}

?>