<?php

?>

<!-- Begin Page Content -->
<div class="container-fluid mt-4">
    <?php if ($this->session->flashdata('upload') != null) { ?>
        <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
            <strong><?= $this->session->flashdata('upload') ?></strong> <button class="btn btn-sm btn-success d-flex justify-content-end" href="#" onclick="kembali()"><strong>Edit Kembali</strong></button>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="card">
        <div class="card-header">

            <div class="d-flex">
                Info Project


            </div>
        </div>
        <div class="card-body">
            <?php foreach ($project as $p) { ?>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-2 mr-1">
                        <img src="<?php if (($p->thumb_project) != null) {
                                        echo base_url('assets/' . $p->thumb_project);
                                    } else {
                                        echo base_url('assets/noimage.png');
                                    } ?>" alt="" class="img-fluid center-cropped">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-9 mt-3">
                        <strong>Nama Project</strong>&emsp; : <?= $p->nama_project ?><br>
                        <strong>Deskripsi</strong>&emsp;&emsp;&emsp; : <?= $p->deskripsi_project ?><br>
                        <br>

                    </div>

                </div>
            <?php } ?>
        </div>
    </div><br>




    <!-- Card Header - Accordion -->
    <?php if (isset($fase)) {
        $no = 1;
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
                            <div class="col-sm-12 col-lg-2 col-md-12">
                                <img class="center-cropped" src="<?php if (($f->thumb) != NULL) {
                                                                        echo base_url('assets/fase/thumb/' . $f->thumb);
                                                                    } else {
                                                                        echo base_url('assets/fase/thumb/' . 'noimage.png');
                                                                    } ?>" alt="Thumbnail">
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-10">
                                <?php if ($no != 1) { ?>
                                    <div class="d-flex justify-content-end mt-2">
                                        <small><strong class="text-primary">Tenggat: </strong><?= $f->tenggat ?></small> &nbsp;&nbsp;
                                        <small><strong class="text-primary"> Waktu Akses: : </strong><?= $f->waktu_akses ?></small>
                                    </div>
                                <?php } ?>
                                <hr><strong>Deskripsi</strong> <br>
                                <?= $f->deskripsi ?>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4 ">
                                      
                                            <strong>Lampiran: </strong> <?php if ($f->lampiran != null) { ?>
                                                <a href="<?= base_url('assets/fase/' . $f->lampiran) ?>"><?= $f->lampiran ?></a>
                                            <?php } else {
                                                                            echo "Tidak Ada";
                                                                        } ?>
                                            <br>
                                  
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-end">

                                            <?php if ($no != 1) { ?>
                                                <?php if (strtotime($f->waktu_akses) <= strtotime('now')) { ?>
                                                    <a href="<?= base_url('siswa/detailfase/' . $f->id) ?>" class="btn btn-primary btn-sm">Detail</a>
                                                <?php } else { ?>
                                                    <button class="btn btn-sm btn-danger">Belum Masuk Waktu</button>
                                                <?php } ?>
                                            <?php } else { ?>

                                                <a href="<?= base_url('siswa/pertanyaan/' . $this->session->userdata('id_project')) ?>" class="btn btn-primary btn-sm">Detail</a>
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
        }
    } ?>




    <style>
        .center-cropped {
            object-fit: cover;
            /* Do not scale the image */
            object-position: center;
            /* Center the image within the element */
            height: 150px;
            width: 150px;
            border-radius: 20%;


        }
    </style>