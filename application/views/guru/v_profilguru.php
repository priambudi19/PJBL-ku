<?php //print_r($guru);  ?>

<div class="container-fluid mt-3 mx-2 p-4 bg-white shadow">
    

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
</div>



<table class="table table-hover">
    <tbody>
        <form action="<?=base_url('guru/editprofil')?>" method="POST">
            <input type="hidden" name="id" value="<?=$guru['id']?>">
        <tr>
            <td>Nama</td>
            <td><input disabled name="nama" class="form-control" type="text" value="<?= $guru['nama'] ?>" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <span id="err_email" class="text-danger"></span>
                <input disabled name="email" class="form-control validate" type="email" value="<?= $guru['email'] ?>" required>    
                <input  name="last_email" type="hidden" value="<?= $guru['email'] ?>">
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>
                <span id="err_username" class="text-danger"></span>
                <input  name="last_username" type="hidden" value="<?= $guru['username'] ?>">
                <input id="username" disabled name="username" class="form-control validate" type="text" value="<?= $guru['username'] ?>" required>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input disabled name="password" class="form-control" type="password" value="<?= $guru['password'] ?>" required></td>
        </tr>
            
    </tbody>
</table>

<center>
    <input class="btn btn-success save d-none" type="submit" value="Save">
</form>
<button class="batal btn btn-danger d-none">Batal</button>
</center>

<center><button class="edit btn btn-primary" onclick="edit()">Edit</button></center>
<button onclick="kembali()" class="btn btn-danger mx-3 my-4">Kembali</button>
<script>
   function edit() {
       $('.edit').hide();
       $('.save').removeClass('d-none');
       $('.batal').removeClass('d-none');
       $('input').removeAttr('disabled');
       $('#username').prop('disabled',true);
   }
   $('.batal').click(function(){
        
        window.location.reload();

   });

   
</script>

