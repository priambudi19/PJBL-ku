<?php 
    // print_r($pertanyaan);    
    // echo "<pre>";
    // print_r ($kelompok);
    // echo "</pre>";
    //<?=base_url('guru/getJawabanPertanyaan')
?>

<!-- Begin Page Content -->
<div class="container-fluid mt-4">

<a href="<?=base_url('guru/jawabanfase/'.$id_fase)?>" class="btn btn-sm btn-primary m-2"><i class="fas fa-clipboard-list"></i>&nbsp;Lihat Jawaban Mendasar Lampiran & Penilaian</a>
<div class="col-lg-12 d-none d-md-block d-lg-block  ">
<table id="tabelpertanyaan2" class="table table-bordered table-stripped table-hover shadow ">
    <thead class="bg-light">
        <tr>
            <td>No.</td>
            <td>Pertanyaan</td>
            <td>Set Jawaban</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody class="bg-white">
        <?php $no=1; foreach($pertanyaan as $p){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $p->pertanyaan ?></td>
            <td><?= $p->set_jawaban?></td>
            <td>
                <button class="btn btn-sm btn-success" onclick="setjawaban(<?=$p->id?>)">Set Jawaban</button>
                <button class="btn btn-sm btn-warning" onclick="editpertanyaan(<?=$p->id?>)">Edit</button>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>
</div>

<?php $no=1; foreach($pertanyaan as $p){ ?>
    <div class="card my-2 d-lg-none d-md-none">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <small><strong>Pertanyaan:</strong></small><br>
                    <small><?= $p->pertanyaan ?></small>                    
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <small><strong>Set Jawaban:</strong></small><br>   
                    <small><?= $p->set_jawaban ?></small>   
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                    <button class="btn btn-sm btn-success" onclick="setjawaban(<?=$p->id?>)">Set Jawaban</button>
                    <button class="btn btn-sm btn-warning" onclick="editpertanyaan(<?=$p->id?>)">Edit</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




<h2>Jawaban:</h2>

<div class="col-lg-12 d-none d-md-block d-lg-block">
<table id="tabelpertanyaan" class="table table-bordered table-stripped table-hover shadow">
    <thead class="bg-light">
        <tr>
            <td>No.</td>
            <td>Kelompok</td>
            <td>Anggota</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody class="bg-white">
        <?php $no=1; foreach($kelompok as $k){ ?>
        <tr>
            <td><?= $no ?></td>
            <td id="kelompok<?=$k->id?>"><?= $k->nama_kelompok ?></td>
            <td><?= $k->anggota ?></td>
            <td>
            <button class="btn btn-primary"  kelompok="<?= $k->nama_kelompok ?>" onclick="jawaban(<?=$k->id?>)">Periksa Jawaban</button>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>
</div>

<div class="d-lg-none d-md-none"> 
<?php $no=1; foreach($kelompok as $k){ ?>
<div class="card my-2">
    <div class="card-header">
        <strong>#<?= $no ?>:&nbsp;</strong><span id="kelompok_mobile"><?= $k->nama_kelompok ?></span>
    </div>
    <div class="card-body">
        <small><strong>Anggota:</strong></small><br>   
        <small><?= $k->anggota ?></small><br>   
        <button class="btn btn-primary"  onclick="jawaban(<?=$k->id?>)">Periksa Jawaban</button>
    </div>
</div>
<?php $no++; } ?>
</div>

<div id="periksa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="card d-none d-md-block d-lg-block">
                <div class="card-header">
                    <span class="nama_kelompok"></span>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body ">
                    <span class="jawaban"></span>
                    <table  class="table table-hover table-bordered tabeljawaban">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                            </tr>
                        </thead>
                        <tbody class="isi">
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile -->
            <div class="card d-md-none d-lg-none">
                <div class="card-header">
                    <span class="nama_kelompok"></span>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="isi2">

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<div id="setjawaban" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Set Jawaban</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="lastpertanyaan" class="mx-2 my-3"></span>
                <form action="<?=base_url("guru/setjawabanpertanyaan")?>" method="POST">
                    <input type="hidden" name="id">
                    <input type="hidden" name="id_project">
                    <input required class="form-control" type="text" name="set_jawaban">
                    <div class="d-flex justify-content-center">
                        <input class="btn btn-sm btn-primary my-3 px-4" type="submit" name="submit" value="Set">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="editpertanyaan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Edit Pertanyaan</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editform" action="<?=base_url('guru/editpertanyaan')?>" method="post">
                    <input type="hidden" name="id">
                    <input type="hidden" name="id_project">
                    <input required type="text" class="form-control" name="pertanyaan">
                    <div class="d-flex justify-content-center my-3">
                        <input type="submit" value="Edit" class="btn btn-primary btn-sm px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<button onclick="kembali()" class="btn btn-danger mx-3 my-4">Kembali</button>
<script>

    function jawaban(id_kelompok) {
       var nama_kelompok =  $("#kelompok"+id_kelompok).text();
        $("#periksa").modal("toggle");
        $(".nama_kelompok").empty();
        $(".isi").empty();
        $(".isi2").empty();
        $('.tabeljawaban').show();
        $('.jawaban').show();
        const id_project = <?=$this->uri->segment(3)?> ;
        $.ajax({
            type: "post",
            url: "<?=base_url('guru/getJawabanPertanyaan')?>",
            data: {id_kelompok : id_kelompok , id_project : id_project},
            dataType: "json",
            success: function (data) {
                console.table(data);
                if(data[0] != null){                
                    $(".jawaban").empty();
                    $(".nama_kelompok").append("<strong class='text-primary'>"+data[0].nama_kelompok+"</strong>");
                    
                    $.each(data, function (i, hasil) {
                        var isi = "<tr>"+
                                    "<td>"+Number(i+1)+"</td>"+
                                    "<td>"+hasil.pertanyaan+"</td>"+
                                    "<td>"+hasil.jawaban+"</td>"
                                +"</tr>"; 
                        $(".isi").append(isi);
                        var isi2 = "<div><small>"+
                                    "<strong>"+"No#&nbsp; "+"</strong>"+
                                    "<i>"+Number(i+1)+"</i></strong><br>"+
                                    "<strong>"+"Pertanyaan:"+"</strong><br>"+
                                    "<i>"+hasil.pertanyaan+"</i><br>"+
                                    "<strong>"+"Jawaban:"+"</strong><br>"+
                                    "<i>"+hasil.jawaban+"</i><br>"
                                +"</small></div><hr>"; 
                        $(".isi2").append(isi2);
                    });

                }else{
                    
                  
                    $(".nama_kelompok").append("<strong class='text-primary'>"+nama_kelompok+"</strong>");
                    $('.tabeljawaban').hide();
                    $(".jawaban").append("Kelompok Ini belum menjawab");
                    $(".isi2").append("Kelompok Ini belum menjawab");
                }
            }
        });
    }

    function setjawaban(id){
        $('#setjawaban').modal('toggle');
        $.ajax({
            type: "post",
            url: "<?=base_url('guru/getpertanyaan')?>",
            data: {id:id},
            dataType: "json",
            success: function (data) {
                $('#lastpertanyaan').empty();
                $('#lastpertanyaan').append(data[0].pertanyaan);
                $("[name='id']").val(data[0].id);
                $("[name='id_project']").val(data[0].id_project);
                $("[name='set_jawaban']").val(data[0].set_jawaban);
            }
        });

    }
    function editpertanyaan(id){
        $("#editpertanyaan").modal('toggle');
        $.ajax({
            type: "post",
            url: "<?=base_url('guru/getpertanyaan')?>",
            data: {id:id},
            dataType: "json",
            success: function (data) {
                $('#editform').val("");
                $("[name='id']").val(data[0].id);
                $("[name='id_project']").val(data[0].id_project);
                $("[name='pertanyaan']").val(data[0].pertanyaan);
            }
        });

    }

 
</script>