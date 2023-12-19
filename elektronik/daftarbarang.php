<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_barang");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Daftar Barang
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalTambahbarang">Tambah Barang Servis</button>
                </div>
            </div>

            <!-- Modal tambah barang servis -->
            <div class="modal fade" id="ModalTambahbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang Servis</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_barang.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="namabarang" required>
                                            <label for="floatingInput">Nama Barang</label>
                                            <div class="invalid-feedback">
                                                masukkan Nama Barang.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="id_barang" name="id_barang">
                                            <label for="floatingInput">ID Barang</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="biaya" name="biaya">
                                            <label for="floatingInput">BIAYA</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="input_barang_validate" value="12345">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir Modal tambah barang -->

        <?php
        foreach ($result as $row) {
        ?>

            <!-- Modal view-->
            <div class="modal fade" id="ModalView<?php echo $row['id_barang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Barang</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_barang.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="namabarang" value="<?php echo $row['namabarang'] ?>">
                                            <label for="floatingInput">Nama Barang</label>
                                            <div class="invalid-feedback">
                                                masukkan Nama Barang.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="number" name="id_barang" value="<?php echo $row['id_barang'] ?>">
                                            <label for="floatingInput">ID Barang</label>
                                            <div class="invalid-feedback">
                                                masukkan ID Barang.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="number" name="biaya" value="<?php echo $row['biaya'] ?>">
                                            <label for="floatingInput">Biaya</label>
                                            <div class="invalid-feedback">
                                                masukkan biaya.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="number" name="tglservis" value="<?php echo $row['tglservis'] ?>">
                                            <label for="floatingInput">TGL Servis</label>
                                            <div class="invalid-feedback">
                                                masukkan TGL Servis.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="number" name="tglselesai_servis" value="<?php echo $row['tglselesai_servis'] ?>">
                                            <label for="floatingInput">TGL Selesai Servis</label>
                                            <div class="invalid-feedback">
                                                masukkan TGL Selesai Servis.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir Modal view-->


            <!-- Modal Edit-->
            <div class="modal fade" id="ModalEdit<?php echo $row['id_barang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_edit_barang.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_barang'] ?>" name="id_barang">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="namabarang" required value="<?php echo $row['namabarang'] ?>">
                                            <label for="floatingInput">Nama Barang</label>
                                            <div class="invalid-feedback">
                                                masukkan Nama Barang.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="id_barang" name="id_barang" value="<?php echo $row['id_barang'] ?>">
                                            <label for="floatingInput">ID_Barang</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="biaya" name="biaya" value="<?php echo $row['biaya'] ?>">
                                            <label for="floatingInput">Biaya</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="input_barang_validate" value="12345">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir Modal Edit-->


            <!-- Modal delete-->
            <div class="modal fade" id="Modaldelete<?php echo $row['id_barang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data Barang Servis</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_delete_barang.php" method="POST">
                                <input type="hidden" value="<?php echo $row['id_barang'] ?>" name="id_barang">
                                <div class="col-lg-12">
                                    <?php
                                    if ($row['namabarang'] == $_SESSION['username_elektronik']) {
                                        echo "<div class='alert alert-danger'> anda tidak dapat menghapus </div>";
                                    } else {
                                        echo "apakah anda yakin ingin menghapus barang tersebut? <b>$row[namabarang]</b>";
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_barang_validate" value="12345" <?php echo ($row['namabarang'] == $_SESSION['username_elektronik']) ? 'disabled' : ''; ?>>Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir Modal delete-->


        <?php
        }
        if (empty($result)) {
            echo "Data barang tidak ada";
        } else {
        ?>

            <div class="table-responsive mt-2">
                <table class="table table-hover" id="example">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">ID Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">Tgl Servis</th>
                            <th scope="col">Tgl Selesai Servis</th>
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
                                <td><?php echo $row['id_barang'] ?></td>
                                <td><?php echo $row['namabarang'] ?></td>
                                <td><?php echo $row['biaya'] ?></td>
                                <td><?php echo $row['tglservis'] ?></td>
                                <td><?php echo $row['tglselesai_servis'] ?></td>
                                <!--berfungsi untuk menggambil nilai dari database-->
                                <td class="d-flex">
                                    <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id_barang'] ?>"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_barang'] ?>"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#Modaldelete<?php echo $row['id_barang'] ?>"><i class="bi bi-trash3-fill"></i></button>
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