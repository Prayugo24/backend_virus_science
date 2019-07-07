        <div id="edit-deskripsi" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Deskripsi</h4>
              </div>
              <div class="modal-body">
                <form id="myForm" action="<?php echo base_url().'index.php/admin/update_deskripsi'; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                  <input type="hidden" id="id_deskripsi" name="id_deskripsi">

                  <div class="form-group">
                    <label for="nama_organ" class="label-control col-md-4">Nama Materi</label>
                    <div class="col-md-8">
                      <input type="text" name="nama_materi" id="nama_materi" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                  <label for="id_kategori" class="label-control col-md-4">Kategori</label>
                    <div class="col-md-8">
                      <select type="number" name="id_kategori" id="id_kategori" class="form-control" required>
                       <option value="0">-PILIH-</option>
                       <?php foreach($data_kategori->result() as $rel):?>
                        <option value="<?php echo $rel->id_kategori;?>"><?php echo $rel->kategori;?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>

                  <div class="form-group">
                    <label for="deskripsi" class="label-control col-md-4">Deskripsi Materi</label>
                    <div class="col-md-8">
                      <!-- <input type="text" name="kategori" class="form-control" required> -->
                      <textarea type="textarea" name="deskripsi" id="deskripsi" class="form-control" maxlength="1500" required></textarea>
                    </div>
                    <div class="form-group">
                    <label for="deskripsi" class="label-control col-md-4">gambar Materi</label>
                    <div class="col-md-8">
                      <input type="file" name="gambar" class="form-control"  id="gambar">
                      <input type="text" name="old_gambar" class="form-control" required id="old_gambar">
                    </div>
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