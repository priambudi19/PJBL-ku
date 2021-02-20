<?php  ?>
<body style="background-color: #303030;">
<div class="d-flex justify-content-center mt-4">
<img class="img-fluid" width="218" src="<?=base_url('/logo.png')?>" alt="Logo">
</div>
<div class="container col-sm-4 mt-2">
    <div class="card shadow">
        <div class="card-header">
            Silakan Login
        </div>
        <div class="card-body">
            <?php if($this->session->flashdata('registered')!=NULL){?>
                    <div class="alert alert-warning" role="alert">
                        <?=$this->session->flashdata('registered')?>
                    </div>    
            <?php }?> 
            <?php if($this->session->flashdata('pesan')!=NULL){?>
                    <div class="alert alert-danger" role="alert">
                        <?=$this->session->flashdata('pesan')?>
                    </div>    
            <?php }?> 
                
            <form action="<?=base_url('auth/is_logged')?>" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input  required id="username" class="form-control" type="text" name="username" autofocus placeholder="Username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input required  id="password" class="form-control" type="password" name="password" autofocus placeholder="Password">
            
        </div>
        <center><input type="submit" class="btn btn-primary" value="Login"></input></form>
        <a href="<?=base_url('register')?>"><br><br><small>Buat Akun (Untuk Guru)</small></a></center>
    </div>
</div>

