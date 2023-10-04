<!--perpindahan dengan menggunakan break (berfungsi memaksa perulangan berhenti dan melanjutkan program setelah perulangan)-->

<html>
    <body>
        <?php
        //melakukan break pada $i == 2 //
        for($i = 0; $i<5; $i++)
        {
            if($i == 2)
            {
                break;
            }
            echo ("nilai i : $i <br>");
        }
        echo("loop selesai");
        ?>
    </body>
</html>