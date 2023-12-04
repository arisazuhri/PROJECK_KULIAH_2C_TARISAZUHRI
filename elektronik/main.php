<?php
//session_start();
if (empty($_SESSION['username_elektronik'])) {
    header('location:login');
}
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_elektronik]'");
$hasil = mysqli_fetch_array($query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elektronik - Aplikasi Servis Elektronik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="height: 3000px">
    <!--haeder-->
    <?php include "haeder.php"; ?>
    <!--akhir haeder-->

    <div class="container-lg">
        <div class="row">
            <!--sidebar-->
            <?php include "sidebar.php"; ?>
            <!--akhir sidebar-->

            <!--content-->
            <?php
            include $page;
            ?>
            <!--akhir content-->
        </div>

        <div class="fixed-bottom text-center bg-secondary text-dark py-2">
            Copyright 2023 Toko Elektronik
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>