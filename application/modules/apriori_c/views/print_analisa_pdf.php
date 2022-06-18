<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>/assets/images/icon/favicon.ico"> -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/metisMenu.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/slicknav.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/'); ?>nicepage.css" media="screen">

    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Allison:400">

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/typography.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/default-css.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/styles.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?= base_url() ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- jquery latest version -->
    <script src="<?= base_url() ?>/assets/js/vendor/jquery-2.2.4.min.js"></script>
</head>

<div class="row">

    <style>
        .no-border {
            border: 1.2px solid white !important;
        }
    </style>
    <div class="col-lg-12 mt-4" id="card-apriori">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Hasil Perhitungan Apriori Peterson Salon</h4>
                <hr style="margin:10px">
                <div id="hasil-content">
                    <!-- BEGIN : FILTER APRIORI -->
                    <table class="no-border">
                        <tr>
                            <td class="no-border">Minimal Support</td>
                            <td class="no-border text-center" width="20px">:</td>
                            <td class="no-border" id="support"><?= $support ?></td>
                        </tr>
                        <tr>
                            <td class="no-border">Minimal Confidence</td>
                            <td class="no-border text-center">:</td>
                            <td class="no-border" id="confidence"><?= $confidence ?></td>
                        </tr>
                        <tr>
                            <td class="no-border">Tanggal Awal</td>
                            <td class="no-border text-center">:</td>
                            <td class="no-border" id="start_date"><?= $start_date ?></td>
                        </tr>
                        <tr>
                            <td class="no-border">Tanggal Akhir</td>
                            <td class="no-border  text-center">:</td>
                            <td class="no-border" id="end_date"><?= $end_date ?></td>
                        </tr>
                    </table>
                    <!-- END : FILTER APRIORI -->

                    <!-- BEGIN : DATASET TERPILIH -->
                    <hr style="margin:10px">

                    <h4 class="header-title text-info">Dataset Terpilih</h4>
                    <div class="data-tables">
                        <table class="table table-bordered table-striped" width="100%">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID Transaksi</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nomor Telp</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Layanan/Produk</th>
                                </tr>
                            </thead>
                            <tbody id="sample-apriori">
                                <?php
                                $i = 1;
                                foreach ($samples as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td><?= $row['id_transaksi'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['no_telp'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td>
                                            <?php
                                            $item = '';
                                            foreach ($row['itemset'] as $key) {
                                                $item .= $key . ', ';
                                            }
                                            echo substr($item, 0, strlen($item) - 2); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END : DATASET TERPILIH -->

                    <!-- BEGIN : ASOSIASIN FINAL  -->
                    <hr>
                    <h4 class="header-title text-success">Asosiasi Final</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Antecedent</th>
                                        <th scope="col">Consequent</th>
                                        <th scope="col">Support</th>
                                        <th scope="col">Confidence</th>
                                        <th scope="col">Support * Confidence</th>
                                    </tr>
                                </thead>
                                <tbody id="result-apriori">
                                    <?php
                                    $i = 1;
                                    foreach ($result as $row) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td>
                                                <?php
                                                $item = '';
                                                foreach ($row['antecedent'] as $key) {
                                                    $item .= $key . ', ';
                                                }
                                                echo substr($item, 0, strlen($item) - 2); ?>
                                            </td>
                                            <td>
                                                <?php
                                                $item = '';
                                                foreach ($row['consequent'] as $key) {
                                                    $item .= $key . ', ';
                                                }
                                                echo substr($item, 0, strlen($item) - 2); ?>
                                            </td>
                                            <td><?= $row['support'] ?></td>
                                            <td><?= $row['confidence'] ?></td>
                                            <td><?= $row['support'] * $row['confidence'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END : ASOSIASI FINAL -->

                    <!-- BEGIN : FREQUENT -->
                    <span id="frequent-apriori">
                        <?php
                        $i = 1;
                        foreach ($frequent as $row) : ?>
                            <hr>
                            <h4 class="header-title text-danger">Iterasi <?= $i++; ?></h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Itemset</th>
                                                <th scope="col">Frequency</th>
                                                <th scope="col">Support</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $j = 1;
                                            foreach ($row as $r) :
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?= $j++; ?></td>
                                                    <td>
                                                        <?php
                                                        $item = '';
                                                        foreach ($r['itemset'] as $key) {
                                                            $item .= $key . ', ';
                                                        }
                                                        echo substr($item, 0, strlen($item) - 2); ?>
                                                    </td>
                                                    <td><?= $r['frequency'] ?></td>
                                                    <td><?= $r['support'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </span>
                    <!-- END : FREQUENT -->
                </div>
            </div>
        </div>
    </div>
    <!-- normal alert area end -->
</div>


<!-- bootstrap 4 js -->
<script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/assets/js/metisMenu.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.slicknav.min.js"></script>

<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<!-- <script src="https://cdn.zingchart.com/zingchart.min.js"></script> -->
<!-- <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script> -->
<!-- all line chart activation -->
<script src="<?= base_url() ?>/assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="<?= base_url() ?>/assets/js/pie-chart.js"></script>
<!-- others plugins -->
<script src="<?= base_url() ?>/assets/js/plugins.js"></script>
<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
</body>

</html>