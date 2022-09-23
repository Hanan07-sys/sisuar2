<?= $this->extend('layout/surat/template'); ?>
<?= $this->section('content'); ?>
<div class="container">

    <h4 class="mt-3 mb-3">Tambah Surat Masuk</h4>
    <form class="row g-3 needs-validation" novalidate>
        <div class="col-6">
            <label for="validationCustom01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-6">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-6">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-6">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-6">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-6">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-6">
            <label for="validationCustom04" class="form-label">State</label>
            <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>

</div>








<?= $this->endSection(); ?>