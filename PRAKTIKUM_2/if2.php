<!--percabangan dengan menggunakan if-elseif-else -->

<html>
    <body>
        <?php
        $d=date("D");         //menggunakan format "D" untuk mendapatkan hari dalam 3 huruf
        if ($d=="sat")
        echo "selamat berakhir pekan!";
        elseif ($d=="Fri")
        echo "selamat menunaikan sholat jum'at bagi yang muslim!"; 
        else
        echo "selamat belajar!";
        ?>
    </body>
</html>