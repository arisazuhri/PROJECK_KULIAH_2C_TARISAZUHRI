<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"> Tambah User
                    </button>
                </div>
            </div>
            <!-- Modal tambah user baru -->
            <div class="modal fade" id="modaltambahuser" tabindex="-1" aria-labelledby="modaltambahuser" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--akhir modal tambah user baru-->

            <?php
            if (empty($result)) {
                echo "data user tidak ada";
            } else {
            ?>
                <!-- Modal view -->
                <div class="modal fade" id="modalview" tabindex="-1" aria-labelledby="modalview" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--akhir modal view-->

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    No
                                </th>
                                <th scope="col">
                                    Nama
                                </th>
                                <th scope="col">
                                    Username
                                </th>
                                <th scope="col">
                                    Status
                                </th>
                                <th scope="col">
                                    No hp
                                </th>
                                <th scope="col">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php echo $row['nohp'] ?></td>

                                    <td class="d-flex">
                                        <button class="btn btn-info btn sm me-1" data-bs-toggle="modal" data-bs-target="modalview"> <i class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning btn sm me-1"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn sm"><i class="bi bi-trash3"></i></button>
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