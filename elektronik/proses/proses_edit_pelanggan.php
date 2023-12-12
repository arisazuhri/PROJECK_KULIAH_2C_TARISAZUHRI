<?php
session_start();
include "connect.php";
$kodebarang = (isset($_POST['kodebarang'])) ? htmlentities($_POST['kodebarang']) : "";
$nohp_pelanggan = (isset($_POST['nohp_pelanggan'])) ? htmlentities($_POST['nohp_pelanggan'])  : "";
$namapelanggan = (isset($_POST['namapelanggan'])) ? htmlentities($_POST['namapelanggan']) : "";

if(!empty($_POST['edit_pelanggan_validate'])){ 
    $query = mysqli_query($conn, "UPDATE tb_pelanggan SET nohp_pelanggan='$nohp_pelanggan',namapelanggan='$namapelanggan' WHERE idpelanggan = $kodebarang");
    if($query) {
        $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../pelanggan"</script>';

    } else {
        $message = '<script>alert("Data gagal dimasukkan")
        window.location="../pelanggan"</script>';
    }
}echo $message;
?>