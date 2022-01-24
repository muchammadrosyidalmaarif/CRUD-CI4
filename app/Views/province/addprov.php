<?php echo view('layout/header'); ?>

<?= $this->renderSection('title')?>
    <form action="<?= site_url('province/addprov/create') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3 p-2">
                    <label class="form-label">Nama Provinsi</label>
                    <input type="text" class="form-control" name="nama_provinsi">
                </div>
                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    
    </form>
<?= view('layout/footer'); ?>