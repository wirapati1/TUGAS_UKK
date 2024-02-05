<div class="col-auto  col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <a href="dashboard.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Menu</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house text-white"></i> <span
                        class="ms-1 text-white d-none d-sm-inline">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="detail_pembelians.php  " class="nav-link align-middle px-0">
                    <i class="fs-4 bi-bag-check text-white"></i> <span
                        class="ms-1 text-white d-none d-sm-inline">pembelian</span>
                </a>
            </li>
           
            <li class="nav-item">
                <a href="data_pelanggan.php" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-person text-white"></i> <span
                        class="ms-1 text-white d-none d-sm-inline">Pelanggan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="data_produk.php" class="nav-link align-middle px-0">
                    <i class="fs-4  bi-box-seam text-white"></i> <span
                        class="ms-1 text-white d-none d-sm-inline">Produk</span>
                </a>
            </li>
            <?php 
            if ($_SESSION['level']=='admin') {
                # code...
                echo "  <li>
                <a href='data_petugas.php' class='nav-link px-0 align-middle'>
                    <i class='fs-4 bi-people text-white'></i> <span class='ms-1 text-white d-none d-sm-inline'>Petugas</span>
                </a>
            </li>";
            }
            ?>
            <li class="nav-item">
                <a href="logout.php" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house text-white"></i> <span
                        class="ms-1 text-white d-none d-sm-inline">Keluar</span>
                </a>
            </li>

        </ul>
        <hr>

    </div>
</div>