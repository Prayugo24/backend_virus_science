<?php 
        foreach($data_siswa->result_array() as $data):
          $id_siswa=$data['id_siswa'];
          $nis=$data['nis'];
          $nama=$data['nama'];
          $password=$data['password'];
        ?>
        <div id="edit-siswa<?php echo $id_siswa;?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data guru</h4>
              </div>
              <div class="modal-body">
                <form action="<?=base_url()?>index.php/admin_guru/EditDataSiswa" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>">
                <div class="form-group">
                  <label for="soal" class="label-control col-md-4">nis</label>
                  <div class="col-md-8">
                    <input type="text" name="nis" class="form-control" value="<?php echo $nis; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="soal" class="label-control col-md-4">nama</label>
                  <div class="col-md-8">
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                    <label for="password" class="label-control col-md-4">password</label>
                    <div class="col-md-8">
                      <input type="text" name="password" class="form-control" required value="<?php echo $password; ?>">
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
        <?php endforeach; ?>


