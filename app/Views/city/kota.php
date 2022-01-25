<!--header-->
<?php echo view('layout/header'); ?>
<?= $this->renderSection('title')?>

<div class="row">
       <div class="col-3">
           <h1>filter</h1>
       </div>

       <div class="col-3">
       <select name="id_provinsi" id="id_provinsi" class="form-control" required>

        <option value="" hidden></option>
        <?php foreach ($provinsi as $prov) : ?>
        <option value="<?=$prov->id_provinsi?>"><?=$prov->nama_provinsi?></option>
        <?php endforeach ?>

</select>
       </div>
</div>
<div class="row">
       <div class="col-3">
           <h1>Kota dan Provinsi di Indonesia</h1>
       </div>
</div>

<!--Tambah Provinsi-->
<a  href="<?=site_url('kota/addkota')?>" type="button" class="btn btn-primary mb-3 ml-3">
            <i class="fas fa-plus"></i> Tambah Kota </a>

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
    <table class="table table-striped table-hover" id="tabelKota">
        <thead>
            <tr class="table-dark">
                <td>Kota</td>
                <td>Jumlah Penduduk</td>
                
            </tr> 
        </thead>  
      <tbody></tbody>
    </table>
    <!----> 


    <!--javascript filter-->
    <script src="<?= base_url('template/vendor/jquery/jquery.min.js')?>"></script>
    <script>
    $(function () {
      $('#tabelKota').DataTable();
       
        const getData = (id_provinsi) => {
            $('#tabelKota').DataTable({
                processing: false,
                serverSide: false,
                destroy:true,
                ajax: {
                url: "<?= base_url('/kota/filter')?>"+'?id_provinsi='+id_provinsi,
                type: "GET",
                credentials: "same-origin"
                },
                columns: [
                   
                    { data: "nama_kota" },
                    { data: "jml_penduduk"},
                ]
            });
        }
        getData('');
        $('#id_provinsi').on('change', function(e){
          let id_provinsi= $(this).val();
          getData(id_provinsi);
        })
    });
</script>
    <!--footer-->
    <?= view('layout/footer'); ?>
     