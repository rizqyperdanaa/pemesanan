<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded border mt-2 sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel" style="width: 250px">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light bg-primary' : 'link-dark'; ?>"
                                aria-current="page" href="home.php?x=home"><i class="bi bi-house"></i> Home</a>
                        </li>

                        <?php if ($hasil['level'] == 1 || $hasil['level'] == 2 || $hasil['level'] == 3) {?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'menu') ? 'active link-light bg-primary' : 'link-dark'; ?>"
                                href="home.php?x=menu"><i class="bi bi-list-stars"></i> Menu</a>
                        </li> 
                        <?php } ?> 
                        
                        <?php if ($hasil['level'] == 1 || $hasil['level'] == 3) {?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'pesan') ? 'active link-light bg-primary' : 'link-dark'; ?>"
                                href="home.php?x=pesan"><i class="bi bi-bag"></i> Pesan</a>
                        </li>
                        <?php } ?>

                        <?php if ($hasil['level'] == 1 || $hasil['level'] == 2) {?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'katmenu') ? 'active link-light bg-primary' : 'link-dark'; ?>"
                                href="home.php?x=katmenu"><i class="bi bi-tags"></i> Kategori Menu</a>
                        </li> 
                        <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'olahpesan') ? 'active link-light bg-primary' : 'link-dark'; ?>"
                                    href="home.php?x=olahpesan"><i class="bi bi-file-earmark-text"></i> Pesanan Reseller</a>
                        </li>
                        <?php } ?>

                        <?php
                        if ($hasil['level'] == 1) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light bg-primary' : 'link-dark'; ?>"
                                    href="home.php?x=user"><i class="bi bi-clock-history"></i> User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'report') ? 'active link-light bg-primary' : 'link-dark'; ?>"
                                    href="home.php?x=report"><i class="bi bi-file-earmark-text"></i> Report</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>