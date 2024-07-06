<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM list_pesan
 LEFT JOIN pesan ON pesan.id_order = list_pesan.kode_order
 LEFT JOIN daftar_menu ON daftar_menu.id_menu = list_pesan.menu
 LEFT JOIN pembayaran ON pembayaran.id_pembayaran = pesan.id_order 
 ORDER BY waktu_order DESC");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT id_menu,nama_menu FROM daftar_menu");
?>
<!-- content -->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Data Pesanan Reseller
        </div>
        <div class="card-body">
            <?php
            if (empty($result)) {
                echo "Data Menu tidak ada/belum diisi";
            } else {
                foreach ($result as $row) {
                    ?>

                    <!-- Modal Terima Order-->
                    <div class="modal fade" id="terima<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Menu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_terima_itempesan.php"
                                        method="POST">
                                        <input type="hidden" name="id_list_order" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="col-lg">
                                            <div class="form-floating mb-3">
                                                <select disabled class="form-select" name="menu" id="menu">
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
                                                <input disabled type="number" class="form-control" id="floatingInput"
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
                                            <button type="submit" class="btn btn-primary" name="terima_order_validate"
                                                value="12345">Terima Pesanan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Terima Order-->

                     <!-- Modal Kirim Order-->
                     <div class="modal fade" id="kirim<?php echo $row['id_list_order'] ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pesanan Sudah Siap?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_kirim_itempesan.php"
                                        method="POST">
                                        <input type="hidden" name="id_list_order" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="col-lg">
                                            <div class="form-floating mb-3">
                                                <select disabled class="form-select" name="menu" id="menu">
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
                                                <input disabled type="number" class="form-control" id="floatingInput"
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
                                            <button type="submit" class="btn btn-primary" name="kirim_order_validate"
                                                value="12345">Kirim Pesanan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Kirim Order-->
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
                                <th scope="col">Waktu Order</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                if($row['status'] != 2){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $no++ ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kode_order'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_order'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_menu'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
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
                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['status'])) ? "btn btn-secondary  btn-sm me-1 text-nowrap disabled" : "btn btn-primary btn-sm me-1 text-nowrap" ;?>" data-bs-toggle="modal"
                                                data-bs-target="#terima<?php echo $row['id_list_order'] ?>">Terima Order</button>
                                            <button class="<?php echo (empty($row['status']) || $row['status']!=1) ? "btn btn-secondary btn-sm me-1 text-nowrap disabled" : "btn btn-success btn-sm me-1 text-nowrap" ;?>" data-bs-toggle="modal"
                                                data-bs-target="#kirim<?php echo $row['id_list_order'] ?>">Selesai</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
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