<div class="row">
    <div class="col-lg-12 mt-4">
        <?= $this->session->flashdata('message'); ?>
        <div class="card">

            <div class="card-body">

                <h4 class="header-title">Kelola Transaksi Salon</h4>

                <a class="btn btn-primary btn-sm" href="<?= base_url('transaksi/tambah') ?>">Tambah Data Transaksi</a>
                <hr>
                <div class="data-tables">
                    <table id="myTable" class="table table-bordered table-striped" width="100%">
                        <thead class="bg-light text-capitalize ">
                            <tr>
                                <th class="text-center" scope="col">No.</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">No Telp</th>
                                <th class="text-center" scope="col">Total Harga</th>
                                <th class="text-center" scope="col">Status Transaksi</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($transaksi->result() as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->no_telp; ?></td>
                                    <td>Rp. <?= number_format($row->harga, 0, ",", ".") ?> ,-</td>
                                    <td class="text-center" valign="middle">
                                        <?php if ($row->status == '0') : ?>
                                            <span class="badge badge-danger"><i class="fa fa-close"></i> tidak datang</span>
                                        <?php elseif ($row->status == '1') : ?>
                                            <span class="badge badge-success"><i class="fa fa-check"></i> datang</span>
                                        <?php else : ?>
                                            <span class="badge badge-warning"><i class="fa fa-spinner"></i> pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-xs" href="<?= base_url('transaksi/ubah/' . $row->id) ?>"><i class="fa fa-edit"></i></a>
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