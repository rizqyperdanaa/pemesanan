<?php 
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$_SESSION[username_warungkisam]'");
$record = mysqli_fetch_array($query);
?>
<nav class="navbar navbar-dark navbar-expand" style="background-color: maroon">
    <div class="container-lg">
        <a class="navbar-brand" href="index.php">Warung Kisam</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Halo,
                        <?php echo $hasil['nama']; ?>!
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#ModalUbahProfile">Profile</a></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword">Ubah
                                Password</a></li>
                        <li><a class="dropdown-item" href="home.php?x=logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Ubah Password -->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input disabled type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="username"
                                    value="<?php echo $_SESSION['username_warungkisam'] ?>" required>
                                <label for="floatingInput">Username (Email)</label>
                                <div class="invalid-feedback">
                                    Masukkan Email Yang Valid
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="passwordlama">
                                <label for="floatingPassword">Password Lama</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="passwordbaru">
                                <label for="floatingPassword">Masukkan Password Baru</label>
                            </div>
                            <div class="invalid-feedback">
                                Masukkan Password Dengan Benar
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="repasswordbaru">
                                <label for="floatingPassword">Ulangi Password Baru</label>
                            </div>
                            <div class="invalid-feedback">
                                Ulangi Password Dengan Benar
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="12345">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah Profile -->
<div class="modal fade" id="ModalUbahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_profile.php" method="POST">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input disabled type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com" name="username"
                                    value="<?php echo $_SESSION['username_warungkisam'] ?>" required>
                                <label for="floatingInput">Username (Email)</label>
                                <div class="invalid-feedback">
                                    Masukkan Email Yang Valid
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingNama" name="nama" value="<?php echo $record['nama'] ?>">
                                <label for="floatingNama">Nama</label>
                                <div class="invalid-feedback">
                                    Masukkan Nama Anda
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingPassword" name="nohp" value="<?php echo $record['no_hp'] ?>" required>
                                <label for="floatingPassword">Nomor Handphone</label>
                            </div>
                            <div class="invalid-feedback">
                                Masukkan Nomor Handpohne Anda
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="alamat" id="floatingInput"
                                    style="height:100px"><?php echo $record['alamat'] ?></textarea>
                                <label for="floatingInput">Alamat</label>
                                <div class="invalid-feedback">
                                    Masukkan Alamat Dengan Benar
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubah_profile_validate" value="12345">Ubah Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>