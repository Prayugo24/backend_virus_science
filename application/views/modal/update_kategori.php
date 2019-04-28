        <?php 
    foreach($data_kategori->result_array() as $data):
      $id_kategori=$data['id_kategori'];
    $kategori=$data['kategori'];
    ?>
        <div id="edit-kategori<?php echo $id_kategori;?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Kategori</h4>
              </div>
              <div class="modal-body">
                <form id="myForm" action="<?php echo base_url().'index.php/admin/update_kategori'; ?>" method="post" class="form-horizontal">
                  <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>">
                  <div class="form-group">
                    <label for="kategori" class="label-control col-md-4">Kategori</label>
                    <div class="col-md-8">
                      <input type="text" name="kategori" class="form-control" value="<?php echo $kategori; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                  <button type="submit" id="btnSave" class="btn btn-primary">Ubah</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
         <?php endforeach;?>