<!--percabangan dengan mengunakan if-else-->

<html>
    <body>
        <?php
        date_default_timezone_set("asia/jakarta");
        $d =date("D");
        $date = date("d-m-Y H:i:s");
        if ($d == "mon") {
            $d = "senin";
            echo "selamat belajar <br>";
        } else
            echo "ini hari $d <br>";
        echo $d . "" . $date;
        ?>
    </body>
</html>