        <div id="input-guru" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data guru</h4>
              </div>
              <div class="modal-body">
                <form action="<?=base_url()?>index.php/admin_guru/tambahDataGuru" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <input type="hidden" name="id_guru">
                  <div class="form-group">
                    <label for="soal" class="label-control col-md-4">nip</label>
                    <div class="col-md-8">
                      <!-- <input type="text" name="soal" class="form-control" required> -->
                      <input type="number" name="nip" >
                    </div>
                  </div>
                  <input type="hidden" name="id_guru">
                  <div class="form-group">
                    <label for="soal" class="label-control col-md-4">nama</label>
                    <div class="col-md-8">
                      <!-- <input type="text" name="soal" class="form-control" required> -->
                      <input type="ntext" name="nama" >
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
