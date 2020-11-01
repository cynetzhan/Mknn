
<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>{tittle}</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->

        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="<?= base_url() ?>assets/css/codebase.min.css">

        

        <!-- END Stylesheets -->
        <script src="<?= base_url() ?>assets/js/codebase.core.min.js"></script>

        <!-- Sweetalert -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/sweetalert2/dist/sweetalert2.min.css">
        <script src="<?= base_url() ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
       

    </head>
    <body>

        <!-- Page Container -->
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
        
            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow px-15">
                        <!-- Mini Mode -->
                        <div class="content-header-section sidebar-mini-visible-b">
                            <!-- Logo -->
                            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                            <!-- END Logo -->
                        </div>
                        <!-- END Mini Mode -->

                        <!-- Normal Mode -->
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Sidebar -->

                            <!-- Logo -->
                            <div class="content-header-item">
                                <a class="link-effect font-w700" href="">
                                    <i class="si si-bar-chart text-primary"></i>
                                    <span class="font-size-xl text-dual-primary-dark">SIPIL</span><span class="font-size-xl text-primary">Jur</span>
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Side User -->
                    <div class="content-side content-side-full content-side-user px-10 align-parent">
                        <!-- Visible only in mini mode -->
                        <div class="sidebar-mini-visible-b align-v animated fadeIn">
                            <img class="img-avatar img-avatar32" src="<?= base_url() ?>assets/media/avatars/avatar15.jpg" alt="">
                        </div>
                        <!-- END Visible only in mini mode -->

                        <!-- Visible only in normal mode -->
                        <div class="sidebar-mini-hidden-b text-center">
                            <a class="img-link" href="be_pages_generic_profile.html">
                                <img class="img-avatar" src="<?= base_url() ?>assets/media/avatars/avatar15.jpg" alt="">
                            </a>
                            <ul class="list-inline mt-10">
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html">J. Smith</a>
                                </li>
                               
                                <li class="list-inline-item">
                                    <a class="link-effect text-dual-primary-dark" href="op_auth_signin.html">
                                        <i class="si si-logout"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Visible only in normal mode -->
                    </div>
                    <!-- END Side User -->

                    <!-- Side Navigation -->
                    <?php if ($this->session->userdata('nama')) { ?>
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a href="<?= site_url('Dashboard') ?>" class="<?php if ($menu == "dashboard") { echo "active"; } ?>"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                            </li>

                            <li class="<?php if ($list == "training" || $list == "testing") { echo "open"; } ?>">
                                <a class="nav-submenu" data-toggle="nav-submenu" href=""><i class="si si-grid"></i><span class="sidebar-mini-hide">Manajemen Data</span></a>
                                <ul>
                                    <li>
                                        <a href="<?= site_url('Training') ?>" class="<?php if ($menu == "training") { echo "active"; } ?>">Training</a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('Testing') ?>" class="<?php if ($menu == "testing") { echo "active"; } ?>">Testing</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?= site_url('Simulasi') ?>" class="<?php if ($menu == "mknn") { echo "active"; } ?>"><i class="si si-layers"></i><span class="sidebar-mini-hide">MKNN</span></a>
                            </li>

                            <li>
                                <a href="<?= site_url('Spk') ?>" class="<?php if ($menu == "spk") { echo "active"; } ?>"><i class="si si-bar-chart"></i><span class="sidebar-mini-hide">SPK</span></a>
                            </li>

                        </ul>
                    </div>
                    <?php } else { ?>
                        <div class="content-side content-side-full">
                    <ul class="nav-main">

                        <li>
                            <a class="active" href=""><i class="si si-cup"></i><span
                                    class="sidebar-mini-hide">Dashboard</span></a>
                        </li>

                        <li>
                            <a class="" href="be_pages_dashboard.html"><i class="si si-bar-chart"></i><span
                                    class="sidebar-mini-hide">Keputusan</span></a>
                        </li>

                    </ul>
                </div>
                    <?php } ?>
                    <!-- END Side Navigation -->
                </div>
                <!-- Sidebar Content -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <!-- END Toggle Sidebar -->
                                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-circle btn-dual-secondary"
                            id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu min-width-300" aria-labelledby="page-header-options-dropdown">
                            <h5 class="h6 text-center py-10 mb-10 border-b text-uppercase">Settings</h5>
                            <h6 class="dropdown-header">Warna Tema</h6>
                            <div class="row no-gutters text-center mb-5">
                                <div class="col-2 mb-5">
                                    <a class="text-default" data-toggle="theme" data-theme="default"
                                        href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-2 mb-5">
                                    <a class="text-elegance" data-toggle="theme"
                                        data-theme="<?= base_url() ?>assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-2 mb-5">
                                    <a class="text-pulse" data-toggle="theme"
                                        data-theme="<?= base_url() ?>assets/css/themes/pulse.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-2 mb-5">
                                    <a class="text-flat" data-toggle="theme" data-theme="<?= base_url() ?>assets/css/themes/flat.min.css"
                                        href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-2 mb-5">
                                    <a class="text-corporate" data-toggle="theme"
                                        data-theme="<?= base_url() ?>assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-2 mb-5">
                                    <a class="text-earth" data-toggle="theme"
                                        data-theme="<?= base_url() ?>assets/css/themes/earth.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <h6 class="dropdown-header">Tema Sidebar</h6>
                            <div class="row gutters-tiny text-center mb-5">
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10"
                                        data-toggle="layout" data-action="sidebar_style_inverse_off">Light</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10"
                                        data-toggle="layout" data-action="sidebar_style_inverse_on">Dark</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END Layout Options -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                        <?php if ($this->session->userdata('nama')) { ?>
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block"><?= $this->session->userdata('username') ?></span>
                                <i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                                <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase"><?= $this->session->userdata('nama') ?></h5>
                                <a class="dropdown-item" href="be_pages_generic_profile.html">
                                    <i class="si si-user mr-5"></i> Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
                                    <i class="si si-logout mr-5"></i> Sign Out
                                </a>
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                        <?php } else { ?>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user d-sm-none"></i>
                                <span class="d-none d-sm-inline-block">User</span>
                                <i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-200"
                                aria-labelledby="page-header-user-dropdown">
                                <!-- Link kan ke auth-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth') ?>">
                                    <i class="si si-logout mr-5"></i> Login
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->


                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

               {isi}

            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">

                    <div class="float-left">
                        <a class="font-w600" href="" target="_blank">SIPILJur 2020 </a> &copy; Versi 1.0
                    </div>

                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        
         <!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->

    <div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
            <div class="modal-content rounded">
                <div class="block block-rounded block-transparent mb-0 bg-pattern"
                    style="background-image: url('<?= base_url() ?>assets/media/various/bg-pattern-inverse.png');">
                    <div class="block-header justify-content-end">
                        <div class="block-options">
                            <a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
                                Skip Intro
                            </a>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="js-slider slick-dotted-inner" data-dots="true" data-arrows="false"
                            data-infinite="false">
                            <div class="pb-50">
                                <div class="row justify-content-center text-center">
                                    <div class="col-md-10 col-lg-8">
                                        <i class="si si-bar-chart fa-4x text-primary"></i>
                                        <h3 class="font-size-h2 font-w300 mt-20">Selamat Datang di SIPILJur</h3>
                                        <p class="text-muted">
                                            Sistem informasi yang dapat membantu peserta didik baru untuk menentukan jurusan pilihannya. <br>
                                            Sistem ini berguna untuk peserta didik yang kebingungan untuk menentukan jurusan baginya.
                                            
                                        </p>
                                        <button type="button"
                                            class="btn btn-sm btn-hero btn-noborder btn-primary mb-10 mx-5"
                                            onclick="jQuery('.js-slider').slick('slickGoTo', 1);">
                                            Let's Go !!!<i class="fa fa-arrow-right ml-5"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide pb-50">
                                <div class="row justify-content-center text-center">
                                    <div class="col-md-10 col-lg-8">
                                    <i class="si si-note fa-4x text-primary"></i>

                                    <h3 class="font-size-h2 font-w300 mb-5 ">Cara Penggunaan</h3>
                                        <p class="text-muted">
                                            Peserta didik harus memiliki nilai terdiri dari nilai <strong>Raport, USBN, dan nilai IQ </strong>
                                        </p>
                                        <p>ada pun nilai mata pelajaran yang di butuhkan antara lain <strong>(Bahasa Indonesia, Bahasa Inggris, Matematika, dan IPA)<strong></p>
                                        <div class="dropdown-divider"></div>
                                        <p class="text-muted">
                                            Peserta didik diharuskan untuk mengisi berupa form yang ada pada menu <strong> " Keputusan "</strong> pada menu samping. 
                                        </p>
                                        
                                        <div class="text-center">
                                            <button type="button"
                                                class="btn btn-sm btn-hero btn-noborder btn-primary mb-10 mx-5"
                                                onclick="jQuery('.js-slider').slick('slickGoTo', 2);">
                                                Next <i class="fa fa-arrow-right ml-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slick-slide pb-50">
                                <div class="row justify-content-center text-center">
                                    <div class="col-md-10 col-lg-8">
                                    <i class="si si-note fa-4x text-primary"></i>

             
                                        <p class="text-muted mt-5">
                                            Setelah Peserta didik mengisi nilai pada form yang telah di sediakan, untuk memproses Keputusannya tinggal klik <strong>" Proses Keputusan " </strong>. Setelah itu tunggu hasilnya keluar.
                                        </p>
                                        <div class="dropdown-divider"></div>

                                       
                                        <h2 class="font-size-h2 font-w300 mt-20">Selamat Mencoba</h2>
                                        <button type="button"
                                            class="btn btn-sm btn-hero btn-noborder btn-primary mb-10 mx-5"
                                            data-dismiss="modal" aria-label="Close">
                                            Get Started <i class="fa fa-check ml-5"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Onboarding Modal -->


        <script src="<?= base_url() ?>assets/js/codebase.app.min.js"></script>
    </body>
</html>