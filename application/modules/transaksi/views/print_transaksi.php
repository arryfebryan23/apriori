<html>


<head>
    <title>Rekam Data Transaksi</title>
</head>
<style>
    table,
    tr,
    td,
    th {
        border: 1px solid black;
    }

    .text-center {
        text-align: center;
    }
</style>

<body>
    <p style="text-align: center; margin:0px;">
        <b style="font-size: x-large;">PETERSON SALON</b><br>
        Kedung Pengawas, Kec. Babelan, Kab. Bekasi, Jawa Barat 17610 <br>
        Telp : 081280351314, 081293767969<br>
        Email : <a href="">petersonsalon.babelan@gmail.com</a>
    </p>
    <hr>


    <p style="margin-top: 2px; margin-bottom:10px;"><b>REKAM TRANSAKSI : <?= $title ?></b></p>

    <table width="100%">
        <thead class="bg-light text-capitalize ">
            <tr>
                <th class="text-center" scope="col">No.</th>
                <th class="text-center" scope="col">Nama</th>
                <th class="text-center" scope="col">No Telp</th>
                <th class="text-center" scope="col">Layanan</th>
                <th class="text-center" scope="col" width="150px">Total Harga</th>
                <th class="text-center" scope="col">Tanggal</th>
                <th class="text-center" scope="col">Status Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0;
            if ($transaksi->num_rows() > 0) : ?>
                <?php $i = 1;

                foreach ($transaksi->result() as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $i++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->no_telp; ?></td>
                        <td>
                            <?php
                            $temp = '';
                            foreach ($detail_transaksi[$row->id] as $r) :
                                $temp .= $r . ', ';
                            endforeach;
                            $temp = substr($temp, 0, strlen($temp) - 2);
                            echo $temp;
                            ?>
                        </td>
                        <td>Rp. <?=
                                number_format($row->harga, 0, ",", ".");
                                $total += $row->harga;
                                ?>,-
                        </td>
                        <td width="170px" class="text-center"><?= $row->tanggal ?></td>
                        <td class="text-center" valign="middle">
                            <?php if ($row->status == '0') : ?>
                                <span class="badge badge-danger"><i class="fa fa-close"></i> Tidak Datang</span>
                            <?php elseif ($row->status == '1') : ?>
                                <span class="badge badge-success"><i class="fa fa-check"></i> Datang</span>
                            <?php else : ?>
                                <span class="badge badge-warning"><i class="fa fa-spinner fa-pulse"></i> Pending</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <th colspan="7" class="text-center">Tidak ada data pada tanggal ini.</th>
                </tr>
            <?php endif; ?>
            <tr>
                <th colspan="4">TOTAL</th>
                <th colspan="1" style="text-align: left;">Rp. <?= number_format($total, 0, ",", "."); ?>,-</th>
                <th colspan="2"></th>
            </tr>
        </tbody>
    </table>

    <style>
        .no-border {
            border: 0px solid black;
        }
    </style>

    <div style=" position: absolute;
                    right: 100px;
        ">
        <table class="no-border" style="margin-top: 25px;">
            <tr class="no-border text-center">
                <td class="no-border">Bekasi, .............................. <?= date('Y'); ?></td>
            </tr>
            <tr class="no-border">
                <td class="no-border"><br><br><br><br><br><br></td>
            </tr>
            <tr class="no-border">
                <td class="no-border text-center">Pemilik Salon</td>
            </tr>
        </table>
    </div>
</body>

</html>