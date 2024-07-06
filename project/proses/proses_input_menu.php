<?php
include "connect.php";
$nama_menu = (isset ($_POST['nama_menu'])) ? htmlentities($_POST['nama_menu']) : "";
$keterangan = (isset($_POST['keterangan'])) ? htmlentities($_POST['keterangan']) : "";
$kategori = (isset($_POST['kat_menu'])) ? htmlentities($_POST['kat_menu']) : "";
$harga = (isset($_POST['harga'])) ? htmlentities($_POST['harga']) : "";
$stok = (isset($_POST['stok'])) ? htmlentities($_POST['stok']) : "";
// $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";

$kode_rand = rand(10000, 99999) . "-";
$target_dir = "../image/" . $kode_rand;
$target_file = $target_dir . basename($_FILES['foto']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty ($_POST['input_menu_validate'])) {
    // Cek file bertipe gambar atau tidak
    $check = getimagesize($_FILES['foto']['tmp_name']);
    if ($check === false) {
        $message = "Ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "File yang dimasukkan sudah ada";
            $statusUpload = 0;
        } else {
            if ($_FILES['foto']['size'] > 3000000) { //1 mb
                $message = "File yang dimasukkan terlalu besar dari 1 mb";
                $statusUpload = 0;
            } else {
                if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif") {
                    $message = "Maaf hanya diperbolehkan gambar yang memilik format JPG, JPEG, dan PNG saja";
                    $statusUpload = 0;
                }
            }
        }
    }

    if ($statusUpload == 0) {
        $message = '<script>alert("' . $message . ', Gambar tidak dapat diupload");
        window.location="../home.php?x=menu"</script>';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM daftar_menu WHERE nama_menu = '$nama_menu'");
        if (mysqli_num_rows($select) > 0) {
            $message = '<script>alert("Nama Menu yang dimasukkan sudah ada");window.location="../home.php?x=menu"</script>';
        } else {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                $query = mysqli_query($conn, "INSERT INTO daftar_menu (foto,nama_menu,keterangan,kategori,harga,stok) VALUES ('" . $kode_rand . $_FILES['foto']['name'] . "','$nama_menu','$keterangan','$kategori','$harga','$stok')");
                if ($query) {
                    $message = '<script>alert("Data Berhasil Dimasukkan!"); window.location="../home.php?x=menu"</script>';
                } else {
                    $message = '<script>alert("Data Gagal Dimasukkan!");  window.location="../home.php?x=menu</script>';
                }
            } else {
                $message = '<script>alert("Terjadi Kesalahan, File tidak dapat diupload")</script>';
            }
        }
    }
}
echo $message;

?>