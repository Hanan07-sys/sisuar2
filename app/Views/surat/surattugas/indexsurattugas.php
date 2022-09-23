<?= $this->extend('layout/surat/template'); ?>
<?= $this->section('content'); ?>


<div class="container ml-8">
    <center>
        <div class="container mt-1">
            <h2>
                Surat Tugas
            </h2>
        </div>
    </center>

    <button type="button" class="btn btn-primary mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Tambah Surat
    </button>
    <div class="tablebox" style="width: 1300px;">
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No surat</th>
                    <th>keperluan</th>
                    <th>Tempat</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Biaya</th>
                    <th>Tanggal surat</th>
                    <th>Berkas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($surattugas as $sm) : ?>
                    <tr>
                        <?php $dateMulai = date('d-m-Y', strtotime($sm['tanggal_mulai'])) ?>
                        <?php $dateSelesai = date('d-m-Y', strtotime($sm['tanggal_selesai'])) ?>
                        <td><?= $sm['no_surat'] ?></td>
                        <td><?= $sm['keperluan'] ?></td>
                        <td><?= $sm['tempat_tujuan'] ?></td>
                        <td><?= $dateMulai?> s/d <?=$dateSelesai ?></td>
                        <td><?= $sm['beban_biaya'] ?></td>
                        <td><?= $sm['tgl_rilis'] ?> </td>
                        <td>
                            <a href="<?= base_url('asset/pdf/' . $sm['file'])?>"><?= $sm['file'] ?> </a>
                        </td>
                        <td>
                            <button type="button " class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#formedit-<?= $sm['id_surat'] ?>">
                                <a><i class="fas fa-edit"></i></a>
                            </button>
                            <form action="<?= base_url('SuratTugas/' . $sm['id_surat']) ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin');"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/SuratTugas/tambahSuratTugas') ?>" class="row g-3" method="post"  enctype="multipart/form-data">
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

<?php foreach ($surattugas as $sm) : ?>
<!-- ModalEdit -->
<div class="modal fade" id="formedit-<?= $sm['id_surat'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Surat Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('/SuratTugas/tambahSuratTugas') ?>" class="row g-3" method="post"  enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">No surat</label>
                        <input type="text" class="form-control" id="no_surat" placeholder="C-5/PANRB/CG53/03/2022" name="no_surat" value="<?= $sm['no_surat']?>" auttofocus>
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Keperluan </label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?= $sm['keperluan']?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Tempat Tujuan</label>
                        <input type="text" class="form-control" id="tempat_tujuan" name="tempat_tujuan" value="<?= $sm['tempat_tujuan']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?= $sm['tanggal_mulai']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?= $sm['tanggal_selesai']?>">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Beban Biaya</label>
                        <input type="text" class="form-control" id="beban_biaya" name="beban_biaya" value="<?= $sm['beban_biaya']?>">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tgl_rilis" name="tgl_rilis" value="<?= $sm['tgl_rilis']?>">
                    </div>

                    <div class="col-12">
                        <label for="inputZip" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="inputZip" name="file" value="<?= $sm['file']?>">
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
<?php endforeach; ?>

<?= $this->endSection(); ?>