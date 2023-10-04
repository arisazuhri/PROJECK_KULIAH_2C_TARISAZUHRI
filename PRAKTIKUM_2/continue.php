<!--perpindahan dengan menggunakan continue (berfungsi melewati satu kali putaran pada perulangan)-->

<html>
    <body>
        <?php
        // melakukan continue pada $i == 2 //
        for($i = 0; $i<5; $i++)
        {
            if($i == 2)
            {
                continue;
            }
            echo("nilai i : $i<br>");
        }
        echo("loop selesai");
        ?>
    </body>
</html>