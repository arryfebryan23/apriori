<div class="row">
    <div class="col-lg-12 mt-4">
        <?= $this->session->flashdata('message'); ?>
        <div class="card">

            <div class="card-body">

                <h4 class="header-title">Kelola Master Data Layanan</h4>

                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data Layanan</button>
                <hr>
                <div class="data-tables">
                    <table id="myTable" class="table table-bordered table-striped" width="100%">
                        <thead class="bg-light text-capitalize ">
                            <tr>
                                <th class="text-center" scope="col">No.</th>
                                <th class="text-center" scope="col">Nama Layanan</th>
                                <th class="text-center" scope="col">Harga</th>
                                <th class="text-center" scope="col">Status Aktif</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($layanan->result() as $row) : ?>
                                <tr>
                                    <th class="text-center"><?= $i++; ?></th>
                                    <td><?= $row->layanan; ?></td>
                                    <td>Rp. <?= number_format($row->harga, 0, ",", ".") ?> ,-</td>
                                    <td class="text-center">
                                        <?php if (empty($row->deleted_at)) : ?>
                                            <span class="text-success">
                                                <i class="fa fa-check-circle"></i> Aktif
                                            </span>
                                        <?php else : ?>
                                            <span class="text-danger">
                                                <i class="fa fa-times-circle"></i> Tidak Aktif
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-info btn-xs" data-toggle="modal" data-target=".edit-example-modal-lg" onclick="set_ubah_data(this)" data-id_layanan="<?= $row->id ?>" data-layanan="<?= $row->layanan ?>" data-harga="<?= $row->harga ?>" data-deleted_at="<?= $row->deleted_at ?>"><i class="fa fa-edit"></i></button>
                                        <!-- <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a> -->
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

<div class="modal fade bd-example-modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Layanan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form action="<?= base_url('master_layanan/insert') ?>" method="post">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" class="form-control" name="layanan" placeholder="Nama layanan" required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="modal fade edit-example-modal-lg" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Data Layanan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
            </div>
            <form action="<?= base_url('master_layanan/update') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label>ID Layanan</label>
                        <input type="text" class="form-control" name="id" id="edit_id" required readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" class="form-control" name="layanan" id="edit_layanan" placeholder="Nama layanan" required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" class="form-control" name="harga" id="edit_harga" placeholder="Harga" required>
                    </div>

                    <label>Status Aktif</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="radio-aktif" name="is_aktif" class="custom-control-input" value="true">
                        <label class="custom-control-label" for="radio-aktif">Aktif</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" id="radio-non-aktif" name="is_aktif" class="custom-control-input" value="false">
                        <label class="custom-control-label" for="radio-non-aktif">Non Aktif</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    function set_ubah_data(events) {
        let id_layanan = events.dataset.id_layanan;
        let layanan = events.dataset.layanan;
        let harga = events.dataset.harga;
        let deleted_at = events.dataset.deleted_at;

        document.getElementById("edit_id").setAttribute('value', id_layanan);
        document.getElementById("edit_layanan").setAttribute('value', layanan);
        document.getElementById("edit_harga").setAttribute('value', harga);

        if (deleted_at) {
            document.getElementById("radio-non-aktif").setAttribute('checked', true);
        } else {
            document.getElementById("radio-aktif").setAttribute('checked', true);
        }
    }
</script>