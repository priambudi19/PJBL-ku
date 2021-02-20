<?php  ?>
<body style="background-color: #303030;">
<div class="d-flex justify-content-center mt-3">
<img class="img-fluid" width="218" src="<?=base_url('/logo.png')?>" alt="Logo">
</div>
<div class="container col-lg-5 my-3">
    <div class="card shadow">
        <div class="card-header">
            Daftar Akun Guru
        </div>
        <div class="card-body">
            <?php if($this->session->flashdata('pesan')!=NULL){?>
                    <div class="alert alert-danger" role="alert">
                        <?=$this->session->flashdata('pesan')?>
                    </div>    
            <?php }?> 
                
            <?php echo form_open('register');?>
            
            <div class="form-group">
                <?= form_error('nama','<span class="text-danger">','</span><br>') ?>
                <label for="username">Nama</label>
                <input id="nama" class="form-control" type="text" name="nama" autofocus placeholder="Nama" value="<?php echo set_value('nama'); ?>" required>
            </div>
            <div class="form-group">
                <?= form_error('email','<span class="text-danger">','</span><br>') ?>
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" autofocus placeholder="Email" value="<?php echo set_value('email'); ?>" required>
            </div>
            
            <div class="form-group">
                <?= form_error('username','<span class="text-danger">','</span><br>') ?>
                <label for="username">Username</label>
                <input id="username" class="form-control" type="text" name="username" autofocus placeholder="Username" value="<?php echo set_value('username'); ?>" required>
            </div>
            <div class="form-group">
                <?= form_error('password','<span class="text-danger">','</span><br>') ?>
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
            </div>
            
            <div class="form-group">
                <?= form_error('password_conf','<span class="text-danger">','</span><br>') ?>
                <label for="password_conf">Password Confirmation</label>
                <input id="password_conf" class="form-control" type="password" name="password_conf" placeholder="Konfirmasi Password" value="<?php echo set_value('password_conf'); ?>" required>
            </div>

        <center><input type="submit" name="submit" class="btn btn-primary" value="Register"></input></center>
        <?php echo form_close();?>
    </div>
</div>

