<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index">Buku</a>
                        <?= $aksi; ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/save" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_buku">Kode Buku</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kode_buku')) ? 'is-invalid' : ''; ?>" id="kode_buku" name="kode_buku" autofocus value="<?= old('kode_buku'); ?>" placeholder="Masukan kode buku">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_buku'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="judul_buku">Judul Buku</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>" id="judul_buku" name="judul_buku" autofocus value="<?= old('judul_buku'); ?>" placeholder="Masukan judul buku">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul_buku'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_buku">Kategori Buku</label>

                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('kategori_buku')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" id="kategori_buku" name="kategori_buku">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                        <option value="Dongeng">Dongeng</option>
                                        <option value="Novel">Novel</option>                                                                       
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kategori_buku'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stock_buku">Stock Buku</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('stock_buku')) ? 'is-invalid' : ''; ?>" id="stock_buku" name="stock_buku" autofocus value="<?= old('stock_buku'); ?>" placeholder="Masukan stock buku" min="0" oninput="validity.valid||(value='');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('stock_buku'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_buku">Tahun Buku</label>
                                    <input type="number" class="form-control <?= ($validation->hasError('tahun_buku')) ? 'is-invalid' : ''; ?>" id="tahun_buku" name="tahun_buku" autofocus value="<?= old('tahun_buku'); ?>" placeholder="Masukan tahun buku" min="0" oninput="validity.valid||(value='');">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahun_buku'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>