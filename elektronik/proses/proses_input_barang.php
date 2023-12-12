<?php
include "connect.php";
$name = (isset($_POST['namabarang'])) ? htmlentities($_POST['namabarang']) : "";
$id_barang = (isset($_POST['id_barang'])) ? htmlentities($_POST['id_barang'])  : "";
$biaya = (isset($_POST['biaya'])) ? htmlentities($_POST['biaya']) : "";
$tglservis = (isset($_POST['tglservis'])) ? htmlentities($_POST['tglservis']) : "";
$tglselesai_servis = (isset($_POST['tglselesai_servis'])) ? htmlentities($_POST['tglselesai_servis']) : "";


if(!empty($_POST['input_barang_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_daftar_barang WHERE id_barang = '$id_barang'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("id yang dimasukkan telah ada");
        window.location="../daftarbarang"</script>';
    }else{
    $query = mysqli_query($conn, "INSERT INTO tb_daftar_barang (namabarang,id_barang,biaya,tglservis,tglselesai_servis) values ('$name','$id_barang','$biaya','$tglservis','$tglselesai_servis')");
    if($query){
        $message = '<script>alert("Data berhasil dimasukkan");
        window.location="../daftarbarang"</script>';

    }else{
        $message = '<script>alert("Data gagal dimasukkan")</script>';
    }
}
}echo $message;
?>