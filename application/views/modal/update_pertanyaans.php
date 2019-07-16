<?php 
        foreach($data_pertanyaanS->result_array() as $data):
          $id_pertanyaan=$data['id_pertanyaan'];
          $pertanyaan=$data['pertanyaan'];
          $nama_siswa=$data['nama_siswa'];
          $status=$data['status'];
          $nip=$data['nip'];
          $nis=$data['nis'];
        ?>
        <div id="edit-pertanyaans<?php echo $id_pertanyaan;?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Jawab Pertanyaan</h4>
              </div>
              <div class="modal-body">
                <form action="<?=base_url()?>index.php/admin_guru/tambahDataJawaban" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_pertanyaan" value="<?php echo $id_pertanyaan; ?>">
                <input type="hidden" name="nip" value="<?php echo $nip; ?>">
                <input type="hidden" name="nis" value="<?php echo $nis; ?>">
                <input type="hidden" name="pertanyaan" value="<?php echo $pertanyaan; ?>">
                <div class="form-group">
                  <label for="soal" class="label-control col-md-4">Pertanyaan</label>
                  <div class="col-md-8">
                    <textarea disabled="disabled" name="pertanyaan" id="" cols="10" class="form-control" rows="5" required><?php echo $pertanyaan; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="soal" class="label-control col-md-4">Jawaban</label>
                  <div class="col-md-8">
                    <textarea name="jawaban" id="" cols="10" class="form-control" rows="5" required></textarea>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <button type="sumbit" id="btnSave" class="btn btn-primary">Simpan </button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach; ?>


