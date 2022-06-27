<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="description" content="">
    <title>Peterson Salon</title>
    <link rel="stylesheet" href="<?= base_url('assets/landing_page/'); ?>nicepage.css" media="screen">
    <link rel="stylesheet" href="<?= base_url('assets/landing_page/'); ?>Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="<?= base_url('assets/landing_page/'); ?>nicepage.js" defer=""></script>
    <!-- <meta name="generator" content="Nicepage 4.12.14, nicepage.com"> -->
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Allison:400">

    <!-- jquery latest version -->
    <script src="<?= base_url() ?>/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body data-home-page="Home.html" data-home-page-title="Home" class="u-body u-overlap u-xl-mode">
    <header class="u-clearfix u-header" id="sec-779f">
        <div class="u-clearfix u-sheet u-sheet-1"><span class="u-file-icon u-icon u-text-white u-icon-1"><img src="<?= base_url('assets/landing_page/'); ?>images/1.png" alt=""></span>
            <h2 class="u-subtitle u-text u-text-default u-text-1">Peterson<br>
            </h2>
            <nav class="u-align-right u-menu u-menu-one-level u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 700;">
                    <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-text-shadow u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-custom-font u-nav u-spacing-30 u-text-font u-unstyled u-nav-1">
                        <?php if ($this->ion_auth->logged_in()) : ?>
                            <li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-white u-text-white active" href="<?= base_url('dashboard'); ?>" style="padding: 10px 0px;">Go to Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-white u-text-white" href="#about_us" style="padding: 10px 0px;">About Us</a>
                        </li>
                        <li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-white u-text-white" href="#testimoni" style="padding: 10px 0px;">Testimonial</a>
                        </li>
                        <li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-white u-text-white" href="#booking" style="padding: 10px 0px;">Booking</a>
                        </li>
                        <?php if ($this->ion_auth->logged_in()) : ?>
                            <li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-white u-text-white" href="<?= base_url('auth/logout'); ?>" style="padding: 10px 0px;">Sign Out</a>
                            </li>
                        <?php else : ?>
                            <li class="u-nav-item"><a class="u-border-2 u-border-active-white u-border-hover-grey-50 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-hover-white u-text-white" href="<?= base_url('auth/login'); ?>" style="padding: 10px 0px;">Sign In</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link">About Us</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Testimonial.html">Testimonial</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link">Booking</a>
                                </li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Sign-In.html">Sign In</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
        </div>
    </header>
    <section class="u-carousel u-slide u-block-76e5-1" src="" data-image-width="150" data-image-height="119" id="carousel_bcde" data-interval="5000" data-u-ride="false" data-pause="false">
        <ol class="u-absolute-hcenter u-carousel-indicators u-block-76e5-2">
            <li data-u-target="#carousel_bcde" data-u-slide-to="0" class="u-active u-grey-30"></li>
        </ol>
        <div class="u-carousel-inner" role="listbox">
            <div class="skrollable u-active u-align-center u-carousel-item u-clearfix u-image u-parallax u-shading u-section-1-1" src="" data-image-width="150" data-image-height="119">
                <div class="u-clearfix u-sheet u-sheet-1">
                    <h1 class="u-align-center u-text u-title u-text-1">PETERSON <br> SALON</h1>
                    <p class="u-large-text u-text u-text-default u-text-variant u-text-2">Kedung Pengawas, Kec. Babelan ,Kab. Bekasi<br>+62-812-8035-1314

                    <p class="u-large-text u-text u-text-default u-text-variant u-text-2">
                        Want to order? Click link below!
                    </p>


                    <a href="#booking" class="u-border-1 u-border-hover-white u-border-white u-btn u-button-style u-hover-feature u-hover-white u-none u-text-body-alt-color u-text-hover-black u-btn-1" style="margin-top: 15px;">book A Visit<br>
                    </a>
                </div>
            </div>
        </div>
        <a class="u-carousel-control u-carousel-control-prev u-hidden u-text-grey-30 u-block-76e5-3" href="#carousel_bcde" role="button" data-u-slide="prev">
            <span aria-hidden="true">
                <svg class="u-svg-link" viewBox="0 0 477.175 477.175">
                    <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                    c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path>
                </svg>
            </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="u-carousel-control u-carousel-control-next u-hidden u-text-grey-30 u-block-76e5-4" href="#carousel_bcde" role="button" data-u-slide="next">
            <span aria-hidden="true">
                <svg class="u-svg-link" viewBox="0 0 477.175 477.175">
                    <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                    c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path>
                </svg>
            </span>
            <span class="sr-only">Next</span>
        </a>

    </section>
    <section class="u-align-center u-clearfix u-section-2" id="about_us">
        <div class="u-align-left u-clearfix u-sheet u-sheet-1">
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <div class="u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-1"><span class="u-file-icon u-icon u-icon-1"><img src="<?= base_url('assets/landing_page/'); ?>images/1024537.png" alt=""></span>
                            <h3 class="u-align-center u-text u-text-default u-text-1"> About Salon</h3>
                            <p class="u-align-center u-text u-text-2"> We offer an extensive range of services including cutting, styling, blow drying, colouring</p>
                        </div>
                    </div>
                    <div class="u-align-center u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-2"><span class="u-file-icon u-icon u-icon-2"><img src="<?= base_url('assets/landing_page/'); ?>images/1057369.png" alt=""></span>
                            <h3 class="u-align-center u-text u-text-default u-text-3"> Our Team</h3>
                            <p class="u-align-center u-text u-text-4"> Our team of stylists and colourists are passionate about hair styling and are always happy&nbsp;</p>
                        </div>
                    </div>
                    <div class="u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-3"><span class="u-file-icon u-icon u-icon-3"><img src="<?= base_url('assets/landing_page/'); ?>images/3898973.png" alt=""></span>
                            <h3 class="u-align-center u-text u-text-default u-text-5"> Products</h3>
                            <p class="u-align-center u-text u-text-6"> We understand how important it is to feel and look your best, and our blend of service, expertise</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="u-align-left u-clearfix u-image u-shading u-section-3" id="testimoni" data-image-width="1440" data-image-height="1080">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h2 class="u-custom-font u-font-montserrat u-text u-text-default u-text-1">Our Clients Say</h2>
            <div id="carousel-3274" data-interval="5000" data-u-ride="carousel" class="u-carousel u-expanded-width u-slider u-slider-1">
                <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
                    <li data-u-target="#carousel-3274" class="u-active u-active-white u-grey-30 u-hover-palette-3-base u-shape-circle" data-u-slide-to="0" style="width: 10px; height: 10px;"></li>
                    <li data-u-target="#carousel-3274" class="u-active-white u-grey-30 u-hover-palette-2-base u-shape-circle" data-u-slide-to="1" style="width: 10px; height: 10px;"></li>
                </ol>
                <div class="u-carousel-inner" role="listbox">
                    <div class="u-active u-align-left u-carousel-item u-container-style u-slide">
                        <div class="u-container-layout u-valign-middle u-container-layout-1">
                            <div class="u-image u-image-circle u-image-1" alt="" data-image-width="1000" data-image-height="1500"></div>
                            <p class="u-text u-text-2">Very nice service from the staff. The place is comfy, with many sofa. It's a perfect place if you want to spoil yourself every once in a while.</p>
                            <h5 class="u-text u-text-default u-text-3">Claudya</h5>
                        </div>
                    </div>
                    <div class="u-align-left u-carousel-item u-container-style u-slide">
                        <div class="u-container-layout u-container-layout-2">
                            <div class="u-image u-image-circle u-image-2" alt="" data-image-width="1280" data-image-height="851"></div>
                            <p class="u-text u-text-4">I always going here for my treatment. I love the staff &amp; services, professional &amp; stunnig. I have been here many times, you shouldd try it too.</p>
                            <h5 class="u-text u-text-default u-text-5">NADIA<br>
                            </h5>
                        </div>
                    </div>
                </div>
                <a class="u-absolute-vcenter u-border-2 u-border-white u-carousel-control u-carousel-control-prev u-hidden-xs u-icon-circle u-spacing-10 u-text-body-alt-color u-text-hover-palette-5-dark-1 u-carousel-control-1" href="#carousel-3274" role="button" data-u-slide="prev">
                    <span aria-hidden="true">
                        <svg viewBox="0 0 256 256">
                            <g>
                                <polygon points="207.093,30.187 176.907,0 48.907,128 176.907,256 207.093,225.813 109.28,128"></polygon>
                            </g>
                        </svg>
                    </span>
                    <span class="sr-only">
                        <svg viewBox="0 0 256 256">
                            <g>
                                <polygon points="207.093,30.187 176.907,0 48.907,128 176.907,256 207.093,225.813 109.28,128"></polygon>
                            </g>
                        </svg>
                    </span>
                </a>
                <a class="u-absolute-vcenter u-border-2 u-border-white u-carousel-control u-carousel-control-next u-hidden-xs u-icon-circle u-spacing-10 u-text-body-alt-color u-text-hover-palette-5-dark-1 u-carousel-control-2" href="#carousel-3274" role="button" data-u-slide="next">
                    <span aria-hidden="true">
                        <svg viewBox="0 0 306 306">
                            <g id="chevron-right">
                                <polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"></polygon>
                            </g>
                        </svg>
                    </span>
                    <span class="sr-only">
                        <svg viewBox="0 0 306 306">
                            <g id="chevron-right">
                                <polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"></polygon>
                            </g>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </section>
    <section class="u-align-center u-clearfix u-section-4" id="booking">
        <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
                <div class="u-layout">
                    <div class="u-layout-row">
                        <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-1">
                            <div class="u-container-layout u-container-layout-1">
                                <div class="u-expanded u-grey-light-2 u-map">
                                    <div class="embed-responsive">
                                        <iframe class="embed-responsive-item" src="https://maps.google.com/maps?q=Salon%20Peterson,%20Kedung%20Pengawas,%20Kabupaten%20Bekasi,%20Jawa%20Barat,%20Indonesia&t=&z=13&ie=UTF8&iwloc=&output=embed" data-map="JTdCJTIyYWRkcmVzcyUyMiUzQSUyMk1hbmhhdHRhbiUyQyUyME5ldyUyMFlvcmslMjIlMkMlMjJ6b29tJTIyJTNBMTAlMkMlMjJ0eXBlSWQlMjIlM0ElMjJyb2FkJTIyJTJDJTIybGFuZyUyMiUzQSUyMiUyMiU3RA=="></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                            <div class="u-container-layout u-container-layout-2">
                                <h1 class="u-align-center u-custom-font u-text u-text-default u-text-1">Book a Visit</h1>
                                <div class="u-form u-form-1">

                                    <span id="alert-form">
                                    </span>
                                    <form method="post" id="form-insert">
                                        <input type="hidden" name="data_from" value="landing_page">
                                        <input type="hidden" name="status" value="9">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <!-- <label for="example-text-input" class="col-form-label">Nama Pelanggan</label> -->
                                                <input type="text" class="form-control" placeholder="Nama pelanggan" name="nama" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <!-- <label for="example-text-input" class="col-form-label">No. Telp</label> -->
                                                <input type="text" class="form-control onlynumber" placeholder="No. Telp" name="no_telp" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <!-- <label for="example-text-input" class="col-form-label">Tanggal</label> -->
                                                <input type="date" class="form-control" name="date" autocomplete="off" id="date" value="<?= date('Y-m-d'); ?>" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- <label for="example-text-input" class="col-form-label">Jam</label> -->
                                                <input type="time" class="form-control" name="time" autocomplete="off" value="<?= date('H:i'); ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <!-- <label for="example-text-input" class="col-form-label">Total</label> -->
                                                <input type="text" class="form-control" placeholder="Total" name="total_harga" autocomplete="off" value="Rp. 0,-" id="total-harga" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h1 class="u-align-center u-custom-font u-text u-text-default u-text-1">Product & Service</h1>
                                                <hr>
                                                <select class=" form-control js-example-basic-multiple" name="layanan[]" id="multipleSelect" multiple="multiple" onchange="hitung_total(this)" required>
                                                    <?php foreach ($master_layanan->result() as $row) : ?>
                                                        <option value="<?= $row->id ?>" data-harga="<?= $row->harga ?>"><?= $row->layanan ?> (Rp. <?= number_format($row->harga, 0, ",", ".") ?> ,-)</option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <span class="pull-left">
                                            <div class="u-align-left u-form-group u-form-submit">
                                                <button type="submit" class="u-active-white u-black u-border-2 u-border-active-white u-border-black u-border-hover-black u-btn u-btn-submit u-button-style u-hover-black u-text-active-black u-text-body-alt-color u-text-hover-white u-btn-1">Booking Now!</button>
                                                <input type="submit" value="submit" class="u-form-control-hidden">
                                            </div>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="u-align-center u-clearfix u-image u-shading u-section-5" id="carousel_cb38" data-image-width="1600" data-image-height="1067">
        <div class="u-clearfix u-sheet u-sheet-1">
            <h1 class="u-custom-font u-text u-title u-text-1">Schedule</h1>
            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="tanggal_jadwal" onchange="changeJadwal(this)" value="<?= date('Y-m-d') ?>" id="tanggal_jadwal">
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="u-expanded-width u-table u-table-responsive u-table-1">
                <table class="u-table-entity">
                    <colgroup>
                        <col width="33.3%">
                        <col width="33.3%">
                        <col width="33.400000000000006%">
                    </colgroup>
                    <thead class="u-palette-5-dark-3 u-table-header u-table-header-1">
                        <tr style="height: 70px;">
                            <th class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-table-cell u-table-cell-1">Name</th>
                            <th class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-table-cell u-table-cell-2">Products/services</th>
                            <th class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-table-cell u-table-cell-3">Datetime</th>
                        </tr>
                    </thead>
                    <tbody class="u-black u-table-body u-table-body-1" id="tbody-jadwal">
                        <?php if ($transaksi->num_rows() > 0) : ?>
                            <?php foreach ($transaksi->result() as $row) : ?>
                                <tr style="height: 41px;">
                                    <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-4">
                                        <!-- <?= preg_replace("/(^.|.$)(*SKIP)(*F)|(.)/", "*", $row->nama) ?> -->
                                        <?= $row->nama; ?>
                                    </td>
                                    <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-5">
                                        <?php
                                        $temp = '';
                                        foreach ($detail_transaksi[$row->id] as $r) :
                                            $temp .= $r . ', ';
                                        endforeach;
                                        $temp = substr($temp, 0, strlen($temp) - 2);
                                        echo $temp;
                                        ?>
                                    </td>
                                    <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-6"><?= $row->tanggal ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr style="height: 41px;">
                                <td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-4" colspan="3">Tidak ada data pada tanggal ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-grey-80" id="sec-360d">
        <div class="u-clearfix u-sheet u-sheet-1"><span class="u-file-icon u-icon u-text-white u-icon-1"><img src="<?= base_url('assets/landing_page/'); ?>images/1.png" alt=""></span>
            <h2 class="u-subtitle u-text u-text-default u-text-1">Peterson<br>
            </h2>
            <p class="u-align-center-lg u-align-center-md u-align-center-xl u-text u-text-2">Peterson Salon. 2022, All rights reserved, Bekasi - Indonesia</p>
            <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
                <a class="u-social-url" title="facebook" target="_blank" href=""><span class="u-icon u-social-facebook u-social-icon u-text-palette-5-dark-3 u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-291a"></use>
                        </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-291a">
                            <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
                            <path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path>
                        </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href=""><span class="u-icon u-social-icon u-social-twitter u-text-palette-5-dark-3 u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-c00c"></use>
                        </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-c00c">
                            <circle fill="currentColor" class="st0" cx="56.1" cy="56.1" r="55"></circle>
                            <path fill="#FFFFFF" d="M83.8,47.3c0,0.6,0,1.2,0,1.7c0,17.7-13.5,38.2-38.2,38.2C38,87.2,31,85,25,81.2c1,0.1,2.1,0.2,3.2,0.2
            c6.3,0,12.1-2.1,16.7-5.7c-5.9-0.1-10.8-4-12.5-9.3c0.8,0.2,1.7,0.2,2.5,0.2c1.2,0,2.4-0.2,3.5-0.5c-6.1-1.2-10.8-6.7-10.8-13.1
            c0-0.1,0-0.1,0-0.2c1.8,1,3.9,1.6,6.1,1.7c-3.6-2.4-6-6.5-6-11.2c0-2.5,0.7-4.8,1.8-6.7c6.6,8.1,16.5,13.5,27.6,14
            c-0.2-1-0.3-2-0.3-3.1c0-7.4,6-13.4,13.4-13.4c3.9,0,7.3,1.6,9.8,4.2c3.1-0.6,5.9-1.7,8.5-3.3c-1,3.1-3.1,5.8-5.9,7.4
            c2.7-0.3,5.3-1,7.7-2.1C88.7,43,86.4,45.4,83.8,47.3z"></path>
                        </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href=""><span class="u-icon u-social-icon u-social-instagram u-text-palette-5-dark-3 u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a5cf"></use>
                        </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-a5cf">
                            <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
                            <path fill="#FFFFFF" d="M55.9,38.2c-9.9,0-17.9,8-17.9,17.9C38,66,46,74,55.9,74c9.9,0,17.9-8,17.9-17.9C73.8,46.2,65.8,38.2,55.9,38.2
            z M55.9,66.4c-5.7,0-10.3-4.6-10.3-10.3c-0.1-5.7,4.6-10.3,10.3-10.3c5.7,0,10.3,4.6,10.3,10.3C66.2,61.8,61.6,66.4,55.9,66.4z"></path>
                            <path fill="#FFFFFF" d="M74.3,33.5c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S76.6,33.5,74.3,33.5z"></path>
                            <path fill="#FFFFFF" d="M73.1,21.3H38.6c-9.7,0-17.5,7.9-17.5,17.5v34.5c0,9.7,7.9,17.6,17.5,17.6h34.5c9.7,0,17.5-7.9,17.5-17.5V38.8
            C90.6,29.1,82.7,21.3,73.1,21.3z M83,73.3c0,5.5-4.5,9.9-9.9,9.9H38.6c-5.5,0-9.9-4.5-9.9-9.9V38.8c0-5.5,4.5-9.9,9.9-9.9h34.5
            c5.5,0,9.9,4.5,9.9,9.9V73.3z"></path>
                        </svg></span>
                </a>
                <a class="u-social-url" title="linkedin" target="_blank" href=""><span class="u-icon u-social-icon u-social-linkedin u-text-palette-5-dark-3 u-icon-5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-74dc"></use>
                        </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-74dc">
                            <circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle>
                            <path fill="#FFFFFF" d="M41.3,83.7H27.9V43.4h13.4V83.7z M34.6,37.9L34.6,37.9c-4.6,0-7.5-3.1-7.5-7c0-4,3-7,7.6-7s7.4,3,7.5,7
            C42.2,34.8,39.2,37.9,34.6,37.9z M89.6,83.7H76.2V62.2c0-5.4-1.9-9.1-6.8-9.1c-3.7,0-5.9,2.5-6.9,4.9c-0.4,0.9-0.4,2.1-0.4,3.3v22.5
            H48.7c0,0,0.2-36.5,0-40.3h13.4v5.7c1.8-2.7,5-6.7,12.1-6.7c8.8,0,15.4,5.8,15.4,18.1V83.7z"></path>
                        </svg></span>
                </a>
            </div>
        </div>
    </footer>
</body>

</html>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            allowClear: true
        });
    });

    $(function() {
        $(".onlynumber").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });

    function hitung_total(e) {
        let total = 0;
        $("#multipleSelect :selected").map(function(i, el) {
            total += $(el).data('harga');
        }).get();
        total = numberWithCommas(total);
        $('#total-harga').val('Rp. ' + total + ',-');
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function changeJadwal(e, date = null) {
        let tgl;
        if (date != null) {
            tgl = date;
        } else {
            tgl = e.value;
        }
        $('#tbody-jadwal').html('<tr style="height: 41px;"><th colspan="3" style="text-align:center; font-size:25px;"><i class="fa fa-spinner fa-pulse"></i></th></tr>');
        e.readOnly = true;
        setTimeout(function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('landing_page/jadwal_transaksi') ?>",
                dataType: 'json',
                data: {
                    'tanggal': tgl
                },
                success: function(response) {
                    if (response.transaksi.length > 0) {
                        let tbody = '';
                        response.transaksi.map(function(row) {
                            tbody += '<tr style="height: 41px;">';
                            tbody += '<td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-4">' + row.nama + '</td>';
                            tbody += '<td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-5">';

                            let items = '';
                            response.detail_transaksi[row.id].map(function(r) {
                                items += r + ', ';
                            });
                            items = items.substring(0, items.length - 2);
                            tbody += items;
                            // End of Antecedet

                            tbody += '</td>';
                            tbody += '<td class="u-border-1 u-border-palette-5-dark-1 u-table-cell u-table-cell-6">' + row.tanggal + '</td>';
                            tbody += '</tr>';
                        });
                        $('#tbody-jadwal').html(tbody);
                    } else {
                        $('#tbody-jadwal').html('<tr style="height: 41px;"><th colspan="3">Tidak ada data pada tanggal ini.</th></tr>');
                    }
                },
                complete: function() {
                    e.readOnly = false;
                }
            });
        }, 1000);
    }

    var my_func = function(event) {
        event.preventDefault();
        $("#alert-form").html('<div class="alert alert-info"><i class="fa fa-spinner fa-pulse"></i> Loading !!</div>');
        var form = document.getElementById("form-insert");
        var elements = form.elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            elements[i].readOnly = true;
        }
        setTimeout(function() {
            var form = $("#form-insert");

            $.ajax({
                type: "POST",
                url: "<?= base_url('transaksi/insert') ?>",
                dataType: 'json',
                data: form.serialize(),
                success: function(response) {
                    $("#alert-form").html(response);
                    var form = document.getElementById("form-insert");
                    var elements = form.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = false;
                    }
                },
                complete: function() {
                    let date = $('#date').val();
                    let e = document.getElementById("tanggal_jadwal");
                    changeJadwal(e, date);
                    form[0].reset();
                    $("#total-harga").prop("readonly", true);
                    $(".js-example-basic-multiple").val("");
                    $(".js-example-basic-multiple").trigger("change");

                }
            });
        }, 1500);
    };

    // attach event listener
    var form = document.getElementById("form-insert");
    form.addEventListener("submit", my_func, true);
</script>