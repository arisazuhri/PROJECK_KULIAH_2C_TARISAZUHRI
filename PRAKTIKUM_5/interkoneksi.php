<!--nomor 1-->

<html>
    <head>
        <title>koneksi database mySQL</title>
    </head>
    <body>
        <h1>demo koneksi database mySQL</h1>
        <?php
        $conn=mysqli_connect("localhost","root","");
        if ($conn){
            echo "server terkoneksi";
        } else {
            echo "server tidak terkoneksi";
        }
        ?>
    </body>
</html>