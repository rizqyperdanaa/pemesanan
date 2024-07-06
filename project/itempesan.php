<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS jumlah_harga FROM list_pesan
 LEFT JOIN pesan ON pesan.id_order = list_pesan.kode_order
 LEFT JOIN daftar_menu ON daftar_menu.id_menu = list_pesan.menu
 LEFT JOIN pembayaran ON pembayaran.id_pembayaran = pesan.id_order
 GROUP BY id_list_order
 HAVING list_pesan.kode_order = $_GET[order]");

$kode = $_GET['order'];
$meja = $_GET['meja'];
$pengguna = $_GET['pelanggan'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    // $kode = $record['id_order'];
    // $meja = $record['meja'];
    // $pengguna = $record['pelanggan'];
}

$select_menu = mysqli_query($conn, "SELECT id_menu,nama_menu FROM daftar_menu");
?>
<!-- content -->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Order
        </div>
        <div class="card-body">
            <a href="?x=pesan" class="btn btn-secondary mb-3">Back</a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodeorder" name=""
                            value="<?php echo $kode ?>">
                        <label for="uploadFoto">Kode Order</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="meja" name="" value="<?php echo $meja ?>">
                        <label for="uploadFoto">Meja</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="meja" name=""
                            value="<?php echo $pengguna ?>">
                        <label for="uploadFoto">Pelanggan</label>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Item-->
            <div class="modal fade" id="ModalTambahItem" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_itempesan.php"
                                method="POST">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="menu" id="">
                                            <option selected hidden value="">Pilih Menu</option>
                                            <?php
                                            foreach ($select_menu as $value) {
                                                echo "<option value=$value[id_menu]>$value[nama_menu]</option>";
                                            }
                                            ?>
                                        </select>
                                        <label for="menu">Menu</label>
                                        <div class="invalid-feedback">
                                            Pilih menu yang ingin dipesan
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput"
                                            placeholder="Jumlah Paket" name="jumlah" required>
                                        <label for="floatingInput">Jumlah Menu</label>
                                        <div class="invalid-feedback">
                                            Masukkan Jumlah Paket
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingPassword"
                                                placeholder="catatan" name="catatan">
                                            <label for="floatingPassword">Catatan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_itempesan_validate"
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
            if (empty($result)) {
                echo "Data Menu tidak ada/belum diisi";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- Modal Update-->
                    <div class="modal fade" id="ModalUpdate<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_update_itempesan.php"
                                        method="POST">
                                        <input type="hidden" name="id_list_order" value="<?php echo $row['id_list_order'] ?>">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <div class="col-lg">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" name="menu" id="menu">
                                                    <option selected hidden value="">Pilih Menu</option>
                                                    <?php
                                                    foreach ($select_menu as $value) {
                                                        if ($row['menu'] == $value['id_menu']) {
                                                            echo "<option selected value=$value[id_menu]>$value[nama_menu]</option>";
                                                        } else {
                                                            echo "<option value=$value[id_menu]>$value[nama_menu]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <label for="menu">Menu</label>
                                                <div class="invalid-feedback">
                                                    Pilih menu yang ingin dipesan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput"
                                                    placeholder="Jumlah Paket" name="jumlah" required
                                                    value="<?php echo $row['jumlah'] ?>">
                                                <label for="floatingInput">Jumlah Menu</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Jumlah Paket
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingPassword"
                                                        placeholder="catatan" name="catatan"
                                                        value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingPassword">Catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="update_itempesan_validate"
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
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Menu?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_itempesan.php"
                                        method="POST">
                                        <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id_listorder">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">

                                        <div class="col-lg-12 mb-2">
                                            Apakah anda ingin menghapus pesanan <b>
                                                <?php echo $row['nama_menu'] ?>
                                            </b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_itempesan_validate"
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

                <!-- Modal Bayar-->
                <div class="modal fade" id="ModalBayar" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th scope="col">Menu</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Catatan</th>
                                                <th scope="col">Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($result as $row) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['nama_menu'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['jumlah'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['status'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['catatan'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($row['jumlah_harga'], 0, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $total += $row['jumlah_harga'];
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="5" class="fw-bold">
                                                    Total Harga
                                                </td>
                                                <td class="fw-bold">
                                                    <?php echo number_format($total, 0, ',', '.'); ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <span class="text-danger fs-5 fw-semibold">Apakah anda ingin melakukan pembayaran?</span>
                                <form class="needs-validation" novalidate action="proses/proses_bayar.php"
                                    method="POST">
                                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                    <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                    <div class="col-lg">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"
                                                placeholder="Jumlah Paket" name="pembayaran" required>
                                            <label for="floatingInput">Bukti Pembayaran</label>
                                            <div class="invalid-feedback">
                                                Masukkan Bukti Pembayaran
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="bayar_validate"
                                            value="12345">Bayar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Bayar-->

                <!-- Tabel -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Menu</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['nama_menu'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harga'], 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php if($row['status']==1){
                                            echo "<span class='badge text-bg-primary'>Pesanan diproses</span>";
                                        } elseif($row['status']==2){
                                            echo "<span class='badge text-bg-success'>Pesanan telah dikirim</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['jumlah_harga'], 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary  btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1" ;?>" data-bs-toggle="modal"
                                                data-bs-target="#ModalUpdate<?php echo $row['id_list_order'] ?>"><i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary  btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1" ;?>" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i
                                                    class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $total += $row['jumlah_harga'];
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="fw-bold">
                                    Total Harga
                                </td>
                                <td class="fw-bold">
                                    <?php echo number_format($total, 0, ',', '.'); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
            }
            ?>
                <div>
                    <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary disabled" : "btn btn-success" ;?>" data-bs-toggle="modal" data-bs-target="#ModalTambahItem"><i
                            class="bi bi-plus-circle-fill"></i> Item</button>
                    <button class="<?php echo (!empty($row['id_pembayaran'])) ? "btn btn-secondary disabled" : "btn btn-primary" ;?>" data-bs-toggle="modal" data-bs-target="#ModalBayar"> Bayar</button>
                </div>
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