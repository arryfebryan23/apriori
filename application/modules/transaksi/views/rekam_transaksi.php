<div class="row">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Print Rekam Transaksi Salon</h4>
                <form method="post" action="<?= base_url('transaksi/print_pdf'); ?>" target="_BLANK">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Tanggal Awal</label>
                            <input type="date" class="form-control" placeholder="Tanggal Awal" name="start_date">
                        </div>
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" placeholder="Tanggal Akhir" name="end_date">
                        </div>
                    </div>
                    <button class="btn btn-info btn-sm" id="button" type="submit"><i class="fa fa-print"></i> &nbsp;Cetak PDF</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-4">
        <?= $this->session->flashdata('message'); ?>
        <div class="card">

            <div class="card-body">
                <h4 class="header-title pt-2">Rekam Transaksi Salon</h4>
                <div class="data-tables">
                    <table id="myTable" class="table table-bordered table-striped" width="100%">
                        <thead class="bg-light text-capitalize ">
                            <tr>
                                <th class="text-center" scope="col">No.</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">No Telp</th>
                                <th class="text-center" scope="col">Layanan</th>
                                <th class="text-center" scope="col">Total Harga</th>
                                <th class="text-center" scope="col">Tanggal</th>
                                <th class="text-center" scope="col">Status Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                    <td>Rp. <?= number_format($row->harga, 0, ",", ".") ?> ,-</td>
                                    <td><?= $row->tanggal; ?></td>
                                    <td class="text-center" valign="middle">
                                        <?php if ($row->status == '0') : ?>
                                            <span class="badge badge-danger"><i class="fa fa-close"></i> tidak datang</span>
                                        <?php elseif ($row->status == '1') : ?>
                                            <span class="badge badge-success"><i class="fa fa-check"></i> datang</span>
                                        <?php else : ?>
                                            <span class="badge badge-warning"><i class="fa fa-spinner fa-pulse"></i> pending</span>
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- normal alert area end -->
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
</script>