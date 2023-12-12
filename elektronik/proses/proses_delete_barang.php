<?php
include "connect.php";
$id_barang = (isset($_POST['id_barang'])) ? htmlentities($_POST['id_barang']) : "";

if(!empty($_POST['input_barang_validate'])){
    $query = mysqli_query($conn, "DELETE FROM tb_daftar_barang WHERE id_barang = '$id_barang'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../daftarbarang"</script>';
    }else{
        $message = '<script>alert("Data gagal dihapus"); </script>';
    }
}echo $message;
?>