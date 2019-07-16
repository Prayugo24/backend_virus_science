<!-- modal Hapus -->
      <?php 
        foreach($data_siswa->result_array() as $data):
          $id_siswa=$data['id_siswa'];
          $nis=$data['nis'];
          $nama=$data['nama'];
        ?>
    <div id="delete-siswa<?php echo $id_siswa;?>"  class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <form action="<?=base_url()?>index.php/admin_guru/deletedataSiswa/<?=$id_siswa?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_guru" value="<?php echo $id_siswa; ?>">
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