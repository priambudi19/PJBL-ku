<!-- Begin Page Content -->
<div class="container-fluid mt-4">
  <a href="<?=base_url('guru/pertanyaan/'.$id_project)?>" class="btn btn-sm btn-info"><i class="fas fa-question-circle"></i>&nbsp; Lihat Jawaban Soal Mendasar</a>
  <?php if ($listjawaban != null) { ?>

    <h3>Jawaban Fase-<?= $listjawaban[0]->urutan_fase ?> : <?= $listjawaban[0]->nama_fase ?> </h3>
    <!-- Collapsable Card Example -->
    <?php $no=1; foreach ($listjawaban as $l) { ?>
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample<?=$no?>" class="d-block card-header collapsed py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample<?=$no?>">
          <h6 class="m-0 font-weight-bold text-primary">Kelompok : <?= $l->nama_kelompok ?></h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse" id="collapseCardExample<?=$no?>">
          <div class="card-body">
            <small class="text-primary"> Anggota: </small><small> <?= $l->anggota ?> </small>
            <hr>
            <strong> Jawaban: </strong><br><?= $l->jawaban ?><br>
            <strong> Dikirim Tgl: </strong><br><?= $l->dikirim ?><br>
            <strong> Lampiran:</strong> <?php if (($l->lampiran) != NULL) { ?>
              <br><a href="<?= base_url('assets/fase/jawaban/' . $l->lampiran) ?>"><?= $l->lampiran ?></a>
                                  <?php } else {
                                    echo "Tidak Ada";
                                  } ?>
            <?php $no++; if($l->nilai ==  null || $l->komentar == null){ ?>
            <div class="mt-2">
              <form method="post" action="<?=base_url('guru/beriNilaiFase')?>">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?=$l->id?>">
                    <input type="hidden" name="id_fase" value="<?=$l->id_fase?>">
                      <label for="nilai">Nilai</label>
                      <input required type="number" class="form-control" name="nilai" placeholder="Beri nilai" >
                      <label for="komentar">Komentar</label>
                      <textarea name="komentar" class="form-control" cols="30" rows="3" placeholder="Beri masukan untuk tugas ini"></textarea>
                  </div>
                  <input type="submit" class="btn btn-success" >
              </form>
            </div>
            <?php }else{ ?>
              <form method="post" action="<?=base_url('guru/beriNilaiFase')?>">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?=$l->id?>">
                    <input type="hidden" name="id_fase" value="<?=$l->id_fase?>">
                      <label for="nilai">Nilai</label>
                      <input required type="number" class="form-control" name="nilai"  value="<?=$l->nilai?>" readonly>
                      <label for="komentar">Komentar</label>
                      <textarea name="komentar" class="form-control" cols="30" rows="3" readonly><?= $l->komentar ?></textarea>
                  </div>
                  <button id="simpan" class="btn btn-primary d-none" type="submit">Simpan</button>
                </form>
                <button id="edit"class="btn btn-success" onclick="editnilai()" >Edit</button>
            <?php } ?>
          </div>
        </div>
      </div>



    <?php } ?>
  <?php }else{ ?>

    <div class="d-flex justify-content-center mt-5">
        <span class="text-dark"><h1>Belum Ada Yang Menjawab</h1></span>
    </div>

  <?php } ?>
  <button onclick="kembali()" class="btn btn-danger mx-3 my-4">Kembali</button>
  <script>
    function editnilai() {
         
           $('[name="nilai"]').removeAttr('readonly');      
           $('[name="komentar"]').removeAttr('readonly');      
           $('#simpan').removeClass('d-none');      
           $('#edit').addClass('d-none');      

    }
  </script>