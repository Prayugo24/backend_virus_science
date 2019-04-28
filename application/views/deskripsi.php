        <div class="right_col" role="main">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Deskripsi Organ</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="alert alert-success" style="display: none; color: green;">   
                  </div>
                </div>
                <button id="btnAdd" class="btn btn-success" data-toggle="modal" data-target="#input-deskripsi"><i class="glyphicon glyphicon-plus"></i> Tambah Deskripsi</button>
                <div class="x_content">
                  <div class="table-responsive ">
                    <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>ID</th>
                          <th>Nama Materi</th>
                          <th>Kategori</th>
                          <th>Deskripsi</th>
                          <th style="width: 150px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach($data_deskripsi->result_array() as $data):
                          $id_deskripsi=$data['id_deskripsi'];
                        $nama_materi=$data['nama_materi'];
                        $kategori=$data['kategori'];
                        $id_kategori=$data['id_kategori'];
                        $deskripsi=$data['deskripsi'];

                        ?>
                        <tr align="center">
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $id_deskripsi ?></td>
                          <td><?php echo $nama_materi ?></td>
                          <td><?php echo $kategori ?></td>
                          <td><?php echo $deskripsi ?></td>
                          <td>
                            <a type="submit" name="ubah" class="btn btn-warning" onClick="edit_deskripsi('<?php echo $id_deskripsi; ?>')"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete-deskripsi<?php echo $id_deskripsi;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach;?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<script type="text/javascript">
        function edit_deskripsi(id_deskripsi) {
          $.ajax({
            type: 'get',
    url : '<?php echo base_url('index.php/admin/edit_deskripsi?id_deskripsi=')?>'+id_deskripsi, //pemanggilan controller edit

    success: function(hasil) {
      $response = $(hasil);
      // ambil data dari url admin/edit_barang?id_barang=(sekian)
      var id_deskripsi = $response.filter('#id_deskripsi').text();
      var nama_materi = $response.filter('#nama_materi').text();
      var id_kategori = $response.filter('#id_kategori').text();
      var deskripsi = $response.filter('#deskripsi').text();

      // nampilkan ke modal
      $('#id_deskripsi').val(id_deskripsi);
      $('#nama_materi').val(nama_materi);
      $('#id_kategori').val(id_kategori);
      $('#deskripsi').val(deskripsi);

      $('#edit-deskripsi').modal('show');

      // alert('hasil');

    }
  });
        }

      </script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#table_id').DataTable({
      "language":{
        "url":"<?php echo base_url();?>assets/datatable/indonesia.json",
        "sEmptyTable":"Tidads"
      }
    });
  });
</script>
