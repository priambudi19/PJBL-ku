<?php  ?>
<script src="<?= base_url() ?>assets/js/jquery.datetimepicker.full.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/js/jquery.datetimepicker.css">
<body id="page-top">


                <!-- Begin Page Content -->
                <div class="container-fluid mt-4">

       
                <div class="container rounded col-lg bg-white shadow p-3 mb-5">
                    <form id="buatproject" action="<?=base_url('guru/editsaveproject')?>" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <input type="hidden" name="id_project" value="<?=$project->id?>">
                            <input type="hidden" name="last_thumb" value="<?=$project->thumb?>">
                            <div class="form-group">
                                <label for="namaproject">Nama Project :</label>
                                <input required id="namaproject" class="form-control" type="text" name="nama_project" value="<?=$project->nama_project?>">
                            </div>

                            <div class="form-group">
                                <img class="my-1 rounded" id="output" width="100">
                                <label for="thumb">Foto (Thumbnail)</label>: <span class="lastthumb"><?=$project->thumb?></span> <br>
                                <img class="center-cropped" src="<?=base_url('assets/'.$project->thumb)?>" alt="">
                                <input id="thumb" type="file" name="thumb" onchange="openFile(event)">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi :</label>
                                <textarea required id="deskripsi" class="form-control" type="text" name="deskripsi"><?=$project->deskripsi?></textarea>
                            </div>
                            
                            <input type="submit" class="btn btn-success btn-sm submit" value="Save"></input>
                        </fieldset>
                        


                    </form>
                    <button onclick="kembali()" class="btn btn-danger mx-3 my-4">Kembali</button>
                </div>




                <script>
             ////kosong
                </script>


                    <!-- Milih tanggal tenggat -->
                <script>
                   $("#tenggat").datetimepicker();
                </script>

                

                    <!-- thumnail -->
                <script>
                    $('#output').hide();
                    var openFile = function(event) {
                    var input = event.target;

                    var reader = new FileReader();
                    reader.onload = function(){
                    var dataURL = reader.result;
                    var output = document.getElementById('output');
                    output.src = dataURL;
                    $('#output').show();
                    };
                    reader.readAsDataURL(input.files[0]);
                    $(".center-cropped").hide();
                    $(".lastthumb").hide();
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