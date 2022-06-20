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
<h4 class="text-center">Rekam Transaksi Salon Peterson</h4>

<table width="100%">
    <thead class="bg-light text-capitalize ">
        <tr>
            <th class="text-center" scope="col">No.</th>
            <th class="text-center" scope="col">Nama</th>
            <th class="text-center" scope="col">No Telp</th>
            <th class="text-center" scope="col">Layanan</th>
            <th class="text-center" scope="col" width="150px">Total Harga</th>
            <th class="text-center" scope="col">Status Transaksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        $total = 0;
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
                        ?>,-</td>
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
        <tr>
            <th colspan="4">TOTAL</th>
            <th colspan="2">Rp. <?= number_format($total, 0, ",", "."); ?>,-</th>
        </tr>
    </tbody>
</table>