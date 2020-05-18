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
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Penjualan
                    </a>
                    <a class="nav-link" data-toggle="modal" data-target="#logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">