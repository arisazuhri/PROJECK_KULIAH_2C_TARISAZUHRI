<?php
include "connect.php";
$id_barang = (isset($_POST['id_barang'])) ? htmlentities($_POST['id_barang']) : "";
$name = (isset($_POST['namabarang'])) ? htmlentities($_POST['namabarang']) : "";
$biaya = (isset($_POST['biaya'])) ? htmlentities($_POST['biaya'])  : "";
$tglservis = (isset($_POST['tglservis'])) ? htmlentities($_POST['tglservis']) : "";
$tglselesai_servis = (isset($_POST['tglselesai_servis'])) ? htmlentities($_POST['tglselesai_servis']) : "";

if(!empty($_POST['input_barang_validate'])){
    $select = mysqli_query($conn, "SELECT * FROM tb_daftar_barang WHERE namabarang = '$name'");
    if(mysqli_num_rows($select) > 0){
        $message = '<script>alert("id yang dimasukkan telah ada");
        window.location="../daftarbarang"</script>';
    }else{
    $query = mysqli_query($conn, "UPDATE tb_daftar_barang SET namabarang='$name', biaya='$biaya', tglservis='$tglservis', tglselesai_servis='$tglselesai_servis' WHERE id_barang='$id_barang'");
    if($query){
        $message = '<script>alert("Data berhasil diupdate");
        window.location="../daftarbarang"</script>';

    }else{
        $message = '<script>alert("Data gagal diupdate")
        window.location="../daftarbarang"</script>';
    }
}
}echo $message;
?>
