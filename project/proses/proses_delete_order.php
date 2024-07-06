<?php
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";

if (!empty($_POST['delete_order_validate'])) {
    $select = mysqli_query($conn, "SELECT order FROM list_pesan WHERE order = '$kode_order'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Data Tidak bisa dihapus karena sudah memiliki item order!");
        window.location="../home.php?x=pesan"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM pesan WHERE id_order = '$kode_order'");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dihapus!");
        window.location="../home.php?x=pesan"</script>';
        } else {
            $message = '<script>alert("Data Gagal Diubah!");
        window.location="../home.php?x=pesan"</script>';
        }
    }

}
echo $message;

?>