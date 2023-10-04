<!--percabangan dengan menggunakan switch-case-->

<html>
    <body>
        <?php 
        $x = 2;     // inisialisasi variabel $x dengan nilai 2 
        switch ($x)
        {
            case 1:
                echo "nomor 1"; break; 
            case 2:
                echo "nomor 2"; break; 
            case 3:
                echo "nomor 3"; break; 
            default:
                echo "bukan nomor diantara 1 dan 3";
        }
        ?>
    </body>
</html>