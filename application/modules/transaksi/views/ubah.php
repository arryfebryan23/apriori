<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="row">
    <div class="col-lg-12 mt-5">
        <?= $this->session->flashdata('message'); ?>

        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Ubah Data Transkasi</h4>
                <form method="post" action="<?= base_url('transaksi/update') ?>">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="example-text-input" class="col-form-label">ID Transaksi</label>
                            <input type="hidden" class="form-control" name="id_transaksi" value="<?= $transaksi->id ?>" readonly>
                            <input type="text" class="form-control" name="kd_transaksi" value="<?= $transaksi->id_transaksi ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="example-text-input" class="col-form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" placeholder="Nama pelanggan" name="nama" autocomplete="off" value="<?= $transaksi->nama ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">No. Telp</label>
                            <input type="text" class="form-control onlynumber" placeholder="No. Telp" name="no_telp" autocomplete="off" value="<?= $transaksi->no_telp ?>" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" value="<?= $transaksi->email ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Tanggal</label>
                            <input type="date" class="form-control" placeholder="Tanggal" name="date" autocomplete="off" value="<?= date('Y-m-d', strtotime($transaksi->tanggal)); ?>" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="example-text-input" class="col-form-label">Jam</label>
                            <input type="time" class="form-control" placeholder="Tanggal" name="time" autocomplete="off" value="<?= date('H:i', strtotime($transaksi->tanggal)); ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="example-text-input" class="col-form-label">Total</label>
                            <input type="text" class="form-control" placeholder="Total" name="total_harga" autocomplete="off" value="Rp. <?= number_format($transaksi->harga, 0, ",", ".") ?> ,-" id="total-harga" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="example-text-input" class="col-form-label">Layanan</label>
                            <select class=" form-control js-example-basic-multiple" name="layanan[]" id="multipleSelect" multiple="multiple" onchange="hitung_total(this)" required>
                                <?php foreach ($master_layanan->result() as $row) : ?>
                                    <option value="<?= $row->id ?>" data-harga="<?= $row->harga ?>" <?= in_array($row->id, $transaksi_detail) ? 'selected' : ''; ?>><?= $row->layanan ?> (Rp. <?= number_format($row->harga, 0, ",", ".") ?> ,-)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="example-text-input" class="col-form-label">Status</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="radio-aktif" name="status" class="custom-control-input" value="1" <?= $transaksi->status == 1 ? 'checked' : ''; ?> required>
                                <label class="custom-control-label" for="radio-aktif"><b><i class="fa fa-check"></i> Datang</b></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="radio-non-aktif" name="status" class="custom-control-input" value="0" <?= $transaksi->status == 0 ? 'checked' : ''; ?> required>
                                <label class="custom-control-label" for="radio-non-aktif"><b><i class="fa fa-close"></i> &nbsp;Tidak Datang</b></label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="radio-pending" name="status" class="custom-control-input" value="9" <?= $transaksi->status == 9 ? 'checked' : ''; ?> required>
                                <label class="custom-control-label" for="radio-pending"><b><i class="fa fa-spinner fa-spin"></i> Pending</b></label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <span class="pull-right">
                        <a class="btn btn-danger btn-sm" href="<?= base_url('transaksi') ?>"><i class="fa fa-close"></i> &nbsp;Close</a>
                        <button class="btn btn-info btn-sm" id="button" type="submit"><i class="fa fa-save"></i> &nbsp;Ubah Data</button>
                    </span>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    $(function() {
        $(".onlynumber").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
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
</script>