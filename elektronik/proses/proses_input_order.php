<?php
session_start();
include "connect.php";
$kodebarang = (isset($_POST['kodebarang'])) ? htmlentities($_POST['kodebarang']) : "";
$nohp_pelanggan = (isset($_POST['nohp_pelanggan'])) ? htmlentities($_POST['nohp_pelanggan'])  : "";
$namapelanggan = (isset($_POST['namapelanggan'])) ? htmlentities($_POST['namapelanggan']) : "";
$alamatpelanggan = (isset($_POST['alamatpelanggan'])) ? htmlentities($_POST['alamatpelanggan']) : "";

if (!empty($_POST['input_order_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE idpelanggan = '$kodebarang'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("order yang dimasukkan telah ada");
        window.location="../order"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_order (idpelanggan,nohp_pelanggan,namapelanggan,alamatpelanggan) values ('$kodebarang','$nohp_pelanggan','$namapelanggan','$alamatpelanggan')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
window.location="../order"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan")</script>';
        }
    }
}
echo $message;
