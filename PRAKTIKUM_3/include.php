<!--b. buat file untuk memanggil nama file di atas //include-->



<!DOCTYPE html>
<html lang="en">
<head>
    <title>tarisa_zuhri</title>
</head>
<body>
    <?php
    for ($b = 1; $b < 5; $b++) {
        include("contoh_include.php");
        // include bisa dipanggil lebih dari 1x
    }
    ?>
</body>
</html>