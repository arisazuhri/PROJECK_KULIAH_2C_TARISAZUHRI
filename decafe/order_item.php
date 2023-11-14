<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya FROM tb_list_order 
LEFT JOIN tb_order ON tb_order.id_order = tb_list_order.kode_order
LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu 
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order 
GROUP BY id_list_order
HAVING tb_list_order.kode_order = $_GET[order]");

$kode = $_GET['order'];
$meja = $_GET['meja'];
$pelanggan = $_GET['pelanggan'];

while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
    //  $kode = $record['id_order'];
    //  $meja = $record['meja'];
    //  $pelanggan = $record['pelanggan'];
}
$select_menu = mysqli_query($conn, "SELECT id,nama_menu FROM tb_daftar_menu");
?>


<!--content-->
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman order item
        </div>
        <div class="card-body">
            <a href="order" class="btn btn-info mb-3"><i class="bi bi-arrow-left-square-fill"></i></a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodeorder" value="<?php echo $kode; ?>">
                        <label for="uploadfoto">kode order</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="meja" value="<?php echo $meja; ?>">
                        <label for="uploadfoto">Meja</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="pelanggan" value="<?php echo $pelanggan; ?>">
                        <label for="uploadfoto">pelanggan</label>
                    </div>
                </div>
            </div>

            <!-- Modal tambah item baru -->
            <div class="modal fade" id="tambahitem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah mennu makanan dan minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_orderitem.php" method="POST">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="menu" id="">
                                                <option selected hidden value="">pilih menu</option>
                                                <?php
                                                foreach ($select_menu as $value) {
                                                    echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="menu">menu makanan / minuman</label>
                                            <div class="invalid-feedback">
                                                pilih menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="jumlah porsi" name="jumlah" required>
                                            <label for="floatingInput">jumlah porsi</label>
                                            <div class="invalid-feedback">
                                                masukkan jumlah porsi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="catatan" name="catatan">
                                            <label for="floatingpassword">catatan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="input_orderitem_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir Modal tambah item baru -->

            <?php
            if (empty($result)) {
                echo "Data menu makanan dan minuman tidak ada";
            } else {
                foreach ($result as $row) {
            ?>

                    <!-- Modal Edit-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah menu makanan dan minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_orderitem.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="menu" id="">
                                                        <option selected hidden value="">pilih menu</option>
                                                        <?php
                                                        foreach ($select_menu as $value) {
                                                            if ($row['menu'] == $value['id']) {
                                                                echo "<option selected value=$value[id]>$value[nama_menu]</option>";
                                                            } else {
                                                                echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="menu">menu makanan / minuman</label>
                                                    <div class="invalid-feedback">
                                                        pilih menu
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="jumlah porsi" name="jumlah" required value="<?php echo $row['jumlah'] ?>">
                                                    <label for="floatingInput">jumlah porsi</label>
                                                    <div class="invalid-feedback">
                                                        masukkan jumlah porsi.
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
                                            <button type="submit" class="btn btn-primary" name="edit_orderitem_validate" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah menu makanan dan minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['nama_menu'] ?>">
                                                    <label for="floatingInput">nama menu</label>
                                                    <div class="invalid-feedback">
                                                        masukkan nama menu.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingpassword">keterangan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="Default select example">
                                                        <option selected hidden value="">pilih kategori_menu</option>
                                                        <?php
                                                        foreach ($select_kat_menu as $value) {
                                                            if ($row['kategori'] == $value['id_kat_menu']) {
                                                                echo "<option selected value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                                            } else {

                                                                echo "<option value=" . $value['id_kat_menu'] . ">$value[kategori_menu]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">kategori makanan atau minuman</label>
                                                    <div class="invalid-feedback">
                                                        pilih kategori makanan atau minuman.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga'] ?>">
                                                    <label for="floatingInput">Harga</label>
                                                    <div class="invalid-feedback">
                                                        masukkan harga
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['stok'] ?>">
                                                    <label for="floatingInput">Stok</label>
                                                    <div class="invalid-feedback">
                                                        masukkan stok
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama'] ?>">
                                                    <label for="floatingInput">Nama</label>
                                                    <div class="invalid-feedback">
                                                        masukkan Nama.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['username'] ?>">
                                                    <label for="floatingInput">Username</label>
                                                    <div class="invalid-feedback">
                                                        masukkan Username.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="default select example" required name="level" id="">
                                                        <?php
                                                        $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                                        foreach ($data as $key => $value) {
                                                            if ($row['level'] == $key + 1) {
                                                                echo "<option selected value='$key'>$value</option>";
                                                            } else {
                                                                echo "<option value='$key'>$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Level User</label>
                                                    <div class="invalid-feedback">
                                                        pilih level user.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                    <label for="floatingInput">No HP</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <textarea disabled class="form-control" id="" style="height:100px" name="alamat">
                                    <?php echo $row['alamat'] ?></textarea>
                                            <label for="floatinginput">Alamat</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required value="<?php echo $row['nama'] ?>">
                                                    <label for="floatingInput">Nama</label>
                                                    <div class="invalid-feedback">
                                                        masukkan Nama.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input <?php echo ($row['username'] == $_SESSION['username_decafe']) ? 'disabled' : ''; ?>type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required value="<?php echo $row['username'] ?>">
                                                    <label for="floatingInput">Username</label>
                                                    <div class="invalid-feedback">
                                                        masukkan Username.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" aria-label="default select example" required name="level" id="">
                                                        <?php
                                                        $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                                        foreach ($data as $key => $value) {
                                                            if ($row['level'] == $key + 1) {
                                                                echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                            } else {
                                                                echo "<option value=" . ($key + 1) . ">$value</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="floatingInput">Level User</label>
                                                    <div class="invalid-feedback">
                                                        pilih level user.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" id="floatingInput" placeholder="08xxxx" name="nohp" value="<?php echo $row['nohp'] ?>">
                                                    <label for="floatingInput">No HP</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" id="" style="height:100px" name="alamat">
                                    <?php echo $row['alamat'] ?></textarea>
                                            <label for="floatinginput">Alamat</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir Modal Edit-->


                    <!-- Modal delete-->
                    <div class="modal fade" id="Modaldelete<?php echo $row['id_list_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_orderitem.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id_list_order'] ?>" name="id">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <div class="col-lg-12">
                                            apakah anda yakin ingin menghapus menu ? <b><?php echo $row['nama_menu'] ?> </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_orderitem_validate" value="12345">Delete</button>
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


                <!-- Modal bayar-->
                <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">PEMBAYARAN</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th scope="col">menu</th>
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
                                                        <?php echo $row['nama_menu'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($row['harga'], 0, ',', '.')  ?>
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
                                <span class="text-danger fs-5 fw-semibold">apakah anda yakin ingin melakukan pembayaran ?</span>
                                <form class="needs-validation" novalidate action="proses/proses_bayar.php" method="POST">
                                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                    <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang" name="uang" required>
                                                <label for="floatingInput">Nominal Uang</label>
                                                <div class="invalid-feedback">
                                                    masukkan Nominal Uang.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="bayar_validate" value="12345">BAYAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir Modal bayar-->


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">menu</th>
                                <th scope="col">harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">catatan</th>
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
                                        <?php echo $row['nama_menu'] ?>
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
                                            echo "<span class='badge text-bg-warning'>masuk ke dapur</span>";
                                        } else if ($row['status'] == 2) {
                                            echo "<span class='badge text-bg-primary'>siap saji</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harganya'], 0, ',', '.')  ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_list_order'] ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1"; ?>" data-bs-toggle="modal" data-bs-target="#Modaldelete<?php echo $row['id_list_order'] ?>"><i class="bi bi-trash3-fill"></i></button>
                                        </div>
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
            <div>
                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?>" data-bs-toggle="modal" data-bs-target="#tambahitem"><i class="bi bi-plus-circle-fill"></i> item</button>
                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?>" data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i> Bayar</button>
            </div>
        </div>
    </div>
</div>


<!--end content-->