<!--pemprosesan buku tamu dengan metode : POST-->
<!--untuk membuat inputan, dan beri nama file : bukutamu.php-->

<html>
    <head>
        <title> contoh form dengan post </title>
    </head>
    <body>
        <h1> Buku Tamu </h1>
        komentar dan saran sangat kami butuhkan untuk meningkatkan kualitas situs kami.
        <hr>
        <form action="proses_bukutamu.php" method="post">
            <pre>
                nama anda : <input type="text" name="nama" size="25" maxlength="50">
                email address : <input type="text" name="email" size="25" maxlength="50">
                komentar : <textarea name="komentar" cols="40" rows="5"></textarea>
                <input type="submit" value="kirim">
                <input type="reset" value="ulangi">
            </pre>
        </form>
    </body>
</html>