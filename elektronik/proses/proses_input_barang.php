<?php
include "connect.php";
$name = (isset($_POST['namabarang'])) ? htmlentities($_POST['namabarang']) : "";
$id_barang = (isset($_POST['id_barang'])) ? htmlentities($_POST['id_barang'])  : "";
$biaya = (isset($_POST['biaya'])) ? htmlentities($_POST['biaya']) : "";

if(!empty($_POST['input_barang_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_daftar_barang WHERE namabarang = '$name'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("nama barang yang dimasukkan telah ada");
        window.location="../daftarbarang"</script>';
    }else{
    $query = mysqli_query($conn, "INSERT INTO tb_daftar_barang (namabarang,biaya) values ('$name','$biaya')");
    if($query){
        $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../daftarbarang"</script>';

    }else{
        $message = '<script>alert("Data gagal dimasukkan")</script>';
    }
}
}echo $message;
?>
