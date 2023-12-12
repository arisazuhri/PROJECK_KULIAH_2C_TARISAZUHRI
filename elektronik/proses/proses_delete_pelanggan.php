<?php
include "connect.php";
$kodebarang = (isset($_POST['kodebarang'])) ? htmlentities($_POST['kodebarang']) : "";

if(!empty($_POST['delete_pelanggan_validate'])){
    $select = mysqli_query($conn, "SELECT kodebarang FROM tb_list_pelanggan WHERE kodebarang = '$kodebarang'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("pelanggan telah memiliki item pelanggan, data pelanggan ini tidak dapat dihapus");
        window.location="../pelanggan"</script>';
    } else {
    $query = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE idpelanggan = '$kodebarang'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../pelanggan"</script>';

    }else{
        $message = '<script>alert("Data gagal dihapus");  
        window.location="../pelanggan"</script>';
    }
}
}echo $message;
?>