        <div id="input-siswa" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data guru</h4>
              </div>
              <div class="modal-body">
                <form action="<?=base_url()?>index.php/admin/insertdata" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <input type="hidden" name="id_soal">
                  <div class="form-group">
                    <label for="soal" class="label-control col-md-4">Soal</label>
                    <div class="col-md-8">
                      <!-- <input type="text" name="soal" class="form-control" required> -->
                      <textarea name="soal" id="" cols="10" class="form-control" rows="5" required></textarea>
                    </div>
                  </div>
 

                  <div class="form-group">
                    <!-- <label for="gambar" class="label-control col-md-4">Gambar</label> -->
                    <input type="file" name="gambar" class="file">
                    <div class="input-group col-md-8">
                      <!-- <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                      <input type="text" class="form-control input-md" disabled placeholder="Upload Gambar" required>
                      <span class="input-group-btn">
                        <button class="browse btn btn-primary input-md" type="button"><i class="fa fa-search"></i> Telusuri</button>
                      </span> -->
                    </div><br>
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