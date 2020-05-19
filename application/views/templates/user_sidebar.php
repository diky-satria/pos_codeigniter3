<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                <?php if($this->session->userdata('role_user') == 1): ?>
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link" href="<?php echo base_url() ?>admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                <?php endif; ?>
                    <div class="sb-sidenav-menu-heading">Petugas</div>
                    <a class="nav-link" href="<?php echo base_url() ?>petugas?kode=<?php echo kode_random(10) ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                        Penjualan
                    </a>

                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                        ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Barang
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?php echo base_url() ?>petugas/cek_barang">Cek barang</a>
                            <a class="nav-link" href="<?php echo base_url() ?>petugas/barang_masuk">Barang masuk</a>
                            <a class="nav-link" href="<?php echo base_url() ?>petugas/riwayat_barang_masuk">Riwayat barang masuk</a>
                        </nav>
                    </div> 

                    <a class="nav-link" data-toggle="modal" data-target="#laporan">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                        Laporan
                    </a>
                    <a class="nav-link" href="<?php echo base_url() ?>petugas/ubah_password">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Ubah password
                    </a>
                    <a class="nav-link" data-toggle="modal" data-target="#logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">