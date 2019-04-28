      <div id="input-jawaban" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Data Jawaban</h4>
            </div>
            <div class="modal-body">
            <form action="<?=base_url()?>index.php/admin/add_jawaban" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id_soal">
                <div class="form-group">
                  <label for="jawaban" class="label-control col-md-4">Jawaban</label>
                  <div class="col-md-8">
                    <input type="text" name="jawaban" class="form-control" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="id_soal" class="label-control col-md-4">Soal</label>
                  <div class="col-md-8">
                    <select type="text" name="id_soal" class="form-control" required>
                     <option value="0">-PILIH-</option>
                     <?php foreach($data_soal->result() as $data):?>
                      <option value="<?php echo $data->id_soal;?>"><?php echo $data->soal;?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="koreksi" class="label-control col-md-4">Koreksi</label>
                <div class="col-md-8">
                  <!-- <input type="text" name="status" class="form-control"> -->
                  <select name="koreksi" class="form-control" required>
                   <option value="true">true</option>
                   <option value="false">false</option>
                 </select>
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