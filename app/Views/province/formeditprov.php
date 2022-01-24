<?php echo view('layout/header'); ?>
<title>Tes JMC-Edit Prov</title>


    <form action="<?= site_url('province/editprov/update/') .$id_provinsi->id_provinsi?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3 p-2">
                    <input type="hidden" name="id_provinsi" value="<?=$id_provinsi->id_provinsi?>" >
                    <label for="exampleInputEmail1" class="form-label">Nama Provinsi</label>
                    <input type="text" class="form-control" name="nama_provinsi" value="<?=$id_provinsi->nama_provinsi?>">
                    <button type="submit" class="btn btn-primary ml-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    
    </form>

<?= view('layout/footer'); ?>