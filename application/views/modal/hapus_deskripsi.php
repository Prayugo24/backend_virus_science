    <?php 
    foreach($data_deskripsi->result_array() as $data):
      $id_deskripsi=$data['id_deskripsi'];
      $gambar = $data['gambar'];
    ?>
    <div id="delete-deskripsi<?php echo $id_deskripsi;?>"  class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/admin/delete_deskripsi'?>">
            <input type="hidden" name="id_deskripsi" value="<?php echo $id_deskripsi; ?>">
            <input type="hidden" name="gambar" value="<?php echo $gambar; ?>">
            <div class="modal-body">
              Anda yakin ingin mengahpus data ini?
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