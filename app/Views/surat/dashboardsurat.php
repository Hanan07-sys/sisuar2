<?= $this->extend('layout/surat/template'); ?>
<?= $this->section('content'); ?>

<div class="container" style="width:500px">
    <!-- <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <canvas id="suratmasuk"></canvas>
        </div>
        <div class="col">
            <canvas id="suratkeluar"></canvas>
        </div>
        <div class="col">
            <canvas id="surattugas"></canvas>
        </div>
    </div> -->

    <canvas id="suratdashboard"></canvas>
</div>
<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card" style="background-color: #FF5C7E;" border-radius:10>
                <div class="card-body">
                    <h5 class="card-title">Surat Masuk</h5>
                    <p class="card-text">Jumlah Surat Masuk : <?= $jumlahSuratMasuk ?> </p>
                    <a href="<?= base_url('/SuratMasuk') ?>" class="btn btn-success">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="background-color: #36A2EB;" border-radius:10>
                <div class="card-body">
                    <h5 class="card-title">Surat Keluar</h5>
                    <p class="card-text">Jumlah Surat Keluar : <?= $jumlahSuratKeluar ?></p>
                    <a href="<?= base_url('/SuratKeluar') ?>" class="btn btn-success" style="">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="background-color: #FFCD55;" border-radius:10>
                <div class="card-body">
                    <h5 class="card-title">Surat Tugas</h5>
                    <p class="card-text">Jumlah Surat Tugas :<?= $jumlahSuratTugas ?></p>
                    <a href="<?= base_url('/SuratTugas') ?>" class="btn btn-success">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<hr class="style1" style="border-top: 1px solid #8c8b8b">
<br>

<div class="container ml-8 mt-1">
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Tambah
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#masuk" href="#">Surat Masuk</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#keluar" href="#">Surat Keluar</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tugas" href="#">Surat Tugas</a></li>
        </ul>
    </div>
    <div class="container mt-4">
        <div class="tablebox" style="width: 1300px;">
            <table id="table" class="table table-striped" style="width:100%">
                <thead>
                    <tr style="background-color: #8c8b8b;color:white">
                        <th>Jenis</th>
                        <th>No surat</th>
                        <th>Tujuan</th>
                        <th>Perihal</th>
                        <th>Tanggal</th>
                        <th>Isi Ringkas</th>
                        <th>Berkas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suratmasuk as $sm) : ?>
                        <tr>
                            <td><?= $sm['jenis_surat'] ?></td>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['tujuan_surat'] ?></td>
                            <td><?= $sm['perihal'] ?></td>
                            <?php $date = date('d-m-Y', strtotime($sm['tanggal_masuk'])) ?>
                            <td><?= $date ?></td>
                            <td><?= $sm['isi_ringkas'] ?></td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($suratkeluar as $sm) : ?>
                        <tr>
                            <td><?= $sm['jenis_surat'] ?></td>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['tujuan_surat'] ?></td>
                            <td><?= $sm['perihal'] ?></td>
                            <?php $date = date('d-m-Y', strtotime($sm['tanggal_keluar'])) ?>
                            <td><?= $date ?></td>
                            <td><?= $sm['isi_ringkas'] ?> </td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($surattugas as $sm) : ?>
                        <tr>
                            <?php $dateMulai = date('d-m-Y', strtotime($sm['tanggal_mulai'])) ?>
                            <?php $dateSelesai = date('d-m-Y', strtotime($sm['tanggal_selesai'])) ?>
                            <td><?= $sm['jenis_surat'] ?></td>
                            <td><?= $sm['no_surat'] ?></td>
                            <td><?= $sm['tempat_tujuan'] ?></td>
                            <td><?= $sm['keperluan'] ?></td>
                            <td><?= $dateMulai ?> s/d <?= $dateSelesai ?></td>
                            <td><?= $sm['beban_biaya'] ?> </td>
                            <td>
                                <a href="<?= base_url('asset/pdf/' . $sm['file']) ?>"><?= $sm['file'] ?> </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>



            </table>
        </div>
    </div>

</div>


<!-- Modal MASUK -->
<div class="modal fade" id="masuk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/BerandaSurat/tambahSuratMasukDashboard') ?>" class="row g-3" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">No surat</label>
                        <input type="text" class="form-control" id="no_surat" placeholder="C-5/PANRB/CG53/03/2022" name="no_surat" auttofocus>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Asal Surat</label>
                        <input type="text" class="form-control" id="asal_surat" name="asal_surat">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Tujuan</label>
                        <input type="text" class="form-control" id="tujuan_surat" name="tujuan_surat">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Isi Ringkas</label>
                        <input type="text" class="form-control" id="perihal" name="isi ringkas">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Terlaksana</label>
                        <select id="ket_surat" class="form-select" name="ket_surat">
                            <option value="Ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Alasan</label>
                        <input type="text" class="form-control" id="perihal" name="alasan">
                    </div>
                    <div class="col-12">
                        <label for="inputZip" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="inputZip" name="file">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="keluar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/BerandaSurat/tambahSuratKeluarDashboard') ?>" class="row g-3" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">No surat</label>
                        <input type="text" class="form-control" id="no_surat" placeholder="C-5/PANRB/CG53/03/2022" name="no_surat" auttofocus>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Tujuan Surat</label>
                        <input type="text" class="form-control" id="tujuan_surat" name="tujuan_surat" ">
                    </div>
                    <div class=" col-12">
                        <label for="inputAddress" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Isi Ringkas</label>
                        <input type="text" class="form-control" id="isi_ringkas" name="isi_ringkas">
                    </div>
                    <div class="col-12">
                        <label for="inputZip" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="inputZip" name="file">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tugas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/BerandaSurat/tambahSuratTugasDashboard') ?>" class="row g-3" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">No surat</label>
                        <input type="text" class="form-control" id="no_surat" placeholder="C-5/PANRB/CG53/03/2022" name="no_surat" auttofocus>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Keperluan </label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Tempat Tujuan</label>
                        <input type="text" class="form-control" id="tempat_tujuan" name="tempat_tujuan">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Beban Biaya</label>
                        <input type="text" class="form-control" id="beban_biaya" name="beban_biaya">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tgl_rilis" name="tgl_rilis">
                    </div>

                    <div class="col-12">
                        <label for="inputZip" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="inputZip" name="file">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>