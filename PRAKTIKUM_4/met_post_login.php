<!--proses input data dengan password menggunakan metode : POST-->
<!--a. untuk membuat inputan, dan beri nama file : met_post_login.php-->

<html>
    <head>
        <title> contoh form dengan POST </title>
    </head>
    <body>
        <form action="proses_login.php"method = "post">
            <h1> untuk halaman login </h1>
            <hr>
            username : <input type="text" name = "username">
            <br>
            password : <input type="password" name = "password">
            <br>
            <input type="submit" value="login">
        </form>
    </body>
</html>