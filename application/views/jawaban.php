        <div class="right_col" role="main">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <h2>Pilihan Jawaban</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="alert alert-success" style="display: none; color: green;">   
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <div class="error" style="color:red;">
        						<?= validation_errors() ?>
        						<?= $this->session->flashdata('error') ?>
        					</div>
                  </div>
                </div>
                <button id="btnAdd" class="btn btn-success" data-toggle="modal" data-target="#input-jawaban"><i class="glyphicon glyphicon-plus"></i>Tambah Jawaban</button>
                <div class="x_content">
                  <div class="table-responsive ">
                    <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr align="center" class="bg-blue">
                          <th>No</th>
                          <th>ID</th>
                          <th>Jawaban</th>
                          <th>Soal</th>
                          <th>Koreksi</th>
                          <th style="width: 150px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach($data_jawaban->result_array() as $data):
                          $kode_jawaban=$data['kode_jawaban'];
                        $jawaban=$data['jawaban'];
                        $soal=$data['soal'];
                        $id_soal=$data['id_soal'];
                        $koreksi=$data['koreksi'];

                        ?>
                        <tr align="center">
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $kode_jawaban ?></td>
                          <td><?php echo $jawaban ?></td>
                          <td><?php echo $soal ?></td>
                          <td><?php echo $koreksi ?></td>
                          <td>
                            <a type="submit" name="ubah" class="btn btn-warning" onClick="edit_jawaban('<?php echo $kode_jawaban; ?>')"><i class="fa fa-pencil"></i> Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete-jawaban<?php echo $kode_jawaban;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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
        function edit_jawaban(kode_jawaban) {
          $.ajax({
            type: 'get',
    url : '<?php echo base_url('index.php/admin/edit_jawaban?kode_jawaban=')?>'+kode_jawaban, //pemanggilan controller edit

    success: function(hasil) {
      $response = $(hasil);
      // ambil data dari url admin/edit_barang?id_barang=(sekian)
      var kode_jawaban = $response.filter('#kode_jawaban').text();
      var jawaban = $response.filter('#jawaban').text();
      var id_soal = $response.filter('#id_soal').text();
      var koreksi = $response.filter('#koreksi').text();

      // nampilkan ke modal
      $('#kode_jawaban').val(kode_jawaban);
      $('#jawaban').val(jawaban);
      $('#id_soal').val(id_soal);
      $('#koreksi').val(koreksi);

      $('#edit-jawaban').modal('show');

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
