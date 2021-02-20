<div class="container-fluid">

    <div id="buatkelompok" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        Buat kelompok
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('guru/buatKelompok') ?>" method="post">
                            <input type="hidden" name="id_project" value="<?= $this->uri->segment(3) ?>">
                            <div class="form-group">
                                <label for="jumlah_kelompok">Jumlah Kelompok:</label>
                                <input required class="form-control jumlah_kelompok" type="number" name="jumlah_kelompok">
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <input type="submit" class=" btn btn-success" value="Buat"></form>&nbsp;
                            <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="buatfase" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        Tambah Fase
                    </div>
                    <div class="card-body">

                        <?php if ($fase != null) { ?>
                            <form action="<?= base_url('guru/buatfase') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_project" value="<?= $this->uri->segment(3) ?>">
                                <div class="form-group">
                                    <label for="fase">Fase ke:</label>
                                    <input id="fase" class="form-control fase" type="number" name="urutan_fase">
                                </div>
                                <div class="form-group">
                                    <label for="nama_fase">Nama Fase</label>
                                    <input required id="nama_fase" class="form-control" type="text" name="nama_fase">
                                </div>
                                <img class="my-1 rounded" id="output" width="100">
                                <div class="form-group">
                                    <label for="lampiran">Thumbnail</label>
                                    <input id="lampiran" type="file" name="thumb" onchange="openFile(event)">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea required id="deskripsi" class="form-control" type="text" name="deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lampiran">Lampiran</label><small style="font-size:12px" class="text-primary">&nbsp;&nbsp;(Max 2048kB)</small><br>
                                    <input id="lampiran" type="file" name="lampiran">
                                    <br><small>File yang diperbolehkan : zip, rar, pdf, doc, ppt, pptx, odt, docx, jpg, jpeg, png, gif </small>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_akses">Waktu Akses:</label>
                                    <input required id="waktu_akses" class="form-control form-control-sm" type="datetime-local" name="waktu_akses" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="tenggat">Tenggat Waktu:</label>
                                    <input required id="tenggat" class="form-control form-control-sm" type="datetime-local" name="tenggat" autocomplete="off">
                                </div>

                            <?php } else { ?>
                                <form action="<?= base_url('guru/buatpertanyaan') ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_project" value="<?= $this->uri->segment(3) ?>">
                                    <div class="form-group">
                                        <label for="fase">Fase ke:</label>
                                        <input id="fase" class="form-control form-control-sm fase" type="number" name="urutan_fase" value="1" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_fase">Nama Fase</label>
                                        <input required id="nama_fase" class="form-control form-control-sm" type="text" name="nama_fase" value="Pertanyaan Mendasar" readonly>
                                    </div>
                                    <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea required id="deskripsi" class="form-control" type="text" name="deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="lampiran">Lampiran</label><small style="font-size:12px" class="text-primary">&nbsp;&nbsp;(Max 2048kB)</small><br>
                                    <input id="lampiran" type="file" name="lampiran">
                                    <br><small>File yang diperbolehkan : zip, rar, pdf, doc, ppt, pptx, odt, docx, jpg, jpeg, png, gif </small>
                                </div>
                                    
                                    <div class="form-group">
                                        <label for="jml">Jumlah Pertanyaan:</label>
                                        <select class="form-control form-control-sm jmlpertanyaan" name="jml" id="#jml">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <div class="fieldset">
                                            <p>Pertanyaan</p>
                                            <input type="text" name="pertanyaan[]" class="form-control form-control-sm" placeholder="Masukan Pertanyaan Mendasar!" required>
                                        </div>
                                    </div>



                                <?php } ?>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="tambah btn btn-success" value="Submit"></input>&nbsp;
                            </form>
                            <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div id="akun" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card d-none d-md-block d-lg-block">
                    <div class="card-header">
                        Data Akun Kelompok
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        </button>
                    </div>
                    <div class="card-body">
                        <table class=" table table-light table-hover table-bordered" style="font-size: 11pt">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kelompok</th>
                                    <th>Anggota</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody class="dataakun">

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <button data-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                        </div>
                    </div>
                </div>

                <div class="card d-md-none d-lg-none">
                    <div class="card-header">
                        Data Akun Kelompok
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body row" id="dataakun2">

                    </div>
                    <div class="d-flex justify-content-end m-4">
                        <button data-dismiss="modal" class="btn btn-danger btn-sm">Back</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="editfase" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    Edit Fase
                </div>
                <div class="card-body">

                    <form action="<?= base_url('guru/editfase') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_project" value="<?= $this->uri->segment(3) ?>">
                        <input type="hidden" name="id_fase">
                        <div class="form-group">
                            <label for="nama_fase">Nama Fase</label>
                            <input required id="nama_fase" class="form-control" type="text" name="nama_fase">
                        </div>
                        <img class="my-1 rounded" id="lastthumb" width="100">
                        <img class="my-1 rounded" id="outputedit" width="100">
                        <div class="form-group">
                            <label for="thumb">Thumbnail</label>
                            <input id="thumb" type="file" name="thumb" onchange="openFile(event)">
                            <input id="thumb" type="hidden" name="thumb_last">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea required id="deskripsi" class="form-control" type="text" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lampiran">Lampiran</label><small style="font-size:12px" class="text-primary">&nbsp;&nbsp;(Max 2048kB)</small><br>
                            <input id="lampiran" type="file" name="lampiran">
                            <br><small>File yang diperbolehkan : zip, rar, pdf, doc, ppt, pptx, odt, docx, jpg, jpeg, png, gif </small>
                            <input id="lampiran" type="hidden" name="lampiran_last">
                        </div>
                        <span id="lastlampiran"></span>
                        <div class="form-group">
                            <label for="waktu_akses">Waktu Akses:</label>
                            <input required id="waktu_akses" class="form-control form-control-sm" type="text" name="waktu_akses" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tenggat">Tenggat Waktu:</label>
                            <input required id="tenggat" class="form-control form-control-sm" type="text" name="tenggat" autocomplete="off">
                        </div>
                        <input type="submit" class="btn btn-success" value="Edit">
                        <button class="btn btn-danger " data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Begin Page Content -->
<div class="container-fluid mb-5">
<?php if ($this->session->flashdata('upload') != null) { ?>
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            <strong><?= $this->session->flashdata('upload') ?></strong> <button class="btn btn-sm btn-success d-flex justify-content-end" href="#" onclick="kembali()"><strong>Edit Kembali</strong></button>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php //print_r($this->session->flashdata('kirim'));
    if ($this->session->flashdata('kirim') != null) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('kirim') ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <!-- Page Heading -->
    <div class="d-flex row">
        <div class="col-3 py-1 ">
            <button class="akun btn btn-info btn-sm" data-toggle="modal" data-target="#akun">Data Akun Kelompok</button>
        </div>
        <div class="col-9 d-flex justify-content-end p-1">
            <button data-toggle="modal" data-target="#buatfase" class="btn btn-success btn-sm mx-1"><i class="fas fa-step-forward"></i>&nbsp;Buat Fase</button>
            <?php if ($this->session->flashdata('cek_kelompok') == "true") { ?>
                <button data-toggle="modal" data-target="#buatkelompok" class="btn btn-success mx-1"><i class="fas fa-users"></i></i>&nbsp;Buat Kelompok</button>
            <?php } ?>

        </div><br>
    </div>

    <div class="card">
        <div class="card-header">
            Info Project
        </div>
        <div class="card-body">
            <?php foreach ($project as $p) { ?>
                <div class="row">
                    <?php if ($p->thumb != null) { ?>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                            <img src="<?= base_url('assets/' . $p->thumb) ?>" alt="" class="center-cropped">
                        </div>
                    <?php } ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 mt-2">
                        <strong>Nama Project</strong>&emsp; : <?= $p->nama_project ?><br>
                        <strong>Deskripsi</strong>&emsp;&emsp;&emsp; : <?= $p->deskripsi ?><br>

                    </div>
                    <div class="mt-4 d-flex col-lg-12 col-sm-5 col-md-12 col-12 justify-content-end justify-content-sm-start justify-content-xs-center">
                        <a href="<?= base_url('guru/editproject/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-warning">Edit Project</a>&nbsp;
                        <button class="deleteproject btn btn-sm btn-danger">Delete Project</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div><br>

    <?php // print_r($fase) 
    ?>

    <!-- Card Header - Accordion -->
    <?php $no = 1;
    $color = ['info', 'warning', 'primary', 'success', 'danger', 'dark'];
    $v = 0;
    foreach ($fase as $f) {
        $y = mt_rand(0, 5);
        if ($y == $v) {
            if ($y == 0) {
                $y++;
            } elseif ($y == 5) {
                $y--;
            } else {
                $y++;
            }
        }
        $x = $color[$y];  ?>
        <div class="card shadow mb-4">

            <a href="#collapseCardExample<?= $no ?>" class="d-block card-header py-3 collapsed bg-<?= $x ?>" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <?php $v = $y ?>
                <h6 class="m-0  ts">Fase ke- <?= $f->urutan_fase ?> : <?= $f->nama_fase ?> </h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseCardExample<?= $no ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-2 col-md-12">
                            <img class="center-cropped" src="<?php if (($f->thumb) != NULL) {
                                                                    echo base_url('assets/fase/thumb/' . $f->thumb);
                                                                } else {
                                                                    echo base_url('assets/fase/thumb/' . 'noimage.png');
                                                                } ?>" alt="Thumbnail">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                            <?php if ($no != 1) { ?>
                                <div class="d-flex justify-content-end mx-2 mt-1">
                                    <small><strong class="text-primary">Tenggat: </strong><?= $f->tenggat ?></small>&nbsp;
                                    <small><strong class="text-primary">Waktu Akses: </strong><?= $f->waktu_akses ?></small>
                                </div>
                                <hr>
                            <?php } ?>
                            <strong>Deskripsi</strong><br><?= $f->deskripsi ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <strong>Lampiran: </strong>
                                    <a href="<?= base_url('assets/fase/' . $f->lampiran) ?>"><?= $f->lampiran ?></a>
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-end">
                                        <?php if ($no != 1) { ?>
                                            <button class="btn btn-warning btn-sm" onclick="editfase(<?= $f->id ?>)">Edit Fase</button>
                                            &nbsp;
                                            <a href="<?= base_url('guru/jawabanfase/' . $f->id) ?>" class="btn btn-primary btn-sm">Lihat Jawaban Kelompok</a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('guru/jawabanfase/' . $f->id) ?>" class="btn btn-primary btn-sm"><i class="fas fa-clipboard-list"></i>&nbsp;Lihat Jawaban Lampiran & Penilaian</a>&nbsp;
                                                <a href="<?= base_url('guru/pertanyaan/' . $f->id_project) ?>" class="btn btn-info btn-sm"><i class="fas fa-question-circle"></i>&nbsp;Lihat Jawaban Soal Mendasar</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $no++;
    } ?>


    <div id="deleteproject" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex justify-content-center">
                            Yakin Akan Menghapus Project Ini?
                        </div>

                    </div>
                    <div class="card-body">
                        <?php foreach ($project as $p) { ?>
                            <center><img src="<?= base_url('assets/' . $p->thumb) ?>" alt="" class="center-cropped"></center>
                            <div class="container m-1 d-flex justify-content-center">
                                <div>
                                    <strong>Nama Project</strong>&emsp; : <?= $p->nama_project ?><br>
                                    <strong>Deskripsi</strong>&emsp;&emsp;&emsp; : <?= $p->deskripsi ?><br>

                                </div>
                            </div>
                            <hr>
                            <div class="d-flex col-12 justify-content-end">
                                <button class="deleteconfirm btn btn-sm btn-danger">Delete Project</button>&nbsp;
                                <button class="btn btn-sm btn-dark" data-dismiss="modal">Batal</button>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <button onclick="kembali()" class="btn btn-danger mx-3 my-4">Kembali</button>
</div>
<script>
    var id_project = <?= $this->uri->segment(3) ?>;



    function editfase(id_fase) {
        $("#editfase").modal('toggle');
        $("form").val("");
        $("#outputedit").removeAttr("src");
        $.ajax({
            type: "post",
            url: "<?= base_url('guru/getfasebyid') ?>",
            data: {
                id_fase: id_fase
            },
            dataType: "json",
            success: function(data) {
                console.table(data);
                if (data.thumb == "") $("#lastthumb").hide();

                $("[name='waktu_akses']").removeAttr('type')
                $("[name='tenggat']").removeAttr('type')
                var x = "<?php echo base_url('assets/fase/thumb/') ?>"
                if (data.thumb != null) {
                    $("#lastthumb").attr('src', x + data.thumb)
                }
                $("[name='id_fase']").val(id_fase);
                $("[name='nama_fase']").val(data.nama_fase);
                $("[name='deskripsi']").val(data.deskripsi);
                $("[name='waktu_akses']").val(data.tenggat);
                $("[name='waktu_akses']").click(function() {
                    $("[name='waktu_akses']").attr('type', 'datetime-local')
                });
                $("[name='tenggat']").val(data.tenggat);
                $("[name='tenggat']").click(function() {
                    $("[name='tenggat']").attr('type', 'datetime-local')
                });
                if (data.thumb != null) {
                    $("[name='thumb_last']").val(data.thumb);
                    $("[name='thumb']").val(data.thumb);
                }
                if (data.lampiran != null) {
                    $("[name='lampiran_last']").val(data.lampiran);
                    $("[name='lampiran']").val(data.lampiran);
                }
                $("[name='waktu_akses']").val(data.waktu_akses);
                $("#lastlampiran").append(data.lampiran);
                $("[name='lampiran']").change(function() {
                    $("#lastlampiran").empty();
                });

            }
        })

    }


    $(document).ready(function() {

        $(".jmlpertanyaan").change(function(e) {
            $(".fieldset").empty();
            var jml = $('[name="jml"]').val();
            for (var i = 1; i <= jml; i++) {
                var field = '<small>Pertanyaan <strong>' + i + '</strong></small><input type="text" class="form-control form-control-sm" name="pertanyaan[]" required>';

                $(".fieldset").append(field);
            }
        });

        $("#buatfase").on('shown.bs.modal', function() {

            $('.note').hide();
            $.ajax({
                type: "post",
                url: "<?= base_url('guru/getfase') ?>",
                data: {
                    id_project: id_project,
                },
                dataType: "json",
                success: function(data) {
                    var c = Number(data['jumlah']);
                    $("form").val("");
                    $(".fase").val(c + 1);
                    $(".fase").prop('readonly', true);

                }
            });

        })



        $("#buatkelompok").on('shown.bs.modal', function() {
            $("#buatkelompokbtn").click(function() {
                //alert($(".jumlah_kelompok").val())
                $.ajax({
                    type: "post",
                    url: "<?= base_url('guru/buatKelompok') ?>",
                    data: {
                        id_project: id_project,
                        jumlah_kelompok: $(".jumlah_kelompok").val()
                    },
                    dataType: "json",
                    success: function(data) {
                        alert("berhasil");
                    }
                });
            })


        })
    });


    var tabel;
    $("#akun").on('shown.bs.modal', function() {

        if (tabel == null) {
            $.ajax({
                type: "post",
                url: "<?= base_url('guru/showkelompok') ?>",
                data: {
                    id_project: id_project
                },
                dataType: "json",
                success: function(data) {
                    console.table(data);
                    $.each(data, function(i, atribut) {
                        console.log(i + atribut.nama_kelompok)
                        tabel = "<tr>" +
                            "<td>" + Number(i + 1) + "</td>" +
                            "<td>" + atribut.nama_kelompok + "</td>" +
                            "<td>" + atribut.anggota + "</td>" +
                            "<td>" + atribut.username + "</td>" +
                            "<td>" + atribut.password + "</td>" +
                            "</tr>"

                        ;
                        $(".dataakun").append(tabel);
                        tabel2 = "<div class='col-sm-6'><div class='card my-2 mx-1'><div class='card-header'><small><strong>" + Number(i + 1) + "#&nbsp;" + atribut.nama_kelompok + "<strong></small></div>" +
                            "<div class='card-body'><small><strong>Anggota:</strong><br>" + atribut.anggota + "<br><strong>Username:</strong><br>" + atribut.username + "<br><strong>Password:</strong><br>" + atribut.password + "</small></div></div>";
                        $("#dataakun2").append(tabel2);

                    });
                }
            });
        }
    });

    $(".deleteproject").click(function() {

        $("#deleteproject").modal("toggle");
        $(".deleteconfirm").click(function() {
            $.ajax({
                type: "post",
                url: "<?= base_url('guru/deleteproject') ?>",
                data: {
                    id_project: id_project
                },
                dataType: "json",
                success: function() {

                }

            });
            window.history.back();
        })
    })
</script>



<script>
    $('#output').hide();
    $('#outputedit').hide();
    var openFile = function(event) {

        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('output');
            var outputedit = document.getElementById('outputedit');
            output.src = dataURL;
            outputedit.src = dataURL;
            $('#output').show();
            $('#outputedit').show();
            $("#lastthumb").hide();
        };
        reader.readAsDataURL(input.files[0]);
    };
</script>

<style>
    .center-cropped {
        object-fit: cover;
        /* Do not scale the image */
        object-position: center;
        /* Center the image within the element */
        height: 130px;
        width: 130px;
        border-radius: 10px;

    }
</style>