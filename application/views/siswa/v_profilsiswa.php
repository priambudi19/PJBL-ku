
<div class="container-fluid mt-3 mx-2 p-4 bg-white shadow">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
</div>

<?php if($this->session->userdata('error')!=null){?>
<div class="alert alert-danger" role="alert">
   <?php echo $this->session->userdata('error') ?>
</div>
<?php } ?>

<table class="table table-hover">
    <tbody>
        <form action="<?=base_url('siswa/editprofil')?>" method="POST">
            <input type="hidden" name="id" value="<?= $this->session->userdata('id_kelompok'); ?>">
        <tr>
            <td>Nama Kelompok</td>
            <td>
                <span id="err_kelompok" class="text-danger err"></span>
                <input  disabled name="nama_kelompok" class="validate form-control" type="text" value="<?= $kelompok['nama_kelompok'] ?>" required>
                <input  name="last_nama_kelompok"  type="hidden" value="<?= $kelompok['nama_kelompok'] ?>">
            </td>
        </tr>
        <tr>
            <td>Anggota</td>
            <td>
                <!-- <input disabled name="anggota" class="validate form-control" type="text" value="<?php if($kelompok['anggota'] == null){ echo 'Belum ada';}else{echo $kelompok['anggota'];}?>" required>  -->
                <textarea name="anggota" id="anggota" cols="5" class="form-control" required disabled><?php if($kelompok['anggota'] == null){ echo 'Belum ada';}else{echo $kelompok['anggota'];}?></textarea>
            </td>
        </tr>
        <tr>
            <td>Username</td>
            <td>
                <input  disabled id="username" name="username" class="validate form-control" type="text" value="<?=$kelompok['username']?>" required>
                <input  name="last_username" type="hidden" value="<?= $kelompok['username'] ?>">
            </td>
        </tr>
        <tr>
            <td>Password Akun</td>
            <td>
                <input  disabled name="password" class="validate form-control" type="password" value="<?=$kelompok['password'] ?>" required>
            </td>
        </tr>
            
    </tbody>
</table>

<center>
    <input class="btn btn-success save d-none" type="submit" value="Save">
</form>
<button class="batal btn btn-danger d-none">Batal</button>
</center>

<center><button class="edit btn btn-primary" onclick="edit()">Edit</button></center>
<button onclick="kembali()" class="btn btn-danger mx-2 my-4">Kembali</button>
<script>



   function edit() {
       $('.edit').hide();
       $('.save').removeClass('d-none');
       $('.batal').removeClass('d-none');
       $('input').removeAttr('disabled');
       $('#anggota').removeAttr('disabled');
       $('#username').prop('disabled',true);
       
       
   }
   $('.batal').click(function(){
        
        window.location.reload();

   });



</script>