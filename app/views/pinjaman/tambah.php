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
                            <h3 class="card-title">Form Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/save">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_peminjam">Nama Peminjam</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_peminjam')) ? 'is-invalid' : ''; ?>" id="nama_peminjam" name="nama_peminjam" autofocus value="<?= old('nama_peminjam'); ?>" placeholder="Masukan nama peminjam">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_peminjam'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_peminjam">Alamat Peminjam</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat_peminjam')) ? 'is-invalid' : ''; ?>" id="alamat_peminjam" name="alamat_peminjam" autofocus value="<?= old('alamat_peminjam'); ?>" placeholder="Masukan alamat peminjam">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_peminjam'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Telpon</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" autofocus value="<?= old('telp'); ?>" placeholder="Masukan telp">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telp'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label>Tanggal Meminjam</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control <?= ($validation->hasError('tgl_meminjam')) ? 'is-invalid' : ''; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="tgl_meminjam" name="tgl_meminjam" autofocus value="<?= old('tgl_meminjam'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tgl_meminjam'); ?>
                                        </div>
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