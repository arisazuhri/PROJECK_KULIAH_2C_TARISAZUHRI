<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT *, SUM(biaya*jumlah) AS biayanya FROM tb_list_order 
LEFT JOIN tb_order ON tb_order.idpelanggan = tb_list_order.kodebarang
LEFT JOIN tb_daftar_barang ON tb_daftar_barang.id_barang = tb_list_order.barang 
GROUP BY id_list_order
HAVING tb_list_order.kodebarang = $_GET[kodebarang]");

$kodebarang = $_GET['kodebarang'];
$nohp_pelanggan = $_GET['nohp_pelanggan'];
$namapelanggan = $_GET['namapelanggan'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    //  $kode = $record['id_order'];
    //  $meja = $record['meja'];
    //  $pelanggan = $record['pelanggan'];
}
$select_menu = mysqli_query($conn, "SELECT id_barang,namabarang FROM tb_daftar_barang");
?>


<!--content-->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order Item
        </div>
        <div class="card-body">
            <a href="kodebarang" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodebarang" value="<?php echo $kodebarang; ?>">
                        <label for="uploadFoto">Kode Barang</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="number" class="form-control" id="nohp_pelanggan" value="<?php echo $nohp_pelanggan; ?>">
                        <label for="uploadFoto">Alamat Pelanggan</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="namapelanggan" value="<?php echo $namapelanggan; ?>">
                        <label for="uploadFoto">Nama Pelanggan</label>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah Item Baru-->
            <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_orderitem.php" method="POST">
                                <input type="hidden" name="kodebarang" value="<?php echo $kodebarang ?>">
                                <input type="hidden" name="nohp_pelanggan" value="<?php echo $nohp_pelanggan ?>">
                                <input type="hidden" name="namapelanggan" value="<?php echo $namapelanggan ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="barang" id="" required>
                                                <option selected hidden value="">Pilih data</option>
                                                <?php
                                                foreach ($select_barang as $value) {
                                                    echo "<option value=$value[id]>$value[namabarang]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="barang">daftar data</label>
                                            <div class="invalid-feedback">
                                                Pilih data
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah" required>
                                            <label for="floatingInput">Jumlah</label>
                                            <div class="invalid-feedback">
                                                Masukkan Jumlah 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan">
                                            <label for="floatingPassword">catatan</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="input_orderitem_validate" value="12345">save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Item Baru-->
            <?php
            if (empty($result)) {
                echo "Data tidak ada";
            } else {
                foreach ($result as $row) { ?>
                    <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_orderitem.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <input type="hidden" name="kodebarang" value="<?php echo $kodebarang ?>">
                                        <input type="hidden" name="nohp_pelanggan" value="<?php echo $nohp_pelanggan ?>">
                                        <input type="hidden" name="namapelanggan" value="<?php echo $namapelanggan ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="barang" id="">
                                                        <option selected hidden value="">Pilih barang</option>
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
                                                    <label for="barang" for="uploadFoto">Menu Barang</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Menu Barang
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                                                    <label for="floatingInput">Jumlah </label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Jumlah
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan" value="<?php echo $row['catatan'] ?>">
                                                        <label for="floatingPassword">catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="edit_orderitem_validate" value="12345">Save</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Edit-->

                    <!-- Modal Delete-->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_orderitem.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                                        <input type="hidden" name="kodebarang" value="<?php echo $kodebarang ?>">
                                        <input type="hidden" name="nohp_pelanggan" value="<?php echo $nohp_pelanggan ?>">
                                        <input type="hidden" name="namapelanggan" value="<?php echo $namapelanggan ?>">
                                        <div class="col-lg-12">
                                            Apakah anda ingin menghapus data ini?<b><?php echo $row['namabarang'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="delete_orderitem_validate" value="12345">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Delete-->
                <?php
                }
                ?>

                <!-- Modal Bayar-->
                <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <th scope="col">Barang</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Porsi</th>
                                                <th scope="col">Status</th>
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
                                                        <?php echo number_format($row['harga'], 0, ',', '.') ?>
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
                                                        <?php echo number_format($row['biayanya'], 0, ',', '.') ?>
                                                    </td>

                                                </tr>
                                            <?php
                                                $total += $row['biayanya'];
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="5" class="fw-bold">
                                                    Total harga
                                                </td>
                                                <td class="fw-bold">
                                                    <?php echo number_format($total, 0, ',', '.') ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <span class="text-danger fs-5 fw-semibold">Apakah Anda Yakin Ingin Melakukan Pembayaran?</span>
                                <form class="needs-validation" novalidate action="proses/proses_bayar.php" method="POST">
                                    <input type="hidden" name="kodebarang" value="<?php echo $kodebarang ?>">
                                    <input type="hidden" name="nohp_pelanggan" value="<?php echo $nohp_pelanggan ?>">
                                    <input type="hidden" name="namapelanggan" value="<?php echo $namapelanggan ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang" name="uang" required>
                                                <label for="floatingInput">Nominal Uang</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Nominal Uang
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="bayar_validate" value="12345">Bayar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal Bayar-->

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Porsi</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Total</th>
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
                                        <?php echo $row['namabarang'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['biaya'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['biayanya'], 0, ',', '.') ?>
                                    </td>

                                    <td>

                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_list_order'] ?>"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $total += $row['biayanya'];
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="fw-bold">
                                    Total harga
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
            <div>
                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>" data-bs-toggle="modal" data-bs-target="#tambahItem"><i class="bi bi-plus-circle-fill"></i>Item</button>
                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>" data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i> Bayar</button>
            </div>
        </div>
    </div>
</div>

<!--end content-->