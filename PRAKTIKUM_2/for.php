<!--perulangan dengan memakai for-->

<html>
    <body>
        <?php
        echo "mencari jumlah huruf vokal dalam suatu kata";
         echo "<br>"; // ganti baris//
         $jumlah = 0;
         $kata="belajar PHP"; //suatu kata //
         $huruf="a"; //huruf vokal yang dicari bisa huruf a,i,u,e,o//
         for($i=0; $i<strlen($kata); $i++)
         {
            if(substr($kata, 1) == $huruf)
            {
                $jumlah ++;
            } 
         }   
         echo "jumlah huruf" . $huruf . "dalam kata" .
         $kata . " : "; echo "<br>"; echo $jumlah;
         ?>
        </body>
</html>