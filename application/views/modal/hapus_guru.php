<!-- modal Hapus -->
      <?php 
        foreach($data_guru->result_array() as $data):
          $id_guru=$data['id_guru'];
          $nip=$data['nip'];
          $nama=$data['nama'];
        ?>
    <div id="delete-guru<?php echo $id_guru;?>"  class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <form action="<?=base_url()?>index.php/admin_guru/deletedataGuru/<?=$id_guru?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
            <div class="modal-body">
              Anda yakin ingin menghapus data ini?
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