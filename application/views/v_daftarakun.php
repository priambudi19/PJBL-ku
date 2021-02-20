

<!-- Begin Page Content -->
<div class="container-fluid mt-4">

        <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>



<div class="card shadow mb-2">
    <div class="card-header">
        Daftar Akun
    </div>
    <div class="card-body">
        <div class="table-responsive d-none d-md-block d-lg-block">
            <table class="table table-hover " id="daftarakun">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Aktivasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($akun as $p) { ?>
                    <tr>
                    <th><?= $no ?></th>
                    <th><?= $p->nama ?></th>
                    <th><?= $p->username ?></th>
                    <th><?= $p->password ?></th>
                    <th>
                        <?php switch($p->role){
                            case 1:
                                ?> <span class="badge badge-pill badge-dark">Admin</span><?php 
                            break; 
                            case 2:
                                ?> <span class="badge badge-pill badge-info">Guru</span><?php 
                            break;
                            case 3:
                                ?> <span class="badge badge-pill badge-warning">Kelompok Siswa</span><?php 
                            break;} ?>
                    </th>
                    <th>
                        <?php switch($p->aktivasi){
                                case 0:
                                    ?> <span class="badge badge-pill badge-danger"><i class="fas fa-times-circle"></i>&nbsp;Belum Aktif</span><?php 
                                break;
                                case 1:
                                    ?> <span class="badge badge-pill badge-success"><i class="fas fa-check-circle"></i>&nbsp;Aktif</span><?php 
                                break;} ?>    
                    </th>
                    <th>
                        <button onclick="updateData(<?= $p->id ?>)" class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#modalupdate"><i class="far fa-edit"></i>Update</button>
                        <button onclick="deleteData(<?= $p->id ?>)" class="btn btn-danger btn-sm" type="button"  data-toggle="modal" data-target="#modaldelete"><i class="far fa-trash-alt"></i>Delete</button>
        
                    </th>
                </tr>
            <?php $no++; } ?>
            </tbody>
            </table>
        </div>




<div id="modalupdate" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Update Akun</h5>
            </div>
            <div class="modal-body">
                <form id="formupdate" action="<?=base_url('admin/updateDataAkun')?>" method="POST">
                        <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>


                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" class="custom-select" name="role" >
                            <option value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option value="3">Kelompok</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aktivasi">Aktivasi</label>
                        <select name="aktivasi" class="custom-select" >
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>

                                       
                    


                    <br>
                    <center><span>
                    <input id="aksi" type="submit" class="btn btn-success" value="Update"></input>
                    <button data-dismiss='modal' class="btn btn-danger">Batal</button></span>
                </form>

            </div>
        </div>
    </div>
</div>
<div id="modaldelete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete Akun</h5>
            </div>
            <div class="modal-body">
                <form id="formdelete" action="<?=base_url('admin/deleteAkun')?>" method="POST">
                        <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="nama" disabled required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" disabled  required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="text" name="password" disabled required>
                    </div>


                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" class="custom-select" name="role"  disabled>
                            <option value="1">Admin</option>
                            <option value="2">Guru</option>
                            <option value="3">Kelompok</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="aktivasi">Aktivasi</label>
                        <select name="aktivasi" class="custom-select"  disabled>
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                    <br>
                    <center><span>
                    <input id="aksi" type="submit" class="btn btn-danger" value="Delete"></input>
                    <button data-dismiss='modal' class="btn btn-dark">Batal</button></span>
                </form>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
       $('#daftarakun').DataTable();
    });

</script>

<script>
    var id;
    
    function updateData(x) { 
        id = x; 
    $('#modalupdate').ready(function () {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/ambilDataAkunId') ?>",
            data: {id:id},
            dataType: "json",
            success: function (data) {
                
                $('[name="id"]').val(data[0].id);
                $('[name="nama"]').val(data[0].nama);
                $('[name="username"]').val(data[0].username);
                $('[name="password"]').val(data[0].password);
                $('[name="role"]').val(data[0].role);
                $('[name="aktivasi"]').val(data[0].aktivasi);
               
            }
        });        
      });      
    }
    function deleteData(x) { 
        id = x; 
    $('#modaldelete').ready(function () {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/ambilDataAkunId') ?>",
            data: {id:id},
            dataType: "json",
            success: function (data) {
                $('[name="id"]').val(data[0].id);
                $('[name="nama"]').val(data[0].nama);
                $('[name="username"]').val(data[0].username);
                $('[name="password"]').val(data[0].password);
                $('[name="role"]').val(data[0].role);
                $('[name="aktivasi"]').val(data[0].aktivasi);

              
            }
        });        
      });      
    }
</script>

                