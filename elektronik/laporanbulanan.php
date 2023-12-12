<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Report Bulanan
        </div>
        <div class="card-body">
            <?php
            if (empty($result)) {
                echo "Data keuntungan dan kerugian tidak ada";
            } else {
                foreach ($result as $row) {
            ?>

                <?php
                }
                ?>

                <div class="table-responsive mt-2">
                    <table class="table table-hover"id="example">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">keuntungan</th>
                                <th scope="col">kerugian</th>
                                <th scope="col">bulan</th>
                                <th scope="col">tahun</th>
                                <th scope="col">Total</th>
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
                                        <?php echo $row['id_barang'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_perbaikan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_bayar'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['pelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nohp'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format((int)$row['harganya'], 0, ',', '.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1" href="./?x=viewitem&order=<?php echo $row['id_barang'] . "&nohp=" . $row['nohp'] . "&pelanggan=" . $row['pelanggan'] ?>"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-warning btn-sm me-1" href="./?x=viewitem&order=<?php echo $row['id_barang'] . "&nohp=" . $row['nohp'] . "&pelanggan=" . $row['pelanggan'] ?>"><i class="bi bi-pencil-square"></i></a>

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