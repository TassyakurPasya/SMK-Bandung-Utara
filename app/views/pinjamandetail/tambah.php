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
                            <h3 class="card-title">Form Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="POST" action="/<?= $judul; ?>/save">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_buku">Buku</label>
                                    <input type="hidden" value="<?= $id_pinjaman; ?>" name="id_pinjaman" id="id_pinjaman">
                                    <select class="form-select form-control select2bs4 <?= ($validation->hasError('id_buku')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" autofocus name="id_buku" id="id_buku">
                                        <option value="" selected disabled>Pilih Buku</option>
                                        <?php foreach ($databuku as $key => $value) : ?>
                                            <option value="<?= $value['id_buku']; ?>" } ?>
                                                <?= $value['judul_buku']; ?> | <?= $value['kategori_buku']; ?> | <?= $value['tahun_buku']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_buku'); ?>
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