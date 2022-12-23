<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index/<?= $id_pinjaman; ?>">Penjualan Detail</a>
                        <?= $aksi; ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Ubah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/PinjamanDetail/update/<?= $id_pinjaman_detail ?>">
                            <div class="card-body">                                
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="hidden" name="id_pinjaman" id="id_pinjaman" value="<?= $data['id_pinjaman'] ?>">
                                    <input type="hidden" name="id_buku" id="id_buku" value="<?= $data['id_buku'] ?>">
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('status_buku')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" name="status_buku" id="status_buku">
                                        <option value="0" <?php if ($data['status_buku'] == "0") : ?> selected <?php endif ?>>Belum</option>
                                        <option value="1" <?php if ($data['status_buku'] == "1") : ?> selected <?php endif ?>>Sudah</option>                                        
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_buku'); ?>
                                    </div>
                                </div>                                                                  
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>