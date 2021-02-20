<?php  ?>



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
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $kelas[0]->nama_kelas ?></h1>
    </div>
    <hr>
    <div class="my-3">
        <a href="<?= base_url('guru/buatproject/') . $this->uri->segment(3) ?>" class="btn btn-success">Buat Project</a>
    </div>
    <div class="row">
        <?php 
        $random = array("primary","secondary","danger","warning","success","dark","info");
        
        if ($project != NULL) {
            foreach ($project as $p) { ?>
                <?php 
                $x = $random[mt_rand(0,5)];
                if ($p->thumb == NULL) {
                    $p->thumb = 'noimage.png';
                } ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-<?=$x?> shadow h-100 py-1">
                        <img class="center-cropped card-img-top " src="<?= base_url('assets/' . $p->thumb); ?>" alt="Card image cap">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-<?=$x?> text-uppercase mb-1"><?= $p->nama_project ?></div>
                                    <div class="mb-0 text-gray-800"><?= $p->deskripsi ?></div>
                                    
                                    <a href="<?= base_url('guru/projectdetail/' . $p->id) ?>" class="badge badge-dark">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
    <button onclick="kembali()" class="btn btn-danger mx-3 my-4">Kembali</button>

    <style>
        .center-cropped {
            object-fit: cover;
            /* Do not scale the image */
            object-position: center;
            /* Center the image within the element */
            height: 150px;


        }
    </style>