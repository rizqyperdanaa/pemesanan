<?php
session_start();
include "connect.php";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$nohp = (isset($_POST['nohp'])) ? htmlentities($_POST['nohp']) : "";
$alamat = (isset($_POST['alamat'])) ? htmlentities($_POST['alamat']) : "";

if (!empty($_POST['ubah_profile_validate'])) {
    $query = mysqli_query($conn, "UPDATE user SET nama='$nama', no_hp='$nohp', alamat='$alamat' WHERE username = '$_SESSION[username_warungkisam]'");
    if ($query) {
        $message = '<script>alert("Data Profil Berhasil Diubah!");
            window.history.back()</script>';
    } else {
        $message = '<script>alert("Data Profil Gagal Diubah!");window.history.back()</script>';
    }
} else {
    $message = '<script>alert("Terjadi Kesalahan! Mohon Ubah Ulang");window.history.back()</script>';
}
echo $message;
?>