<!-- modal Hapus -->
      <?php 
        foreach($data_jwbn_guru->result_array() as $data):
          $id_pertanyaan=$data['id_pertanyaan'];
          $id_jawaban=$data['id_jawaban'];
          $pertanyaan=$data['pertanyaan'];
          $jawaban=$data['jawaban'];
          $nama_siswa=$data['nama_siswa'];
          $status=$data['status'];
          $nip=$data['nip'];
          $nis=$data['nis'];
        ?>
    <div id="delete-jawaban-guru<?php echo $id_jawaban;?>"  class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <form action="<?=base_url()?>index.php/admin_guru/deleteJawabanGuru/<?=$id_jawaban?>/" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_soal" value="<?php echo $id_jawaban; ?>">
            <div class="modal-body">
              Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <button type="submit" id="btnDelete" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  <?php endforeach;?>