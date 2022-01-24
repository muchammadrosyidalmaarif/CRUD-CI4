<!--header-->
<?php echo view('layout/header'); ?>
<?= $this->renderSection('title')?>


<div class="row">
       <div class="col-3">
           <h1>Provinsi di Indonesia</h1>
       </div>
</div>

<!--Tambah Provinsi-->
<a  href="<?=site_url('province/addprov')?>" type="button" class="btn btn-primary mb-3 ml-3">
            <i class="fas fa-plus"></i> Tambah Provinsi
</a>

<!--Flash Message-->
<?php if(session('sucess')): ?>
<div class="alert alert-success" role="alert">
   <i class="far fa-check-circle"> <?=session()->getFlashdata('sucess')?></i>
   <button class="close" data-dismiss="alert">X</button>
 </div>  
<?php endif?>
<!---->

<!--tabel tampil data-->
<div class="table-responsive p-2">
    <table class="table table-striped table-hover" id="prov">
        <thead>
            <tr class="table-dark">
                <td>Provinsi</td>
                <td>Aksi</td> 
            </tr> 
        </thead>  
        
        <!--Tampil Data-->
        <?php foreach ($tampildata as $key => $value) : ?>
        <tr>
            <td><?=$value->nama_provinsi?></td>
            <td>
            
              <!--edit-->
           <a href="/province/editprov/<?= $value->id_provinsi?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

            <!--delete-->
            <form action="/province/<?= $value->id_provinsi?>" method="post"  class="d-inline">
            <? csrf_field();?>
            <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </form>

          </td>           
        </tr>
        <?php endforeach ?>  
    </table>
    <!---->

    <!--footer-->
    <?= view('layout/footer'); ?>
    