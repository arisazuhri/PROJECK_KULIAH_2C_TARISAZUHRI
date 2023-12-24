<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$kodebarang = (isset($_POST['kodebarang'])) ? htmlentities($_POST['kodebarang']) : "";
$nohp_pelanggan= (isset($_POST['nohp_pelanggan'])) ? htmlentities($_POST['nohp_pelanggan'])  : "";
$namapelanggan = (isset($_POST['namapelanggan'])) ? htmlentities($_POST['namapelanggan']) : "";

if(!empty($_POST['delete_orderitem_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_list_order WHERE id_list_order = '$id'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../?x=orderitem&order='.$kodebarang.'&nohp_pelanggan='.$nohp_pelanggan.'&namapelanggan='.$namapelanggan.'"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus");  
        window.location="../?x=orderitem&order='.$kodebarang.'&noh_pelanggan='.$nohp_pelanggan.'&namapelanggan='.$namapelanggan.'"</script>';
    }

}echo $message;
?>