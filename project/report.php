<?php
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT pesan.*,pembayaran.*,nama, SUM(harga*jumlah) AS jumlah_harga FROM pesan
 LEFT JOIN user ON user.id = pesan.pelayan
 LEFT JOIN list_pesan ON list_pesan.kode_order = pesan.id_order
 LEFT JOIN daftar_menu ON daftar_menu.id_menu = list_pesan.menu
 JOIN pembayaran ON pembayaran.id_pembayaran = pesan.id_order
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
            Laporan Penjualan
        </div>
        <div class="card-body">

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
                                <th scope="col">No</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Waktu Order</th>
                                <th scope="col">Waktu Bayar</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Meja</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">User (Reseller)</th>
                                <th scope="col">Detail</th>
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
                                        <?php echo $row['waktu_order'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_bayar'] ?>
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
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1"
                                                href="?x=viewitempesan&order=<?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i
                                                    class="bi bi-info-square"></i></a>
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