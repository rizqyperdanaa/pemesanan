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
            <a href="?x=report" class="btn btn-secondary mb-3">Back</a>
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
                        <label for="uploadFoto">User</label>
                    </div>
                </div>
            </div>

            <?php
            if (empty($result)) {
                echo "Data Menu tidak ada/belum diisi";
            } else {
                foreach ($result as $row) {
                    ?>

                    <?php
                }

                ?>

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