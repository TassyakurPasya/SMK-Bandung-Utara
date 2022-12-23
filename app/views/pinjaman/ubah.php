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
                            <h3 class="card-title">Form Ubah Data <?= $judul; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/update/<?= $data['id_pinjaman']; ?>">
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label for="nama_peminjam">Nama Peminjam</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_peminjam')) ? 'is-invalid' : ''; ?>" id="nama_peminjam" name="nama_peminjam" autofocus value="<?= (old('nama_peminjam')) ? old('nama_peminjam') : $data['nama_peminjam']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_peminjam'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_peminjam">Alamat Peminjam</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat_peminjam')) ? 'is-invalid' : ''; ?>" id="alamat_peminjam" name="alamat_peminjam" autofocus value="<?= (old('alamat_peminjam')) ? old('alamat_peminjam') : $data['alamat_peminjam']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_peminjam'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Telpon</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="telp" name="telp" autofocus value="<?= (old('telp')) ? old('telp') : $data['telp']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telp'); ?>
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