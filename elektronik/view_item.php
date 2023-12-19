<?php
include "proses/connect.php";
?>


<!--content-->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman view item
        </div>
        <div class="card-body">
            <a href="report" class="btn btn-info mb-3"><i class="bi bi-arrow-left-square-fill"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="number" class="form-control" id="kodebarang" value="<?php echo $kodebarang; ?>">
                        <label for="uploadfoto">kode Barang</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="nohp_pelanggan" value="<?php echo $nohp_pelanggan; ?>">
                        <label for="uploadfoto">No Hp Pelanggan</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="namapelanggan" value="<?php echo $namapelanggan; ?>">
                        <label for="uploadfoto">Nama Pelanggan</label>
                    </div>
                </div>
            </div>

            <?php
            if (empty($result)) {
                echo "Data barang tidak ada";
            } else {
                foreach ($result as $row) {
            ?>

                <?php
                }
                ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Barang</th>
                                <th scope="col">harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">catatan</th>
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
                                        <?php echo number_format($row['harga'], 0, ',', '.')  ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row['status'] == 1) {
                                            echo "<span class='badge text-bg-warning'>masuk ke perbaikan</span>";
                                        } else if ($row['status'] == 2) {
                                            echo "<span class='badge text-bg-primary'>sudah selesai diperbaiki</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harganya'], 0, ',', '.')  ?>
                                    </td>
                                </tr>
                            <?php
                                $total += $row['harganya'];
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="fw-bold">
                                    Total harga
                                </td>
                                <td class="fw-bold">
                                    <?php echo number_format($total, 0, ',', '.')  ?>
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