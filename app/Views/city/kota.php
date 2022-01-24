<!--header-->
<?php echo view('layout/header'); ?>
<?= $this->renderSection('title')?>


<div class="row">
       <div class="col-3">
           <h1>Kota dan Provinsi di Indonesia</h1>
       </div>
</div>

<!--Tambah Provinsi-->
<a  href="<?=site_url('kota/addkota')?>" type="button" class="btn btn-primary mb-3 ml-3">
            <i class="fas fa-plus"></i> Tambah Kota
</a>

<!--Flash Message-->
<?php if(session('sucess')): ?>
<div class="alert alert-success" role="alert">
   <i class="far fa-check-circle"> <?=session()->getFlashdata('sucess')?></i>
   <button class="close" data-dismiss="alert">X</button>
 </div>  
<?php endif?>
<!---->

<
          
<!--tabel tampil data-->
<div class="table-responsive p-2">
    <table class="table table-striped table-hover" id="tabelKota">
        <thead>
            <tr class="table-dark">
                <td>Kota</td>
                <td>Provinsi</td>
                <td>Jumlah Penduduk</td>
                <td>Aksi</td> 
            </tr> 
        </thead>  
        
        <!--Tampil Data-->
        <?php foreach ($tampilkota as $key => $value) : ?>
        <tr>
            <td><?=$value->nama_kota?></td>
            <td><?=$value->nama_provinsi?></td>
            <td><?=$value->jml_penduduk?></td>
            <td>
            
              <!--edit-->
           <a href="/kota/editkota/<?= $value->id_kota?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

            <!--delete-->
            <form action="/kota/<?= $value->id_kota?>" method="post"  class="d-inline">
            <? csrf_field();?>
            <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus permanen?')"><i class="fas fa-trash-alt"></i></button>
            </form>

          </td>           
        </tr>
        <?php endforeach ?>  
    </table>
    <!----> 
  
    <!--footer-->
    <?= view('layout/footer'); ?>
     