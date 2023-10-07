<!--b. buat file ubtuk memproses variabel, beri nama filenya : proses_login.php-->

<html>
    <head>
        <title> proses input </title>
    </head>
    <body>
        <?php
        $username=$_POST["username"];
        $password=$_POST["password"];
        ?>
        username : <?echo $username?>
        <br>
        password : <?echo $password?>
        <br>
    </body>
</html>