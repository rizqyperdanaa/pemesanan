<?php
include "connect.php";
$jenismenu = (isset($_POST['jenismenu'])) ? htmlentities($_POST['jenismenu']) : "";
$katmenu = (isset($_POST['katmenu'])) ? htmlentities($_POST['katmenu']) : "";

if (!empty($_POST['input_katmenu_validate'])) {
    $select = mysqli_query($conn, "SELECT kategori_menu FROM kategori WHERE kategori_menu = '$katmenu'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Kategori yang dimasukkan sudah ada");window.location="../home.php?x=katmenu"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO kategori (jenis_menu,kategori_menu) VALUES ('$jenismenu','$katmenu')");
        if ($query) {
            $message = '<script>alert("Data Berhasil Dimasukkan!");
        window.location="../home.php?x=katmenu"</script>';
        } else {
            $message = '<script>alert("Data Gagal Dimasukkan!");
            window.location="../home.php?x=katmenu</script>';
        }
    }
}
echo $message;

?>