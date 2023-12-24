<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_list_order 
LEFT JOIN tb_order ON tb_order.idpelanggan = tb_list_order.kodebarang
LEFT JOIN tb_daftar_barang ON tb_daftar_barang.id_barang = tb_list_order.barang 
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.idpelanggan ORDER BY waktubayar ASC");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_barang = mysqli_query($conn, "SELECT id_barang,namabarang FROM tb_daftar_barang");
?>

<!--content-->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman PERBAIKAN
        </div>
        <div class="card-body">

            <?php
            if (empty($result)) {
                echo "Data tidak ada";
            } else {
                foreach ($result as $row) {
            ?>

                    <!-- Modal terima barang-->
                    <div class="modal fade" id="terima<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_terima_orderitem.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="barang" id="">
                                                        <option selected hidden value="">pilih data</option>
                                                        <?php
                                                        foreach ($select_barang as $value) {
                                                            if ($row['barang'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[namabarang]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[namabarang]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="barang">Daftar Data</label>
                                                    <div class="invalid-feedback">
                                                        pilih Data
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="jumlah" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                                                    <label for="floatingInput">jumlah</label>
                                                    <div class="invalid-feedback">
                                                        masukkan jumlah.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingpassword">catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="terima_orderitem_validate" value="12345">Di Perbaiki</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir Modal terima barang -->


                    <!-- Modal selesai-->
                    <div class="modal fade" id="siapsaji<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">SELESAI</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_siapsaji_orderitem.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="barang" id="">
                                                        <option selected hidden value="">pilih data</option>
                                                        <?php
                                                        foreach ($select_menu as $value) {
                                                            if ($row['barang'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[namabarang]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[namabarang]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="barang">Data</label>
                                                    <div class="invalid-feedback">
                                                        pilih data
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="jumlah" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                                                    <label for="floatingInput">jumlah </label>
                                                    <div class="invalid-feedback">
                                                        masukkan jumlah.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                    <label for="floatingpassword">catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="siapsaji_orderitem_validate" value="12345">SELESAI</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir Modal selesai -->

                <?php
                }
                ?>


                <div class="table-responsive mt-2">
                    <table class="table table-hover"id="example">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Waktubayar</th>
                                <th scope="col">barang</th>
                                <th scope="col">Qty</th>
                                <th scope="col">catatan</th>
                                <th scope="col">Riwayat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                                if($row['riwayat'] !=2){
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $no++ ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kodebarang'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktubayar'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['namabarang'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row['riwayat'] == 1) {
                                            echo "<span class='badge text-bg-warning'>masuk ke perbaikan</span>";
                                        } else if ($row['riwayat'] == 2) {
                                            echo "<span class='badge text-bg-primary'>selesai</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['riwayat'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-primary btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#terima<?php echo $row['id_list_order'] ?>">PERBAIKAN</button>

                                            <button class="<?php echo (empty($row['riwayat']) || $row['riwayat'] != 1) ? "btn btn-secondary btn-sm me-1 text-nowrap disabled" : "btn btn-success btn-sm me-1 text-nowrap"; ?>" data-bs-toggle="modal" data-bs-target="#siapsaji<?php echo $row['id_list_order'] ?>">SELESAI</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                        }
                            ?>
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