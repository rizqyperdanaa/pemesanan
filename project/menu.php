<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM daftar_menu
 LEFT JOIN kategori ON kategori.id_kategori = daftar_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kat_menu = mysqli_query($conn, "SELECT id_kategori,kategori_menu FROM kategori");
?>
<!-- content -->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Menu Makanan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">
                        Tambah
                        Menu </button>
                </div>
            </div>
            <!-- Modal Tambah Menu-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_menu.php"
                                method="POST" enctype="multipart/form-data">
                                <div class="col-lg">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control py-3" id="uploadFoto"
                                            placeholder="your photo" name="foto" required>
                                        <label class="input-group-text" for="uploadFoto">Upload Foto</label>
                                        <div class="invalid-feedback">
                                            Masukkan Format Foto Dengan Benar
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg">
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput"
                                        placeholder="Makanan/Minuman" name="nama_menu" required>
                                    <label for="floatingInput">Nama Menu</label>
                                    <div class="invalid-feedback">
                                        Masukkan Nama Menu
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingPassword"
                                                placeholder="Keterangan" name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelect"
                                                aria-label="Floating label select example" name="kat_menu" required>
                                                <option selected hidden value="">Pilih Kategori</option>
                                                <?php
                                                foreach ($select_kat_menu as $value) {
                                                    echo "<option value=" . $value['id_kategori'] . ">$value[kategori_menu]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingSelect">Kategori Makanan</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Makanan
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Minimal 5000" name="harga" required>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga Dengan Benar
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Stok" name="stok" required>
                                            <label for="floatingInput">Stok</label>
                                            <div class="invalid-feedback">
                                                Masukkan Stok Dengan Benar
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                        value="12345">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Menu-->

            <?php
            if (empty ($result)) {
                echo "Data Menu tidak ada/belum diisi";
            } else {
            foreach ($result as $row) {
                ?>
                <!-- Modal View Menu-->
                <div class="modal fade" id="ModalViewMenu<?php echo $row['id_menu'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_input_menu.php"
                                    method="POST" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $row['id_menu'] ?>" name="id_menu">
                                    <div class="col-lg">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            value="<?php echo $row['nama_menu'] ?>" disabled>
                                        <label for="floatingInput">Nama Menu</label>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Menu
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPassword"
                                                    placeholder="Keterangan" name="keterangan"
                                                    value="<?php echo $row['keterangan'] ?>" disabled>
                                                <label for="floatingPassword">Keterangan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" disabled>
                                                    <option selected hidden value="">Pilih Kategori</option>
                                                    <?php
                                                    foreach ($select_kat_menu as $value) {
                                                        if ($row['kategori'] == $value['id_kategori']) {
                                                            echo "<option selected value=" . $value['id_kategori'] . ">$value[kategori_menu]</option>";
                                                        } else {
                                                            echo "<option value=" . $value['id_kategori'] . ">$value[kategori_menu]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Kategori Makanan</label>
                                                <div class="invalid-feedback">
                                                    Pilih Kategori Makanan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    value="<?php echo $row['harga'] ?>" disabled>
                                                <label for="floatingInput">Harga</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Harga Dengan Benar
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    value="<?php echo $row['stok'] ?>" disabled>
                                                <label for="floatingInput">Stok</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Stok Dengan Benar
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                            value="12345">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal View-->

                <!-- Modal Update-->
                <div class="modal fade" id="ModalUpdate<?php echo $row['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Menu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_update_menu.php"
                                    method="POST" enctype="multipart/form-data">
                                    <div class="col-lg">
                                        <div class="input-group mb-3">
                                            <input type="hidden" value="<?php echo $row['id_menu'] ?>" name="id_menu">
                                            <input type="file" class="form-control py-3" id="uploadFoto"
                                                placeholder="your photo" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto</label>
                                            <div class="invalid-feedback">
                                                Masukkan Format Foto Dengan Benar
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput"
                                            placeholder="Makanan/Minuman" name="nama_menu" value="<?php echo $row['nama_menu'] ?>" required>
                                        <label for="floatingInput">Nama Menu</label>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Menu
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingPassword"
                                                    placeholder="Keterangan" name="keterangan" value="<?php echo $row['keterangan'] ?>">
                                                <label for="floatingPassword">Keterangan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect"
                                                    aria-label="Floating label select example" name="kat_menu" required>
                                                    <option selected hidden value="">Pilih Kategori</option>
                                                    <?php
                                                    foreach ($select_kat_menu as $value) {
                                                        if ($row['kategori'] == $value['id_kategori']) {
                                                            echo "<option selected value=" . $value['id_kategori'] . ">$value[kategori_menu]</option>";
                                                        } else {
                                                            echo "<option value=" . $value['id_kategori'] . ">$value[kategori_menu]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="floatingSelect">Kategori Makanan</label>
                                                <div class="invalid-feedback">
                                                    Pilih Kategori Makanan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="Minimal 5000" name="harga" value="<?php echo $row['harga'] ?>" required>
                                                <label for="floatingInput">Harga</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Harga Dengan Benar
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="Stok" name="stok" value="<?php echo $row['stok'] ?>" required>
                                                <label for="floatingInput">Stok</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Stok Dengan Benar
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="input_menu_validate"
                                            value="12345">Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Update-->

                <!-- Modal Delete-->
                <div class="modal fade" id="ModalDelete<?php echo $row['id_menu'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Menu?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_delete_menu.php"
                                    method="POST" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $row['id_menu'] ?>" name="id_menu">
                                    <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                    <div class="col-lg-12 mb-2">
                                        Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu'] ?></b>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="input_user_validate"
                                            value="12345">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Delete-->

                <!-- Modal Reset Password-->
                <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_reset_password.php"
                                    method="POST">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                    <div class="col-lg-12 mb-2">
                                        <?php
                                        if ($row['username'] == $_SESSION['username_warungkisam']) {
                                            echo "<div class='alert alert-danger'>Anda tidak dapat mereset password sendiri sendiri</div>";
                                        } else {
                                            echo "Apakah anda yakin ingin reset password <b>$row[username]</b> menjadi password bawaan sistem yaitu <b>password</b>?";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" name="input_user_validate"
                                            value="12345" <?php echo ($row['username'] == $_SESSION['username_warungkisam']) ? 'disabled' : ''; ?>>Reset Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Reset Password-->

                <?php
            }
            
                ?>
                <!-- Tabel -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama Menu</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jenis Menu</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td>
                                        <div style="width: 100px">
                                            <img src="image/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                        </div>
                                    </td>
                                    <td>
                                        <b>
                                            <?php echo $row['nama_menu'] ?>
                                        </b>
                                    </td>
                                    <td>
                                        <?php echo $row['keterangan'] ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['jenis_menu'] == 1) ? "Frozen" : "Instan" ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kategori_menu'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['harga'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['stok'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalViewMenu<?php echo $row['id_menu'] ?>"><i
                                                    class="bi bi-info-square"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalUpdate<?php echo $row['id_menu'] ?>"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_menu'] ?>"><i
                                                    class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>
<!-- content -->

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