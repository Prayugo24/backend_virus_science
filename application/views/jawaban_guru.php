        <style>
          .file {
            visibility: hidden;
            position: absolute;
          }
        </style>
        <div class="right_col" role="main">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Soal</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="alert alert-success" style="display: none; color: green;">   
                  </div>
                </div>
                <div class="x_content">
                  <div class="table-responsive ">
                    <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>nama Siswa</th>
                          <th>pertanyaan</th>
                          <th>Jawaban</th>
                          <!-- <th>Gambar</th> -->
                          <th style="width: 150px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach($data_jwbn_guru->result_array() as $data):
                          $id_pertanyaan=$data['id_pertanyaan'];
                          $id_jawaban=$data['id_jawaban'];
                          $pertanyaan=$data['pertanyaan'];
                          $jawaban=$data['jawaban'];
                          $nama_siswa=$data['nama_siswa'];
                          $status=$data['status'];
                          $nip=$data['nip'];
                          $nis=$data['nis'];
                        ?>
                        <tr align="center">
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $nama_siswa ?></td>
                          <td><?php echo $pertanyaan ?></td>
                          <td><?php echo $jawaban ?></td>
                          <td>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#edit-jawaban-guru<?php echo $id_jawaban;?>"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete-jawaban-guru<?php echo $id_jawaban;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>

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
  $(document).ready(function(){
    $('#table_id').DataTable({
      "language":{
        "url":"<?php echo base_url();?>assets/datatable/indonesia.json",
        "sEmptyTable":"Tidads"
      }
    });
  });
</script>