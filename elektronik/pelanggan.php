<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_pelanggan");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>


<!--content-->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman pelanggan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalTambahpelanggan">Tambah daftar pelanggan</button>
                </div>
            </div>
            
            <!-- Modal tambah pelanggan baru -->
            <div class="modal fade" id="ModalTambahpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Daftar Pelanggan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_pelanggan.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $row['kodebarang']?>">
                                            <label for="kodebarang">ID Barang</label>
                                            <div class="invalid-feedback">
                                                masukkan ID Barang
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="nohp_pelanggan" placeholder="nohp_pelanggan" name="nohp_pelanggan" required>
                                            <label for="nohp_pelanggan">no hp</label>
                                            <div class="invalid-feedback">
                                                masukkan no hp.
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
                                            <label for="alamatpelanggan">Alamat</label>
                                            <div class="invalid-feedback">
                                                masukkan Alamat.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="input_pelanggan_validate" value="12345">save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir Modal tambah pelanggan baru -->

            <?php
            if (empty($result)) {
                echo "Data pelanggan tidak ada";
            } else {
                foreach ($result as $row) {
            ?>

                    <!-- Modal Edit barang-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['idpelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit daftar pelanggan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_pelanggan.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input readonly type="text" class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $row['kodebarang'] ?>" readonly>
                                                    <label for="kodebarang">ID Barang</label>
                                                    <div class="invalid-feedback">
                                                        masukkan ID Barang
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="nohp_pelanggan" placeholder="nohp_pelanggan" name="nohp_pelanggan" required value="<?php echo $row['nohp_pelanggan'] ?>">
                                                    <label for="nohp_pelanggan">no hp</label>
                                                    <div class="invalid-feedback">
                                                        masukkan no hp .
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
                                                    <label for="alamatpelanggan">Alamat</label>
                                                    <div class="invalid-feedback">
                                                        masukkan Alamat.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="waktubayar" placeholder="waktubayar" name="waktubayar" required value="<?php echo $row['waktubayar'] ?>">
                                                    <label for="waktubayar">Waktu Bayar</label>
                                                    <div class="invalid-feedback">
                                                        masukkan Waktu Bayar.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="edit_pelanggan_validate" value="12345">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir Modal Edit-->

                    <!-- Modal delete-->
                    <div class="modal fade" id="Modaldelete<?php echo $row['idpelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data pelanggan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_pelanggan.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['idpelanggan'] ?>" name="kodebarang">
                                        <div class="col-lg-12">
                                            apakah anda yakin ingin menghapus id barang dengan nama ? <b><?php echo $row['namapelanggan'] ?> </b> dengan id Barang <b><?php echo $row['kodebarang'] ?> </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="delete_pelanggan_validate" value="12345">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir Modal delete-->

                <?php
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">nama Pelanggan</th>
                                <th scope="col">ID Barang</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">no hp</th>
                                <th scope="col">Harga</th>
                                <th scope="col">riwayat</th>
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
                                        <?php echo $row['namapelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kodebarang'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['alamatpelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nohp_pelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format((int)$row['harga'],0,',','.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['riwayat'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktubayar'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1" href="./?x=itempelanggan&pelanggan=<?php echo $row['idpelanggan'] . "&nohp_pelanggan=" . $row['nohp_pelanggan'] . "&namapelanggan=" . $row['namapelanggan'] ?>"><i class="bi bi-eye"></i></a>
                                        
                                            <button class="<?php echo (!empty($row['id_bayar']))? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['idpelanggan'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            
                                            <button class="<?php echo (!empty($row['id_bayar']))? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#Modaldelete<?php echo $row['idpelanggan'] ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>dibayar</span>" : ""; ?>
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