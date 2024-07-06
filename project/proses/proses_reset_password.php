<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";

if(!empty($_POST['input_user_validate'])) {
    $query = mysqli_query($conn, "UPDATE user SET password=md5('12345') WHERE id='$id'");
    if($query){
        $message = '<script>alert("Password Berhasil Direset!");
        window.location="../home.php?x=user"</script>';
    }else{
        $message = '<script>alert("Password Gagal Direset!")</script>';
    }
}echo $message;

?>