<?php  ?>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<body class="bg-light">
   
    <div class="d-flex col-lg-12 col-sm-12  col-md-12 col-12  shadow " style="background-color: #303030;" >
            <div class="col-5 col-sm-5 col-md-5 col-lg-5  d-flex justify-content-start my-1 mx-5">
                <img src="<?= base_url('/logo.svg') ?>" alt="Logo" width="100" class="mb-1">
            </div>
            <div class="col-5 col-sm-5 col-md-5 col-lg-6  d-flex justify-content-end">

                <div class=" my-3 mx-1 d-none d-md-block d-lg-block">
                    <a href="<?=base_url('auth/login')?>" class="btn btn-sm btn-primary ">Login</a>
                </div>
                <div class=" my-3 mx-1 d-none d-md-block d-lg-block">
                    <a href="<?=base_url('register')?>" class="btn btn-sm btn-light ">Register <small><i>(Guru)</i></small></a>
                </div>
                <div class="my-3 mx-1 d-lg-none d-md-none">
                    <a href="<?=base_url('auth/login')?>" class="btn btn-sm btn-primary ">Login</a>
                </div>
                <div class="my-3 mx-1 d-lg-none d-md-none">
                    <a href="<?=base_url('register')?>" class="btn btn-sm btn-light ">Register <small><i>(Guru)</i></small></a>
                </div>
            </div>
    </div>

    <div class="container-fluid">
        <div class="card mx-2 pb-5 text-dark">
            <div class="card-body">
                <h2>
                    <i> Project Based Learning</i>
                </h2>
                <div class="row my-3">
                    <div class="col-lg-4 col-md-7 col-sm-12">
                        <img class="img-fluid center-cropped" src="<?=base_url()?>/illustrasi.jpg" alt="">
                    </div>
                    <div class="col-lg-8  col-md-5 col-sm-12 pt-3"><p >Menurut Thomas et al.(1999), sebagaimana dikutip oleh Wena (2009: 144) pembelajaran berbasis proyek merupakan model
pembelajaran yang memberikan kesempatan kepada guru untuk mengelola pembelajaran di kelas dengan melibatkan kerja proyek. Hal ini banyak digunakan untuk menggantikan metode pengajaran tradisional dimana guru sebagai pusat pembelajaran (Boondee et al., 2011: 499).</p>
                <p >
                Pembelajaran berbasis proyek dapat meningkatkan hasil belajar siswa, meningkatkan aktivitas dan keterlibatan siswa dalam
pembelajaran, menumbuhkan kreativitas dan karya siswa, lebih menyenangkan, bermanfaat serta lebih bermakna (Purworini, 2006:19).

                </p></div>
                </div>
                <hr>
                <div class="d-flex mt-2"> <center>
                    <div class="d-flex justify-content-center col-lg-8 col-md-8 col-8">
                    <span>Saat ini hadir teknologi yang memberi fasilitas untuk mengelola Project Based Learning secara digital dan mobile yang bisa digunakan oleh Guru maupun Siswa.</span>
                    </div>
                    <h4>Fitur Yang Disajikan: </h4>
            </center></div>
                <div class="row mx-2 justify-content-center">
                    <div class="card shadow mx-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                        <div class="card-body">
                        <center><h1><i class="far fa-question-circle"></i></h1></center>
                        <center><h5 class="card-title">Menentukan Pertanyaan Mendasar</h5></center>
                    
                    </div>
                </div>
                <div class="card shadow mx-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                    <div class="card-body">
                        <center><h1><i class="far fa-lightbulb"></i></h1></center>
                        <center><h5 class="card-title">Mendesain Perencanaan Project</h5></center>
                        
                    </div>
                </div>
                <div class="card shadow mx-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                    <div class="card-body">
                        <center><h1><i class="far fa-calendar-check"></i></h1></center>
                        <center><h5 class="card-title">Menyusun Jadwal</h5></center>
                        
                    </div>
                </div>
                
                <div class="card shadow mx-2 col-lg-2 col-sm-12 col-md-12 mt-2">
                    <div class="card-body">
                        <center><h1><i class="far fa-file-alt"></i></h1></center>
                        <center><h5 class="card-title">Menguji Proses dan Hasil Belajar</h5></center>
                        
                    </div>
                </div>
                
            </div>
        </div>

    </div>


    
<style>
    .center-cropped {
        object-fit: cover;
        /* Do not scale the image */
        object-position: center;
        
        /* Center the image within the element */

        border-radius: 10px;

    }
</style>