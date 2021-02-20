<?php
define('ADMIN',1);
define('GURU',2);
define('SISWA',3);




$user = $this->session->userdata('role');
switch ($user) {
    case GURU:
        $nav_title = 'Guru';
        $nama =  $this->session->userdata('nama');       
    break;
    case ADMIN:
        $nav_title = 'Admin';
        $nama =  $this->session->userdata('nama');
    break;
    case SISWA:
        $nama =  $this->session->userdata('nama_kelompok');
        $nav_title = 'Siswa';
        break;
}

?>

<body id="page-top" class="sidebar-toggled">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-light sidebar sidebar-light accordion shadow toggled" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <?php if($this->session->userdata('role')==GURU){ ?>
                        <i class="fas fa-user-tie"></i>
                    <?php }else if($this->session->userdata('role')==SISWA){ ?>
                        <i class="fas fa-user-graduate"></i>
                    <?php }else{ ?>
                        <i class="fas fa-tools"></i>
                    <?php } ?>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $nav_title ?></div>
            </a>
            <li class="nav-item active">
                <a href="#" class="nav-link">
                    <span><center>
                    <i> Logged As:<br> <?= $nama ?></i> </center>
                    </span>    
                </a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php $url = $this->uri->segment(2);
             if($user == GURU){ 
     
            ?>
        
            <li class="nav-item <?php if($url == "daftarkelas") echo "active";?>">
                <a href="<?=base_url('guru/daftarkelas')?>" class="nav-link">
                <i class="fas fa-chalkboard-teacher"></i>
                    <span>
                        Daftar Kelas
                    </span>    
                </a>
            </li>
            <?php if($url == 'projectdetail' || $url == 'pertanyaan'){?>
                <li class="nav-item <?php if($url == "pertanyaan") echo "active";?>">
                    <a href="<?=base_url('guru/pertanyaan/'.$this->uri->segment(3))?>" class="nav-link">
                <i class="fas fa-question-circle"></i>
                <span>
                    Pertanyaan Mendasar
                </span>    
            </a>
        </li>        
        <li class="nav-item <?php if($url == "projectdetail") echo "active";?>">
        <?php if($url == "projectdetail"){?>
            <a href="#" class="nav-link">
                <i class="fas fa-tasks"></i>
                    <span>
                        Project Detail
                    </span>    
            </a><?php }else if($url == "pertanyaan"){ ?>
                <a href="<?=base_url('guru/projectdetail/'.$this->uri->segment(3))?>" class="nav-link">
                <i class="fas fa-tasks"></i>
                    <span>
                        Project Detail
                    </span>    
            </a><?php } ?>    
        </li>
        <?php } ?>
            <li class="nav-item <?php if($url == "profil") echo "active";?>">
                <a href="<?=base_url('guru/profil/')?>" class="nav-link">
                <i class="fas fa-user-edit"></i>
                    <span>
                        Profile
                    </span>    
                </a>
            </li>

            <?php } ?>


            <?php $url = $this->uri->segment(2);
             if($user == SISWA){ 
     
            ?>
        
            <li class="nav-item <?php if($url == "detailproject") echo "active";?>">
                <a href="<?=base_url('siswa/detailproject')?>" class="nav-link">
                <i class="fas fa-tasks"></i>
                    <span>
                        Detail Project
                    </span>    
                </a>
                
            </li>
             <?php  if($url == "detailproject" || $url == "pertanyaan"){ ?> 
                <?php if(isset($project)){  ?>
                <li class="nav-item <?php if($url == "pertanyaan") echo "active";?>">
                <a href="<?=base_url('siswa/pertanyaan/')?>" class="nav-link">
                <i class="fas fa-question-circle"></i>
                    <span>
                        Pertanyaan
                    </span>   
                </a>
                
            </li>    
             <?php }else{?> 
                <li class="nav-item <?php if($url == "pertanyaan") echo "active";?>">
                <a href="<?=base_url('siswa/pertanyaan/')?>" class="nav-link">
                <i class="fas fa-question-circle"></i>
                    <span>
                        Pertanyaan
                    </span>   
                </a>
                
            
                <?php }}?>
            <li class="nav-item <?php if($url == "profil") echo "active";?>">
                <a href="<?=base_url('siswa/profil/')?>" class="nav-link">
                <i class="fas fa-user-edit"></i>
                    <span>
                        Profile
                    </span>    
                </a>
            </li>

            <?php } ?>



            <?php $url = $this->uri->segment(2);
             if($user == ADMIN){ 
     
            ?>
        
            <li class="nav-item <?php if($url == "daftarakun") echo "active";?>">
                <a href="#" class="nav-link">
                <i class="fas fa-database"></i>
                    <span>
                        Daftar Akun
                    </span>    
                </a>
            </li>

            <?php } ?>
            <li class="nav-item">
                <a href="<?= site_url('auth/logout') ?>" class="nav-link">
                    <i class="fas fa-sign-out-alt text-danger"></i>
                    <span style="font-style: italic;">
                        <strong class="text-danger"> LogOut</strong>
                    </span> 
                </a>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
  

            <!-- Main Content -->
            <div id="content" style="scrollbar-width: thin;">

                <!-- Topbar -->
                
                <div class="d-flex shadow" style="background-color: #303030;">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none d-lg-none rounded-circle ">
                        <i class="fa fa-bars text-light"></i>
                    </button>    
                    
                    <div class="d-flex justify-content-center my-1" style="width:100rem;">
                   <img src="<?=base_url('/logo.svg')?>" alt="Logo" width="100" class="mb-1">
                    </div>
                    
                </div>
                

                <!-- End of Topbar -->