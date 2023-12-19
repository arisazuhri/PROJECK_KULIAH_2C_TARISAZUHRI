<?php
include "proses/connect.php";
date_default_timezone_set('asia/jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*, tb_bayar.*, SUM(harga * jumlah) AS harganya 
    FROM tb_order 
    LEFT JOIN tb_list_order ON tb_list_order.kodebarang = tb_order.idpelanggan
    LEFT JOIN tb_daftar_barang ON tb_daftar_barang.id_barang = tb_list_order.barang 
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.idpelanggan
    GROUP BY tb_order.idpelanggan, tb_bayar.id_bayar 
    ORDER BY tb_order.waktubayar DESC");

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
//$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>


<!--content-->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Pelanggan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalTambahpelanggan">Tambah Daftar Pelanggan</button>
                </div>
            </div>

            <!-- Modal tambah pelanggan baru -->
            <div class="modal fade" id="ModalTambahpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Servis pelanggan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_order.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="uploadfoto" name="kodebarang" value="<?php echo date('ymdHi') . rand(100, 999) ?>" readonly>
                                            <label for="uploadfoto">kode Barang</label>
                                            <div class="invalid-feedback">
                                                masukkan kode Barang
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="nohp_pelanggan" placeholder="nohp_pelanggan" name="nohp_pelanggan" required>
                                            <label for="nohp_pelanggan">nohp pelanggan</label>
                                            <div class="invalid-feedback">
                                                masukkan nohp pelanggan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="namapelanggan" placeholder="namapelanggan" name="namapelanggan" required>
                                            <label for="namapelanggan">nama pelanggan</label>
                                            <div class="invalid-feedback">
                                                masukkan nama pelanggan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="alamatpelanggan" placeholder="alamatpelanggan" name="alamatpelanggan" required>
                                            <label for="alamatpelanggan">Alamat Pelanggan</label>
                                            <div class="invalid-feedback">
                                                masukkan Alamat Pelanggan.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="input_order_validate" value="12345">save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir Modal tambah pelanggan baru -->

            <?php
            if (empty($result)) {
                echo "Data pelanggan yang dimasukkan belum ada";
            } else {
                foreach ($result as $row) {
            ?>

                    <!-- Modal Edit pelanggan-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['idpelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Daftar Pelanggan dan id Barang</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_order.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input readonly type="number" class="form-control" id="uploadfoto" name="kodebarang" value="<?php echo $row['id_barang'] ?>" readonly>
                                                    <label for="uploadfoto">kode Barang</label>
                                                    <div class="invalid-feedback">
                                                        masukkan kode Barang
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="nohp_pelanggan" placeholder="nohp_pelanggan" name="nohp_pelanggan" required value="<?php echo $row['nohp_pelanggan'] ?>">
                                                    <label for="nohp_pelanggan">No Hp Pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        masukkan No Hp Pelanggan.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="namapelanggan" placeholder="namapelanggan" name="namapelanggan" required value="<?php echo $row['namapelanggan'] ?>">
                                                    <label for="namapelanggan">nama pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        masukkan nama pelanggan.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="alamatpelanggan" placeholder="alamatpelanggan" name="alamatpelanggan" required value="<?php echo $row['alamatpelanggan'] ?>">
                                                    <label for="alamatpelanggan">Alamat pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        masukkan Alamat pelanggan.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="edit_order_validate" value="12345">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir Modal Edit pelanggan-->

                    <!-- Modal delete pelanggan-->
                    <div class="modal fade" id="Modaldelete<?php echo $row['idpelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data pelanggan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_order.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['idpelanggan'] ?>" name="kodebarang">
                                        <div class="col-lg-12">
                                            apakah anda yakin ingin menghapus orderan dengan nama ? <b><?php echo $row['namapelanggan'] ?> </b> dengan kode orderan <b><?php echo $row['idpelanggan'] ?> </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-secondary" name="delete_order_validate" value="12345">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir Modal delete pelanggan-->

                <?php
                }
                ?>
                <div class="table-responsive mt-2">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">ID Pelanggan</th>
                                <th scope="col">Nama Pelanggan</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Alamat Pelanggan</th>
                                <th scope="col">NoHp Pelanggan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Riwayat</th>
                                <th scope="col">Waktu Bayar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td>
                                        <?php echo $row['idpelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['namapelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['alamatpelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format((int)$row['harganya'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nohp_pelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['harga'] ?>
                                    </td>
                                    <td>
                                        <?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>dibayar</span>" : ""; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_bayar'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1" href="./?x=viewitem&order=<?php echo $row['idpelanggan'] . "&nohp_pelanggan=" . $row['nohp_pelanggan'] . "&namapelanggan=" . $row['namapelanggan'] . "&alamatpelanggan=" . $row['alamatpelanggan'] ?>"><i class="bi bi-eye"></i></a>

                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['idpelanggan'] ?>"><i class="bi bi-pencil-square"></i></button>

                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#Modaldelete<?php echo $row['idpelanggan'] ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
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