<?php
    session_start();
    include "connect.php";
    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "" ;
    $password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;
    if(!empty($_POST['submit_validate'])){
        $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' && password = '$password'");
        $hasil = mysqli_fetch_array($query);
        if($hasil){
            $_SESSION['username_warungkisam'] = $username;
            $_SESSION['level_warungkisam'] = $hasil['level'];
            $_SESSION['id_warungkisam'] = $hasil['id'];
            header('location:../home.php') ;
        }else{ ?>
            <script>
                alert('Username atau Password yang dimasukkan salah')
                window.location='../login.php'
            </script>
<?php
        }
    }
?>