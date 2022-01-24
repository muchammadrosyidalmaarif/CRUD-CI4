<!--header-->
<?php echo view('layout/header'); ?>
<?= $this->renderSection('title')?>


<div class="row">
       <div class="col-3">
           <h1>Data Siswa</h1>
       </div>
</div>

<!--Tambah Provinsi-->
<a  href="<?=site_url('kota/addkota')?>" type="button" class="btn btn-primary mb-3 ml-3">
            <i class="fas fa-plus"></i> Tambah Provinsi
</a>

<!--Flash Message-->
<? if(session('sucess')): ?>
<div class="alert alert-success" role="alert">
   <i class="far fa-check-circle"> <?=session()->getFlashdata('sucess')?></i>
   <button class="close" data-dismiss="alert">X</button>
 </div>  
<? endif?>
<!---->

<div class="row p-2">

<div class="col-3">
  
       <h5> Cari Berdasarkan Provinsi</h5>
     
       </div>
      
       <div class="col-3">
       <select class="form-control d-inline" id="provinsi">

       <option value="">---Pilih Nama Provinsi-----</option>
          <?php foreach ($provinsi as $prov) : ?>
          <option value="<?=$prov->id_provinsi?>"><?=$prov->nama_provinsi?></option>
          <?php endforeach ?>

        </select>
       </div>
</div>

<!--tabel tampil data-->
<div class="table-responsive p-2">
    <table class="table table-striped table-hover">
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
     