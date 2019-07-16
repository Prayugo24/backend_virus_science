<?php 
        foreach($data_guru->result_array() as $data):
          $id_guru=$data['id_guru'];
          $nip=$data['nip'];
          $nama=$data['nama'];
        ?>
        <div id="edit-guru<?php echo $id_guru;?>" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data guru</h4>
              </div>
              <div class="modal-body">
                <form action="<?=base_url()?>index.php/admin_guru/EditDataGuru" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
                <div class="form-group">
                  <label for="soal" class="label-control col-md-4">nip</label>
                  <div class="col-md-8">
                    <input type="text" name="nip" class="form-control" value="<?php echo $nip; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="soal" class="label-control col-md-4">nama</label>
                  <div class="col-md-8">
                    <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>" required>
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


