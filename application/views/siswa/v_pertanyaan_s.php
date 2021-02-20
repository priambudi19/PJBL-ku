<?php $id_kelompok = $this->session->userdata('id_kelompok');

?>
<div class="container-fluid">


<?php if($this->session->flashdata('kirim')!=null){ ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong><?= $this->session->flashdata('kirim'); ?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php } ?>
<?php if ($this->session->flashdata('upload') != null) { ?>
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            <strong><?= $this->session->flashdata('upload') ?></strong> <button class="btn btn-sm btn-success d-flex justify-content-end" href="#" onclick="kembali()"><strong>Edit Kembali</strong></button>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>


    <?php if(isset($pertanyaan)){ ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2 ">
    <div class="card">
        <div class="card-header text-primary"> <strong>Soal Soal Pertanyaan Mendasar</strong> </div>
        <div class="card-body">
        
    <table class="table table-hover table-bordered mt-3 shadow">
        <thead class="bg-light">
            <tr>
                <td>No</td>
                <td>Pertanyaan</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php $no = 1;
            foreach ($pertanyaan as $p) {
                $x = $no - 1;  ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $p->pertanyaan ?></td>
                    <td class="aksi" width="20%">
                        <button class="btn btn-sm btn-success" onclick="jawab(<?= $p->id ?>)">Jawab</button>
                        
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
        
    </div>
    </div>
    </div>
    <div id="jawabans" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <span id="pertanyaan"></span>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('siswa/kirimjawabanpertanyaan') ?>" method="POST">
                            <input type="hidden" name="id_pertanyaan">
                            <input type="hidden" name="id_kelompok" value="<?= $id_kelompok ?>">
                            <p>Jawaban:</p>
                            <input required type="text" class="form-control" name="jawaban">
                    </div>
                    <div class="card-footer">
                        <input id="submit" type="submit" class="btn btn-primary my-1">
                        </form>
                        <div id="jawabanguru">
                            
                        </div>
                        <button id="sudah_dijawab" data-dismiss="modal" class="btn btn-danger btn-sm my-1">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php } ?>



<script>
    function jawab(id_pertanyaan) {
        $("#jawabans").modal('toggle');
        $('#jawabanguru').empty();
        $.ajax({
            type: "post",
            url: "<?= base_url('siswa/cekjawabanpertanyaan') ?>",
            data: {
                id_pertanyaan: id_pertanyaan,
                id_kelompok: <?= $id_kelompok ?>
            },
            dataType: "json",
            success: function(cek) {
                if (cek == null) {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('siswa/getpertanyaanid') ?>",
                        data: {
                            id: id_pertanyaan
                        },
                        dataType: "json",
                        success: function(data) {
                            console.table(data);
                            $("#pertanyaan").empty();
                            $("#pertanyaan").append(data.pertanyaan);
                            $("[name='id_pertanyaan']").val(data.id);
                            $('[name="jawaban"]').prop('disabled', false);
                            $('[name="jawaban"]').val('');
                            $('#submit').show();
                            $('#sudah_dijawab').hide();
                        }
                    });
                } else {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('siswa/getpertanyaanid') ?>",
                        data: {
                            id: id_pertanyaan
                        },
                        dataType: "json",
                        success: function(data) {
                            $("#pertanyaan").empty();
                            $("#pertanyaan").append(data.pertanyaan);
                            $('[name="jawaban"]').val(cek.jawaban);
                            $('[name="jawaban"]').prop('disabled', true);
                            $('#submit').hide();
                            $('#sudah_dijawab').show();
                            var jawabanguru= "<div class='alert alert-info' role='alert'><strong>Jawaban yang tepat:</strong><br><p>"+data.set_jawaban+"</p></div>"
                            if(data.set_jawaban!=null)$('#jawabanguru').append(jawabanguru);
                        }
                    });
                }
            }
        });
    }
</script>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
<div class="card m-3 shadow">
    <div class="card-header ">
        <span class="text-primary"><strong> Fase ke-<?=$fase[0]->urutan_fase?> </strong></span>: <strong><?=$fase[0]->nama_fase?></strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-2">
                <img class="center-cropped img-fluid" src="<?php if($fase[0]->thumb != null){echo base_url('assets/fase/thumb/'.$fase[0]->thumb);}else{echo base_url('assets/fase/thumb/noimage.png');}?>" alt="">
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <table>
                    <tr><td><strong>Deskripsi</strong></td><td>: <?=$fase[0]->deskripsi?></td></tr>
                    <tr><td><strong>Lampiran </strong></td><td>: <a href="<?=base_url('assets/fase/'.$fase[0]->lampiran)?>"><?=$fase[0]->lampiran?></a></td></tr>
                    
                    <?php if(isset($jawaban_fase[0])){ ?>
                    <tr class="bg-gray-100"><td><strong>Nilai </strong></td><td>: <a href="#" class="badge  badge-sm <?php if($jawaban_fase[0]->nilai >=85){ echo "badge-primary";}elseif ($jawaban_fase[0]->nilai >=75)
                    {echo "badge-success"; }elseif ($jawaban_fase[0]->nilai >=58) { echo "badge-warning";}else{echo "badge-danger";}?>"><?=$jawaban_fase[0]->nilai?></a> </td></tr>
                    <tr class="bg-gray-100"><td><strong>Komentar </strong></td><td>: <?=$jawaban_fase[0]->komentar?></td></tr>
                    <?php } ?>
                </table>
                
            </div>
        </div>
    </div>
    
    <?php if($this->session->flashdata('jawaban')=='false'){ ?>
    <div class="card-footer jawaban">
        <h5 class="text-primary">Jawaban:</h5>
        <form action="<?=base_url('siswa/kirimjawaban')?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_project" value="<?=$fase[0]->id_project?>">
            <input type="hidden" name="id_fase" value="<?=$fase[0]->id?>">
            <input type="hidden" name="urutan_fase" value="<?=$fase[0]->urutan_fase?>">
            <div class="form-group">
                <label for="jawaban">Deskripsi Jawban</label>
                <textarea required id="jawaban" class="form-control" type="text" name="jawaban"></textarea>
            </div>
                <label for="lampiran">Lampiran : </label>
                <input id="lampiran" type="file" name="lampiran">


            <div class="d-flex row">
                 <div class="col d-flex justify-content-end">
                     <input class=" btn btn-success btn-sm" type="submit" value="Kirim Jawaban">
                 </div>
            </div>
        </form>
    </div>
   <?php }else{//print_r($jawaban_fase[0]);?>

    <div class="card-footer jawabanform">
        <h5 class="text-primary">Jawaban:</h5>
        <form action="<?=base_url('siswa/editjawaban')?>" method="POST" enctype="multipart/form-data">
             
            <input type="hidden" name="last_lampiran" value="<?= $jawaban_fase[0]->lampiran ?>">
            <input type="hidden" name="id_jawaban" value="<?= $jawaban_fase[0]->id ?>">
            <input type="hidden" name="id_project" value="<?=$fase[0]->id_project?>">
            <input type="hidden" name="urutan_fase" value="<?=$fase[0]->urutan_fase?>">
            <input type="hidden" name="id_fase" value="<?=$fase[0]->id?>">
            <div class="form-group">
                <label for="jawaban">Deskripsi Jawaban</label>
                <textarea  required disabled id="jawaban" class="form-control jawaban" type="text" name="jawaban"><?=$jawaban_fase[0]->jawaban?></textarea>
            </div>
                <label for="lampiran">Lampiran : </label>
                <a class="lampiran" href="<?=base_url('assets/fase/jawaban/'.$jawaban_fase[0]->lampiran)?>"> <?= $jawaban_fase[0]->lampiran ?> </a>
                <input  class="lampiran d-none" id="lampiran" type="file" name="lampiran" value="<?= $jawaban_fase[0]->lampiran ?>">

            <div class="d-flex row">
                 <div class="col d-flex justify-content-end">
                     <?php if($jawaban_fase[0]->nilai == null || $jawaban_fase[0]->komentar == null) {?>
                     <button data-toggle="modal" data-target="#my-modal" class="btn btn-warning edit2" type="button">Edit Jawaban</button>
                     <input   class=" btn btn-success btn-sm save d-none" type="submit" value="Save Jawaban">
                     <?php } ?>
                     
                 </div>
            </div>
        </form>

    </div>
    <?php  } ?>
</div>
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Yakin akan mengedit tugas? Mengedit tugas dapat membuat tanggal terkirim berub berubah</p>
                <button class="btn btn-success edit" data-dismiss="modal">Edit</button>
                <button class="btn btn-danger batal" data-dismiss="modal" >Batal</button>
            </div>
        </div>
    </div>
</div>
</div>
<button onclick="kembali()" class="btn btn-danger mx-3 my-4">Kembali</button>

<style>
.center-cropped {
    object-fit: cover; /* Do not scale the image */
    object-position: center; /* Center the image within the element */
    width: 150px;
    height: 150px;
    border-radius: 20%;
 }
</style>

<script>
    
    $(".edit").click(function () {
        $(".jawaban").removeAttr("disabled");
        $(".lampiran").removeClass("d-none");
        $(".save").removeClass("d-none");
        $(".batal").removeClass("d-none");
        $(".edit2").addClass("d-none");
        

      })
        


</script>
