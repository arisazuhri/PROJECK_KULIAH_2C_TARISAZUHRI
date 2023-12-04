<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark'; ?> " aria-current="page" href="home"><i class="bi bi-house"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'daftarbarang') ? 'active link-light' : 'link-dark'; ?>" href="daftarbarang"><i class="bi bi-journal-text"></i> Daftar Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pelanggan') ? 'active link-light' : 'link-dark'; ?>" href="pelanggan"><i class="bi bi-person-vcard"></i> Pelanggan</a>
                        </li>
                        <?php if($hasil['status']==1){?> 
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light' : 'link-dark'; ?>" href="user"><i class="bi bi-person"></i> User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporanharian') ? 'active link-light' : 'link-dark'; ?>" href="laporanharian"><i class="bi bi-book"></i> Laporan Harian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'laporanbulanan') ? 'active link-light' : 'link-dark'; ?>" href="laporanbulanan"><i class="bi bi-journals"></i> Laporan Bulanan</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>