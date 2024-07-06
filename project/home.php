<?php
session_start();
if (empty($_SESSION['username_warungkisam'])) {
    header('location:login.php');
}

include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[username_warungkisam]'");
$hasil = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- header -->
    <?php include "header.php"; ?>
    <!-- header -->
    <div class="container-lg">
        <div class="row mb-5">
            <!-- sidebar -->
            <?php include "sidebar.php"; ?>
            <!-- sidebar -->
            <!-- content -->
            <?php
            if (isset($_GET['x']) && $_GET['x'] == 'home') {
                include "content.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'pesan') {
                if ($_SESSION['level_warungkisam'] == 1 || $_SESSION['level_warungkisam'] == 3) {
                    include "pesan.php";
                } else {
                    include "content.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'menu') {
                include "menu.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'katmenu') {
                include "katmenu.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'itempesan') {
                include "itempesan.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'viewitempesan') {
                if ($_SESSION['level_warungkisam'] == 1 || $_SESSION['level_warungkisam'] == 2) {
                    include "viewitempesan.php";
                } else {
                    include "content.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
                include "proses/proses_logout.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'olahpesan') {
                if ($_SESSION['level_warungkisam'] == 1 || $_SESSION['level_warungkisam'] == 2) {
                    include "olahpesan.php";
                } else {
                    include "content.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
                if ($_SESSION['level_warungkisam'] == 1) {
                    include "user.php";
                } else {
                    include "content.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
                if ($_SESSION['level_warungkisam'] == 1) {
                    include "report.php";
                } else {
                    include "content.php";
                }
            } else {
                include "content.php";
            }
            ?>
            <!-- content -->
        </div>

        <div class="fixed-bottom text-center bg-light py-2">
            Warung Kisam 2024
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>