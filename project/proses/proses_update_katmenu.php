<?php
include "connect.php";
$idkategori = (isset($_POST['idkategori'])) ? htmlentities($_POST['idkategori']) : "";
$jenismenu = (isset($_POST['jenismenu'])) ? htmlentities($_POST['jenismenu']) : "";
$katmenu = (isset($_POST['katmenu'])) ? htmlentities($_POST['katmenu']) : "";

if (!empty($_POST['input_katmenu_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_menu FROM kategori WHERE kategori_menu = '$katmenu'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori Menu yang dimasukkan sudah ada dan tidak boleh sama!");window.location="../home.php?x=katmenu"</script>';
    } else {
        $query = mysqli_query($conn, "UPDATE kategori SET jenis_menu='$jenismenu', kategori_menu='$katmenu' WHERE id_kategori='$idkategori'");
        if ($query) {
            $message = '<script>alert("Data Berhasil Diubah!");
        window.location="../home.php?x=katmenu"</script>';
        } else {
            $message = '<script>alert("Data Gagal Diubah!");
            window.location="../home.php?x=katmenu"</script>';
        }
    }
}
echo $message;

?>