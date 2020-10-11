<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Font awesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- SBadmin2-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

    <!-- Summernote -->
    <link href="<?= base_url('assets/css/summernote.css') ?>" rel="stylesheet">

    <!-- datatables css-->
    <link href="<?= base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">


    <!-- jquery -->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>

    <!-- summernote js -->
    <script src="<?= base_url('assets/js/summernote.min.js') ?>"></script>

    <!-- datatables js-->
    <script src="<?= base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand bg-gradient-warning text-gray-100 d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">
                    Himti Dashboard
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- hak akses superadmin -->
            <?php if ($this->session->userdata('level') == 'superadmin') : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Data master</span>
                    </a>
                    <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 text-capitalize collapse-inner rounded">
                            <h6 class="collapse-header">Sub - menu data master</h6>
                            <a class="collapse-item" href="data-anggota">
                                Data anggota
                            </a>
                            <a class="collapse-item" href="<?= site_url('data-divisi') ?>">Data Divisi</a>
                            <a class="collapse-item" href="<?= site_url('data-tahun-angkatan') ?>">
                                Data tahun angkatan
                            </a>
                            <a class="collapse-item" href="<?= site_url('data-peminatan') ?>">
                                Data peminatan
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Artikel</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 text-capitalize collapse-inner rounded">
                            <h6 class="collapse-header">Sub - menu Artikel</h6>
                            <a class="collapse-item" href="<?= site_url('add-artikel') ?>">
                                Tambah artikel
                            </a>
                            <a class="collapse-item" href="<?= site_url('list-artikel') ?>">
                                List Artikel
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTiga" aria-expanded="true" aria-controls="collapseTiga">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Events</span>
                    </a>
                    <div id="collapseTiga" class="collapse" aria-labelledby="headingTiga" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 text-capitalize collapse-inner rounded">
                            <h6 class="collapse-header">Sub - menu Events</h6>
                            <a class="collapse-item" href="<?= site_url('add-events') ?>">
                                Tambah Events
                            </a>
                            <a class="collapse-item" href="<?= site_url('list-events') ?>">
                                List Events
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-info-circle"></i>
                        <span>Tentang Himti</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white text-capitalize py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Sub-menu Tentang Himti:</h6>
                            <a class="collapse-item" href="<?= site_url('visi-misi') ?>">Visi Misi</a>
                            <a class="collapse-item" href="<?= site_url('data-struktural') ?>">Struktural</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmpat" aria-expanded="true" aria-controls="collapseEmpat">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Pengaturan</span>
                    </a>
                    <div id="collapseEmpat" class="collapse" aria-labelledby="headingEmpat" data-parent="#accordionSidebar">
                        <div class="bg-white text-capitalize py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Sub-menu Pengaturan:</h6>
                            <a class="collapse-item" href="<?= site_url('setting-home') ?>">Home</a>
                            <a class="collapse-item" href="<?= site_url('setting-carousel') ?>">Carousel</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLima" aria-expanded="true" aria-controls="collapseLima">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Modul</span>
                    </a>
                    <div id="collapseLima" class="collapse" aria-labelledby="headingLima" data-parent="#accordionSidebar">
                        <div class="bg-white text-capitalize py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Sub-menu Modul:</h6>
                            <a class="collapse-item" href="<?= site_url('add-modul') ?>">Upload modul</a>
                            <a class="collapse-item" href="<?= site_url('list-modul') ?>">List Modul</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('list-pengguna') ?>">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Data Pengguna</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-fw fa-images"></i>
                        <span>Galery</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('list-calon-anggota') ?>">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>calon anggota</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('list-peserta') ?>">
                        <i class="fas fa-fw fa-fingerprint"></i>
                        <span>Talkshow Data Security</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            <?php endif; ?>
            <!-- akhir hak akses superadmin -->

            <!-- hak akses admin -->
            <?php if ($this->session->userdata('level') == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('list-pengguna') ?>">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>Data Pengguna</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLima" aria-expanded="true" aria-controls="collapseLima">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Modul</span>
                    </a>
                    <div id="collapseLima" class="collapse" aria-labelledby="headingLima" data-parent="#accordionSidebar">
                        <div class="bg-white text-capitalize py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Sub-menu Modul:</h6>
                            <a class="collapse-item" href="<?= site_url('add-modul') ?>">Upload modul</a>
                            <a class="collapse-item" href="<?= site_url('list-modul') ?>">List Modul</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Artikel</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 text-capitalize collapse-inner rounded">
                            <h6 class="collapse-header">Sub - menu Artikel</h6>
                            <a class="collapse-item" href="<?= site_url('add-artikel') ?>">
                                Tambah artikel
                            </a>
                            <a class="collapse-item" href="<?= site_url('list-artikel') ?>">
                                List Artikel
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTiga" aria-expanded="true" aria-controls="collapseTiga">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Events</span>
                    </a>
                    <div id="collapseTiga" class="collapse" aria-labelledby="headingTiga" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 text-capitalize collapse-inner rounded">
                            <h6 class="collapse-header">Sub - menu Events</h6>
                            <a class="collapse-item" href="<?= site_url('add-events') ?>">
                                Tambah Events
                            </a>
                            <a class="collapse-item" href="<?= site_url('list-events') ?>">
                                List Events
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-fw fa-images"></i>
                        <span>Galery</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('list-calon-anggota') ?>">
                        <i class="fas fa-fw fa-user-cog"></i>
                        <span>calon anggota</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            <?php endif; ?>
            <!-- akhir hak akses admin -->

            <!-- hak akses penulis -->
            <?php if ($this->session->userdata('level') == 'penulis') : ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-newspaper"></i>
                        <span>Artikel</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 text-capitalize collapse-inner rounded">
                            <h6 class="collapse-header">Sub - menu Artikel</h6>
                            <a class="collapse-item" href="<?= site_url('add-artikel') ?>">
                                Tambah artikel
                            </a>
                            <a class="collapse-item" href="<?= site_url('list-artikel') ?>">
                                List Artikel
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTiga" aria-expanded="true" aria-controls="collapseTiga">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Events</span>
                    </a>
                    <div id="collapseTiga" class="collapse" aria-labelledby="headingTiga" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 text-capitalize collapse-inner rounded">
                            <h6 class="collapse-header">Sub - menu Events</h6>
                            <a class="collapse-item" href="<?= site_url('add-events') ?>">
                                Tambah Events
                            </a>
                            <a class="collapse-item" href="<?= site_url('list-events') ?>">
                                List Events
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-fw fa-images"></i>
                        <span>Galery</span></a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            <?php endif; ?>
            <!-- akhir hak akses penulis -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?= $this->session->userdata('level') ?>
                                    |
                                    <?= $this->session->userdata('nama') ?>
                                </span>
                                <i class="img-profile fas fa-fw fa-user fa-2x"> </i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= site_url('ubah-pass') ?>">
                                    <i class="fas fa-key fa-sm fa-fw mr-2"></i>
                                    Ganti password
                                </a>
                                <a href="" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?php $this->load->view($konten) ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= site_url('logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>