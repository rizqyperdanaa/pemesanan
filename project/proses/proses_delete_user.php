<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if(!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");
    if($query){
        $message = '<script>alert("Data Berhasil Dihapus!");
        window.location="../home.php?x=user"</script>';
    }else{
        $message = '<script>alert("Data Gagal Diubah!");
        window.location="../home.php?x=user"</script>';
    }
}echo $message;

?>