<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="/<?= $judul; ?>/index"><?= $judul; ?></a>
                        <?= $aksi; ?>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Ubah Data Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_buku']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">                                
                                <div class="form-group">
                                    <label for="kode_buku">Kode Buku</label>
                                    <input type="text" disabled class="form-control <?= ($validation->hasError('kode_buku')) ? 'is-invalid' : ''; ?>" id="kode_buku" name="kode_buku" autofocus value="<?= (old('kode_buku')) ? old('kode_buku') : $data['kode_buku']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kode_buku'); ?>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label for="judul_buku">Judul Buku</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('judul_buku')) ? 'is-invalid' : ''; ?>" id="judul_buku" name="judul_buku" autofocus value="<?= (old('judul_buku')) ? old('judul_buku') : $data['judul_buku']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul_buku'); ?>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label for="kategori_buku">Kategori Buku</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('kategori_buku')) ? 'is-invalid' : ''; ?>" id="kategori_buku" name="kategori_buku" autofocus value="<?= (old('kategori_buku')) ? old('kategori_buku') : $data['kategori_buku']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kategori_buku'); ?>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label for="stock_buku">Stock Buku</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('stock_buku')) ? 'is-invalid' : ''; ?>" id="stock_buku" name="stock_buku" autofocus value="<?= (old('stock_buku')) ? old('stock_buku') : $data['stock_buku']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('stock_buku'); ?>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label for="tahun_buku">Tahun Buku</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('tahun_buku')) ? 'is-invalid' : ''; ?>" id="tahun_buku" name="tahun_buku" autofocus value="<?= (old('tahun_buku')) ? old('tahun_buku') : $data['tahun_buku']; ?>">
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