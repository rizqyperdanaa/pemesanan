<?php
include "connect.php";
$idkategori = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if (!empty($_POST['hapus_katmenu_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori FROM daftar_menu WHERE kategori = '$idkategori'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori yang dimasukkan sudah digunakan dan tidak bisa dihapus");window.location="../home.php?x=katmenu"</script>';
    } else {
        $query = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = '$idkategori'");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dihapus!");
        window.location="../home.php?x=katmenu"</script>';
        } else {
            $message = '<script>alert("Data Gagal Diubah!");
        window.location="../home.php?x=katmenu"</script>';
        }
    }
}
echo $message;

?>