            <?php
            session_start();
            if (isset($_GET['x']) && $_GET['x'] == 'home') {
                $page = "home.php";
                include "main.php";

            } elseif (isset($_GET['x']) && $_GET['x'] == 'pelanggan') {
                if ($_SESSION['status_elektronik'] == 1 || $_SESSION['status_elektronik'] == 2) {
                $page = "pelanggan.php";
                include "main.php";
            } else {
                $page = "home.php";
                include "main.php";
            } 

        } elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
            if ($_SESSION['status_elektronik'] == 1) {
                $page = "user.php";
                include "main.php";
            } else {
                $page = "home.php";
                include "main.php";
            }


        } elseif (isset($_GET['x']) && $_GET['x'] == 'daftarbarang') { //ambil punya order
            if ($_SESSION['status_elektronik'] == 1 || $_SESSION['status_elektronik'] == 2) {
                $page = "daftarbarang.php";
                include "main.php";
            } else {
                $page = "home.php";
                include "main.php";
            }

                
            } elseif (isset($_GET['x']) && $_GET['x'] == 'itempelanggan') { //pasangan pelanggan
                if ($_SESSION['status_elektronik'] == 1 || $_SESSION['status_elektronik'] == 2) {
                $page = "item_pelanggan.php";
                include "main.php";
            } else {
                $page = "home.php";
                include "main.php";
            }

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

            } elseif (isset($_GET['x']) && $_GET['x'] == 'viewitem') {
                if ($_SESSION['level_decafe'] == 1) {
                $page = "view_item.php";
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