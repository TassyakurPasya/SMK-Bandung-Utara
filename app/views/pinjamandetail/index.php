<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><a href="/Pinjaman/index">Pinjaman</a>
                        <?= $aksi; ?> </h3>
                </div>
                <!-- /.card-header -->
                <!-- Tambah data -->
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Nama Peminjam</th>
                            <td>:</td>
                            <td><?= $dataMain['nama_peminjam'] ?></td>
                        </tr>                     
                        <tr>
                            <th>Alamat Peminjam</th>
                            <td>:</td>
                            <td><?= $dataMain['alamat_peminjam'] ?></td>
                        </tr>  
                        <tr>
                            <th>Telepon Peminjam</th>
                            <td>:</td>
                            <td><?= $dataMain['telp'] ?></td>
                        </tr>  
                    </table>
                    <hr>
                    <a href="/PinjamanDetail/tambah/<?= $dataMain['id_pinjaman'] ?>" class="btn btn-primary">Tambah Buku</a><br><br>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif ?>
                    <table class="table table-bordered table-striped" id="data-table1">
                        <thead>
                            <tr>
                                <th>No</th>
<th>Judul Buku</th>
<th>Status Pengembalian Buku</th>
<th>Aksi</th>
                            </tr>                            
                        </thead>
                        <?php
                        $i = 1;
                        foreach ($data as $key => $value) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                               <td><?= $value['judul_buku'] ?></td>
                               <td> <?php if ($value['status_buku'] == 0) {?>
  <span class="badge bg-warning">Belum</span>
<?php }else{?>
    <span class="badge bg-success">Sudah</span>    
    <?php }  ?></td>
                                <!-- Selesai Disini -->
                                <td>
                                    <a href="/PinjamanDetail/edit/<?= $value['id_pinjaman_detail']; ?>" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah"><i class="fas fa-pen"></i></a>
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <!-- Button trigger modal -->
                                    <button type="button" href='#modalHapus' onclick="konfirmasiDelete(<?= $value['id_pinjaman_detail']; ?>,<?= $value['id_pinjaman'] ?>)" class="btn btn-danger" data-toggle="modal" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>No</th>
                                <!-- Masukan Disini -->
                                <th>Judul Buku</th>
                                <th>Status Pengembalian Buku</th>
                                <!-- Selesai Disini -->
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<form action="/PinjamanDetail/delete" method="POST" class="d-inline">
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data ini ?
                    <input type="hidden" id="id_pinjaman_detail" name="id_pinjaman_detail">
                    <input type="hidden" id="id_pinjaman" name="id_pinjaman">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // delete
    function konfirmasiDelete(id, id_so) {
        $('#id_pinjaman_detail').val(id);
        $('#id_pinjaman').val(id_so);
    }
</script>

<?= $this->endSection(); ?>