<div id="input-limiter" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah limiter</h4>
              </div>
              <div class="modal-body">
                <form id="myForm" action="<?php echo base_url().'index.php/admin/insertLimiter'; ?>" method="post" class="form-horizontal">
                  
                  <div class="form-group">
                    <label for="kategori" class="label-control col-md-4">limiter</label>
                    <div class="col-md-8">
                      <input type="text" name="limiter" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                  <button type="submit" id="btnSave" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->