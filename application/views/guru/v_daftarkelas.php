<?php
// if($this->session->userdata('role')==null) echo "kosong";
//print_r($this->session->userdata('role'));
?>



<!-- Begin Page Content -->


<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kelas</h1>
    </div>

    <div class="col-xs-5 col-sm-5 col-md-12 col-lg-12 mb-3 d-none d-md-block">
        <div class="card shadow ">
            <div class="card-header">
                <button class="float-sm-right btn btn-sm btn-primary " data-toggle="modal" data-target="#tambahkelas"><i class="fas fa-plus-circle"></i>&nbsp;Tambah Kelas</button>&nbsp;
                Daftar Kelas Yang Diampu
            </div>
            <div class="card-body">
                <table id="tabelkelas" class="table table-hover table-bordered ">
                    <thead class="bg-light">
                        <tr>
                            <td width="7%">No.</td>
                            <td>Nama Kelas</td>
                            <td width="30%">Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kelas as $k) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $k->nama_kelas ?></td>
                                <td>
                                    <a href="<?= base_url('guru/kelas/' . $k->id) ?>" class="btn btn-success btn-sm">Masuk Kelas</a>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-warning btn-sm" onclick="editkelas(<?= $k->id ?>)">Edit</button>
                                        <button class="btn btn-danger btn-sm " onclick="deletekelas(<?= $k->id ?>)">Delete</button>
                                    </div>

                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mb-3">

        <button class="float-sm-right float-md-right btn btn-sm btn-primary d-lg-none" data-toggle="modal" data-target="#tambahkelas"><i class="fas fa-plus-circle"></i>&nbsp;Tambah Kelas</button>&nbsp;
    </div>
    <div class="d-lg-none d-md-none mx-1 my-2">
        <?php $no = 1;
        foreach ($kelas as $k) { ?>
            <div class="card shadow my-2">
                <center>
                    <div class="card-header"><small>#<?= $no ?></small> <strong> Nama Kelas:</strong>&nbsp;<?= $k->nama_kelas ?></div><br>
                <div class="d-flex flex-column mb-3">
                    <div>
                        <a href="<?= base_url('guru/kelas/' . $k->id) ?>" class="btn btn-success btn-sm">Masuk Kelas</a>
                        <div class="btn-group" role="group">
                            <button class="btn btn-warning btn-sm" onclick="editkelas(<?= $k->id ?>)">Edit</button>
                            <button class="btn btn-danger btn-sm " onclick="deletekelas(<?= $k->id ?>)">Delete</button>
                        </div>
                    </div>
                </div>
            </center>
            </div>
        <?php $no++;
        } ?>
    </div>

    <div id="editkelas" class="modal fade editkelas" tabindex="-1" role="dialog" aria-labelledby="editkelas" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editkelas">Edit Nama Kelas</h6>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="editform" action="">
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas:</label>
                            <input  class="form-control" type="text" name="nama_kelas"  required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success save">Save</button>
                </div>
            </div>
        </div>
    </div>
    <div id="deletekelas" class="modal fade deletekelas" tabindex="-1" role="dialog" aria-labelledby="deletekelas" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletekelas">Delete Kelas</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="deleteform" action="#">
                        <div class="form-group">
                            <label for="dl_nama_kelas">Nama Kelas:</label>
                            <input id="dl_nama_kelas" class="form-control" type="text" name="nama_kelas">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger delete">Delete</button>
                    <button class="btn btn-dark delete" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div id="tambahkelas" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        Tambah Kelas
                        <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('guru/tambahkelas') ?>" method="POST">
                            <div class="form-group">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input  class="form-control" type="text" name="nama_kelas" required>
                            </div>
                            <center><input type="submit" class="btn btn-success" value="Tambah"></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $("#tabelkelas").DataTable({
                responsive: true
            });

            $("form").bind("keypress", function(e) {
                if (e.keyCode == 13) {
                    return false; // Menonaktifkan Enter pd keyboard
                }
            });
        });

        function editkelas(id) {
            $(".editkelas").modal('toggle');
            $.ajax({
                type: "post",
                url: "<?= base_url('guru/ambilkelas') ?>",
                data: {
                    id_kelas: id
                },
                dataType: "json",
                success: function(data) {
                    console.table(data);
                    $("[name='nama_kelas']").val(data[0].nama_kelas);
                }
            });

            $(".save").click(function() {
                var x = $('[name="nama_kelas"]').val();
                //alert(x);
                $.ajax({
                    type: "post",
                    url: "<?= base_url('guru/editkelas') ?>",
                    data: {
                        id_kelas: id,
                        nama_kelas: x
                    },
                    dataType: "json",
                    success: function() {}
                });
                window.location.reload(true);
            })

        }

        function deletekelas(id) {
            $(".deletekelas").modal('toggle');
            $.ajax({
                type: "post",
                url: "<?= base_url('guru/ambilkelas') ?>",
                data: {
                    id_kelas: id
                },
                dataType: "json",
                success: function(data) {
                    console.table(data);
                    $("#dl_nama_kelas").val(data[0].nama_kelas);
                    $("#dl_nama_kelas").prop("disabled", true);

                }
            });

            $(".delete").click(function() {
                $.ajax({
                    type: "post",
                    url: "<?= base_url('guru/deletekelas') ?>",
                    data: {
                        id_kelas: id
                    },
                    dataType: "json",
                    success: function() {

                    }
                });
                window.location.reload(true);
            })
        }
    </script>