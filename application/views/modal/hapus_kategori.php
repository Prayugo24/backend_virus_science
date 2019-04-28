    <?php 
    foreach($data_kategori->result_array() as $data):
      $id_kategori=$data['id_kategori'];
    ?>
    <div id="delete-kategori<?php echo $id_kategori;?>"  class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/admin/delete_kategori'?>">
            <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
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