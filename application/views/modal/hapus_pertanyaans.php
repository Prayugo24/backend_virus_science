<!-- modal Hapus -->
      <?php 
        foreach($data_pertanyaanS->result_array() as $data):
          $id_pertanyaan=$data['id_pertanyaan'];
          $pertanyaan=$data['pertanyaan'];
          $nama_siswa=$data['nama_siswa'];
          $status=$data['status'];
          $nip=$data['nip'];
          $nis=$data['nis'];
        ?>
    <div id="delete-pertanyaans<?php echo $id_pertanyaan;?>"  class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <form action="<?=base_url()?>index.php/admin_guru/deletedataPertanyaanS/<?=$id_pertanyaan?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_pertanyaan" value="<?php echo $id_pertanyaan; ?>">
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