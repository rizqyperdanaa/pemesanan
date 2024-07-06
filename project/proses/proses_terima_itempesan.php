<?php
session_start();
include "connect.php";
$id_list_order = (isset($_POST['id_list_order'])) ? htmlentities($_POST['id_list_order']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";

if (!empty($_POST['terima_order_validate'])) {
    $query = mysqli_query($conn, "UPDATE list_pesan SET catatan='$catatan', status=1 WHERE id_list_order='$id_list_order' ");
    if ($query) {
        $message = '<script>alert("Orderan Diterima!");window.location="../home.php?x=olahpesan"</script>';
    } else {
        $message = '<script>alert("Orderan gagal..");window.location="../home.php?x=olahpesan"</script>';
    }

}
echo $message;

?>