<?php
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$passwordlama = (isset($_POST['passwordlama'])) ? md5(htmlentities($_POST['passwordlama'])) : "";
$passwordbaru = (isset($_POST['passwordbaru'])) ? md5(htmlentities($_POST['passwordbaru'])) : "";
$repasswordbaru = (isset($_POST['repasswordbaru'])) ? md5(htmlentities($_POST['repasswordbaru'])) : "";

if (!empty($_POST['ubah_password_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_elektronik]' && password = '$passwordlama'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if ($passwordbaru == $repasswordbaru) {
            $query = mysqli_query($conn, "UPDATE tb_user SET password='$passwordbaru' WHERE username = '$_SESSION[username_elektronik]'");
            if ($query) {
                $message = '<script>alert("password berhasil diubah");
                window.history.back()</script>';
            } else {
                $message = '<script>alert("password gagal diubah");
                window.histori.back()</script>';
            }
        } else {
            $message = '<script>alert("password baru tidak sama");
            window.histori.back()</script>';
        }
    } else {
        $message = '<script>alert("password lama tidak sama");
        window.histori.back()</script>';
    }
}else{
    header('location:../home');
} 
echo $message;
?>