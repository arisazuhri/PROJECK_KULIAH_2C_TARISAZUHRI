<?php
session_start();
include "connect.php";
$kodebarang = (isset($_POST['kodebarang'])) ? htmlentities($_POST['kodebarang']) : "";
$nohp_pelanggan = (isset($_POST['nohp_pelanggan'])) ? htmlentities($_POST['nohp_pelanggan']) : "";
$namapelanggan = (isset($_POST['namapelanggan'])) ? htmlentities($_POST['namapelanggan']) : "";
$barang = (isset($_POST['barang'])) ? htmlentities($_POST['barang']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";
$catatan = (isset($_POST['catatan'])) ? htmlentities($_POST['catatan']) : "";

if (!empty($_POST['input_orderitem_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_list_order WHERE barang = '$barang' && kodebarang='$kodebarang'");
    if (mysqli_num_rows($select) > 0) {
        $message = '<script>alert("Item yang dimasukkan telah ada");
        window.location="../?x=orderitem&order=' . $kodebarang . '&nohp_pelanggan=' . $nohp_pelanggan . '&namapelanggan=' . $namapelanggan . '"</script>';
    } else {
        $query = mysqli_query($conn, "INSERT INTO tb_list_order (barang, kodebarang, jumlah, catatan) values ('$barang','$kodebarang','$jumlah','$catatan')");
        if ($query) {
            $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../?x=orderitem&order=' . $kodebarang . '&nohp_pelanggan=' . $nohp_pelanggan . '&namapelanggan=' . $namapelanggan . '"</script>';
        } else {
            $message = '<script>alert("Data gagal dimasukkan");
        window.location="../?x=orderitem&order=' . $kodebarang . '&nohp_pelanggan=' . $nohp_pelanggan . '&namapelanggan=' . $namapelanggan . '"</script>';
        }
    }
}

echo $message;
?>
