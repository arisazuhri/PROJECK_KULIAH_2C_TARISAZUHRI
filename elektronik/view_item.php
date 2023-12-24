<?php
include "proses/connect.php";

$kode = isset($_GET['order']) ? $_GET['order'] : '';
$nohp_pelanggan = isset($_GET['nohp_pelanggan']) ? $_GET['nohp_pelanggan'] : '';
$namapelanggan = isset($_GET['namapelanggan']) ? $_GET['namapelanggan'] : '';

$query = mysqli_query($conn, "
    SELECT tb_list_order.*, tb_daftar_barang.namabarang, tb_daftar_barang.biaya,
           SUM(tb_daftar_barang.biaya * tb_list_order.jumlah) AS harganya
    FROM tb_list_order
    LEFT JOIN tb_order ON tb_order.idpelanggan = tb_list_order.kodebarang
    LEFT JOIN tb_daftar_barang ON tb_daftar_barang.id_barang = tb_list_order.barang 
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.idpelanggan 
    WHERE tb_list_order.kodebarang = '$kode'
    GROUP BY tb_list_order.id_list_order
");

$result = array();

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT id_barang, namabarang FROM tb_daftar_barang");
?>

<!--content-->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman view item
        </div>
        <div class="card-body">
            <a href="order" class="btn btn-info mb-3"><i class="bi bi-arrow-left-square-fill"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="number" class="form-control" id="kodebarang" value="<?php echo $kode; ?>">
                        <label for="uploadfoto">Kode Barang</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="number" class="form-control" id="nohp_pelanggan" value="<?php echo $nohp_pelanggan; ?>">
                        <label for="uploadfoto">No Hp Pelanggan</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="namapelanggan" value="<?php echo $namapelanggan; ?>">
                        <label for="namapelanggan">Nama Pelanggan</label>
                    </div>
                </div>
            </div>

            <?php
            if (empty($result)) {
                echo "Data barang tidak ada";
            } else {
                ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Riwayat</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['namabarang'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['biaya'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        // Check if 'status' key exists in $row array
                                        if (isset($row['riwayat'])) {
                                            if ($row['riwayat'] == 1) {
                                                echo "<span class='badge text-bg-warning'>masuk ke perbaikan</span>";
                                            } else if ($row['riwayat'] == 2) {
                                                echo "<span class='badge text-bg-primary'>sudah selesai diperbaiki</span>";
                                            }
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harganya'], 0, ',', '.') ?>
                                    </td>
                                </tr>
                            <?php
                                $total += $row['harganya'];
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="fw-bold">
                                    Total Harga
                                </td>
                                <td class="fw-bold">
                                    <?php echo number_format($total, 0, ',', '.') ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!--end content-->
