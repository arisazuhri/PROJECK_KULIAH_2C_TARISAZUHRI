<?php
include "connect.php";
$kodebarang = (isset($_POST['kodebarang'])) ? htmlentities($_POST['kodebarang']) : "";

if(!empty($_POST['delete_order_validate'])){
    $select = mysqli_query($conn, "SELECT kodebarang FROM tb_list_order WHERE kodebarang = '$kodebarang'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("order telah memiliki item order, data order ini tidak dapat dihapus");
        window.location="../order"</script>';
    } else {
    $query = mysqli_query($conn, "DELETE FROM tb_order WHERE id_pelanggan = '$kode_order'");
    if($query){
        $message = '<script>alert("Data berhasil dihapus");
        window.location="../order"</script>';

    }else{
        $message = '<script>alert("Data gagal dihapus");  
        window.location="../order"</script>';
    }
}
}echo $message;
?>