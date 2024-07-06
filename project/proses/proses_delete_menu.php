<?php
include "connect.php";
$id_menu = (isset($_POST['id_menu'])) ? htmlentities($_POST['id_menu']) : "";
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "";

if(!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM daftar_menu WHERE id_menu = '$id_menu'");
    if($query){
        unlink("../image/$foto");
        $message = '<script>alert("Data Berhasil Dihapus!");
        window.location="../home.php?x=menu"</script>';
    }else{
        $message = '<script>alert("Data Gagal Diubah!");
        window.location="../home.php?x=menu"</script>';
    }
}echo $message;

?>