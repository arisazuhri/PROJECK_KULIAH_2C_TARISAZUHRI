            <?php
            session_start();
            if (isset($_GET['x']) && $_GET['x'] == 'home') {
                $page = "home.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'daftarbarang') {
                $page = "daftarbarang.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'pelanggan') {
                $page = "pelanggan.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
                if ($_SESSION['status_elektronik'] == 1) {
                    $page = "user.php";
                    include "main.php";
                } else {
                    $page = "home.php";
                    include "main.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'laporanharian') {
                if ($_SESSION['status_elektronik'] == 1) {
                    $page = "laporanharian.php";
                    include "main.php";
                } else {
                    $page = "home.php";
                    include "main.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'laporanbulanan') {
                if ($_SESSION['status_elektronik']==1) {
                    $page = "laporanbulanan.php";
                    include "main.php";
                } else {
                    $page = "home.php";
                    include "main.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
                include "login.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
                include "proses/proses_logout.php";
            } else {
                $page = "home.php";
                include "main.php";
            }
            ?>
            