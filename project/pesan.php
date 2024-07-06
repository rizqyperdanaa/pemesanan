<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT pesan.*,pembayaran.*,nama, SUM(harga*jumlah) AS jumlah_harga FROM pesan
 LEFT JOIN user ON user.id = pesan.pelayan
 LEFT JOIN list_pesan ON list_pesan.kode_order = pesan.id_order
 LEFT JOIN daftar_menu ON daftar_menu.id_menu = list_pesan.menu
 LEFT JOIN pembayaran ON pembayaran.id_pembayaran = pesan.id_order
 GROUP BY id_order ORDER BY waktu_order DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

// $select_kat_menu = mysqli_query($conn, "SELECT id_kategori,kategori_menu FROM kategori");
?>
<!-- content -->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Pesan Makanan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">
                        Pesan
                    </button>
                </div>
            </div>
            <!-- Modal Tambah Pesanan-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan Makanan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_order.php"
                                method="POST">
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" name="kodeorder"
                                            value="<?php echo date('ymdHi') . rand(100, 9999) ?>">
                                        <label class="">Kode Order</label>
                                        <div class="invalid-feedback">
                                            Masukkan Kode Order
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg">
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" placeholder="Nomor Meja"
                                        name="meja" required>
                                    <label>Meja</label>
                                    <div class="invalid-feedback">
                                        Masukkan Nomor Meja
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control"
                                                placeholder="Nama Pelanggan" name="pelanggan">
                                            <label>Pelanggan (Alamat)</label>
                                        </div>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Pelanggan
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_order_validate"
                                        value="12345">Buat Pesanan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Pesanan-->

            <?php
            if (empty($result)) {
                echo "Data Menu tidak ada/belum diisi";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- Modal Update-->
                    <div class="modal fade" id="ModalUpdate<?php echo $row['id_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_update_order.php"
                                        method="POST">
                                        <div class="col-lg">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="kodeorder" name="kode_order"
                                                    value="<?php echo $row['id_order'] ?>" readonly>
                                                <label class="" for="kodeorder">Kode Order</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Kode Order
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="meja" placeholder="Nomor Meja"
                                                name="meja" value="<?php echo $row['meja'] ?>" required>
                                            <label for="meja">Meja</label>
                                            <div class="invalid-feedback">
                                                Masukkan Nomor Meja
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pelanggan"
                                                        placeholder="Nama Pelanggan" name="pelanggan" value="<?php echo $row['pelanggan'] ?>">
                                                    <label for="pelanggan">Pelanggan (Alamat)</label>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Masukkan Nama Pelanggan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="update_order_validate"
                                                value="12345">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Update-->

                    <!-- Modal Delete-->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Menu?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_order.php"
                                        method="POST" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">                                        <input type="hidden" value="<?php echo $row['foto'] ?>" name="foto">
                                        <div class="col-lg-12 mb-2">
                                            Apakah anda ingin menghapus pesanan dengan kode <b>
                                                <?php echo $row['id_order'] ?>
                                            </b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_order_validate"
                                                value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete-->


                    <?php
                }

                ?>
                <!-- Tabel -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Meja</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">User (Reseller)</th>
                                <th scope="col">Status</th>
                                <th scope="col">Waktu Order</th>
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
                                        <b>
                                            <?php echo $row['id_order'] ?>
                                        </b>
                                    </td>
                                    <td>
                                        <?php echo $row['pelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['meja'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format((int)$row['jumlah_harga'],0,',','.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama'] ?>
                                    </td>
                                    <td>
                                        <?php echo  (!empty($row['id_pembayaran'])) ? " <span class='badge text-bg-success'>Done Payment</span>" : "" ; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_order'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1"
                                                href="?x=itempesan&order=<?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                                                    class="bi bi-info-square"></i></a>
                                            <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary  btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1" ;?>" data-bs-toggle="modal"
                                                data-bs-target="#ModalUpdate<?php echo $row['id_order'] ?>"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary  btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1" ;?>" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i
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