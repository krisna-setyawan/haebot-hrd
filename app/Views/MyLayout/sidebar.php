<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu div-menu">
            <div class="nav">
                <br>
                <small class="my-0 ms-3 text-secondary">Core</small>
                <a class="nav-link" href="<?= base_url() ?>/beranda">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-gauge"></i>
                    </div>
                    Dashboard
                </a>
                <a class="nav-link" href="<?= base_url() ?>/menu/data_master">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-regular fa-folder-open"></i>
                    </div>
                    Data Master
                </a>

                <br>

                <small class="my-0 ms-3 text-secondary">Transaction</small>
                <a class="nav-link" href="<?= base_url() ?>/menu/pembelian">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-circle-down"></i>
                    </div>
                    Pembelian
                </a>
                <a class="nav-link" href="<?= base_url() ?>/menu/penjualan">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-circle-up"></i>
                    </div>
                    Penjualan
                </a>
                <a class="nav-link" href="<?= base_url() ?>/menu/produksi">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-list-check"></i>
                    </div>
                    Produksi
                </a>

                <br>

                <small class="my-0 ms-3 text-secondary">Assets</small>
                <a class="nav-link" href="<?= base_url() ?>/menu/gudang">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-warehouse"></i>
                    </div>
                    Gudang
                </a>
                <a class="nav-link" href="<?= base_url() ?>/menu/inventaris">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-table-list"></i>
                    </div>
                    Inventaris
                </a>

                <br>

                <small class="my-0 ms-3 text-secondary">Management</small>
                <a class="nav-link" href="<?= base_url() ?>/menu/akuntansi">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-calculator"></i>
                    </div>
                    Akuntansi
                </a>
                <a class="nav-link" href="<?= base_url() ?>/menu/sdm">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-user-group"></i>
                    </div>
                    SDM
                </a>
                <a class="nav-link" href="<?= base_url() ?>/menu/laporan">
                    <div class="sb-nav-link-icon">
                        <i class="fa-fw fa-solid fa-chart-simple"></i>
                    </div>
                    Laporan
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer py-1">
            <div class="small">Masuk sebagai :</div>
            <?= user()->name ?>
        </div>
    </nav>
</div>