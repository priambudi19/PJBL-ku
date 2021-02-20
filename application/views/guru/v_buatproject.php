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
    <?php foreach ($kelas as $k) { ?>
        <h5 class="text-primary">Kelas: <?= $k->nama_kelas ?></h5>
        <hr>
    <?php } ?>

    <div class="container rounded col-lg bg-white shadow p-3 mb-5">
        <form id="buatproject" action="<?= base_url('guru/saveproject') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_kelas" value="<?= $k->id ?>">
            <fieldset>
                <div class="form-group">
                    <label for="namaproject">Nama Project :</label>
                    <input id="namaproject" class="form-control" type="text" name="nama_project" required autofocus>
                </div>

                <div class="form-group">
                    <img class="my-1 rounded" id="output" width="100">
                    <label for="thumb">Foto (Thumbnail)</label><br>
                    <input id="thumb" type="file" name="thumb" onchange="openFile(event)">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi :</label>
                    <textarea id="deskripsi" class="form-control" type="text" name="deskripsi" required></textarea>
                </div>
                
                <input type="submit" class="btn btn-success btn-sm submit" value="Buat"></input>
            </fieldset>



        </form>
        <button onclick="kembali()" class="btn btn-danger mx-3 my-4">Kembali</button>
    </div>






    <!-- Milih tanggal tenggat -->




    <!-- thumnail -->
    <script>
        $('#output').hide();
        var openFile = function(event) {
            var input = event.target;

            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('output');
                output.src = dataURL;
                $('#output').show();
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>