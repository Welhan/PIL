<?php
$menu = generateMenu(session('ID'));
$topmenu = generateOtherMenu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PT. Pindad International Logistics</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <!-- Bootstrap 5 CSS -->
    <link href="assets/bootstrap-5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Admin LTE CSS -->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light" style="background-color: #D5F5E3">
        <!-- Navbar Brand-->
        <nav class="navbar text-center">
            <a class="navbar-brand" href="/">
                <span class="logo"></span>
            </a>
        </nav>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <?php if ($topmenu) : ?>
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-gear fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <?php foreach ($topmenu as $top) : ?>
                            <li><a class="dropdown-item" href="<?= $top->Link; ?>"><i class="<?= $top->Icon; ?>"></i> <?= ucwords($top->Submenu); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        <?php endif; ?>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion" style="background-color: #D5F5E3">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="sb-sidenav-footer nav-link" href="/profile">
                            <img class="sb-nav-link-icon" src="assets/assets/img/default.png" width="25px" height="25px" alt="User Profile Picture">
                            <?= session('Name'); ?><br> <?= session('Email'); ?> <br><?= session('Divisi'); ?>
                        </a>
                        <?php foreach ($menu as $m) : ?>
                            <div class="sb-sidenav-menu-heading"><?= $m->Menu; ?></div>
                            <?php $submenu = generateSubmenu($m->MenuID, session('ID')); ?>
                            <?php foreach ($submenu as $s) : ?>
                                <a class="nav-link <?= ($s->ID == $active) ? 'active' : ''; ?>" href="<?= $s->Link; ?>">
                                    <div class="sb-nav-link-icon"><i class="<?= $s->Icon; ?>"></i></div>
                                    <?= ucwords($s->Submenu); ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer d-flex justify-content-center" style="background-color: #D5F5E3">
                    <button type="button" class="text-center shadow col-lg-8 btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>Log Out</span>
                    </button>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"><?= $title; ?></h1>

                    <?= $this->renderSection('content') ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary-subtle">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Logout?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/logout" method="post">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/assets/demo/chart-area-demo.js"></script>
    <script src="assets/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>

    <?= $this->renderSection('javascript'); ?>
</body>

</html>