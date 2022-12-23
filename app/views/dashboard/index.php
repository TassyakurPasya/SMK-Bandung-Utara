<?php session() ?>
<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>1 Guru</h3>
                    <p>SMK Bandung Utara</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/Pinjaman/index" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>1 Mata Pelajaran </h3>
                    <p>SMK Bandung Utara</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/Pinjaman/index" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>1 Kelas</h3>
                    <p>SMK Bandung Utara</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/Buku/index" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>1 Jurusan</h3>
                    <p>SMK Bandung Utara</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/Buku/index" class="small-box-footer">Lihat<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>1 Siswa Kelas X </h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/Pinjaman/index" class="small-box-footer">Pinjaman <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>1 Siswa Kelas XI </h3>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/Pinjaman/index" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>1 Siswa Kelas XII </h3>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/Buku/index" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

    </div>
</div>


</div>

<script>
// delete
function konfirmasiDelete(id) {
    $('#id').val(id);
}
</script>

<?= $this->endSection(); ?>