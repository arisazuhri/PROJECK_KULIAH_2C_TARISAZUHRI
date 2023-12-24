<?php
session_start();
include "connect.php";
$kodebarang = (isset($_POST['kodebarang'])) ? htmlentities($_POST['kodebarang']) : "";
$nohp_pelanggan = (isset($_POST['nohp_pelanggan'])) ? htmlentities($_POST['nohp_pelanggan'])  : "";
$namapelanggan = (isset($_POST['namapelanggan'])) ? htmlentities($_POST['namapelanggan']) : "";
$alamatpelanggan = (isset($_POST['alamatpelanggan'])) ? htmlentities($_POST['alamatpelanggan']) : "";

if(!empty($_POST['edit_order_validate'])){ 
    $query = mysqli_query($conn, "UPDATE tb_order SET namapelanggan='$namapelanggan',alamatpelanggan='$alamatpelanggan' WHERE idpelanggan = $kodebarang");
    if($query) {
        $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../order"</script>';

    } else {
        $message = '<script>alert("Data gagal dimasukkan")
        window.location="../order"</script>';
    }
}echo $message;
?>

