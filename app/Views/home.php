<?= $this->extend('layout/dashboard/template'); ?>
<?= $this->section('content'); ?>

<div class="container text-center mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <img src="asset\suraticon.png" class="card-img-top" alt="...">
                <div class="card-body">

                    <a href="<?= base_url('/BerandaSurat') ?>">
                        <button type="button" class="btn btn-primary btn-lg" style="width:300px;">Surat</button>
                    </a>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="asset\arsipicon.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="<?= base_url('/BerandaArsip') ?>">
                        <button type="button" class="btn btn-primary btn-lg" style="width:300px;">Arsip</button>
                    </a>

                </div>
            </div>
        </div>

        <?= $this->endSection(); ?>