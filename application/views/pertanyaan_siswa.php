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
                  <h2>Data Pertanyaan Siswa</h2>
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
                          <th>Nama Siswa</th>
                          <th>Pertanyaan</th>
                          <th style="width: 150px">status</th>
                          <th style="width: 150px">status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach($data_pertanyaanS->result_array() as $data):
                          $id_pertanyaan=$data['id_pertanyaan'];
                        $pertanyaan=$data['pertanyaan'];
                        $nama_siswa=$data['nama_siswa'];
                        $status=$data['status'];
                        $nip=$data['nip'];
                        $nis=$data['nis'];
                        ?>
                        <tr align="center">
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $nama_siswa ?></td>
                          <td><?php echo $pertanyaan ?></td>
                          <?php
                          if($status=="no"){
                            $detPert ="Belum dijawab";
                          }else{
                            $detPert ="Sudah dijawab";
                          }
                          ?>
                          <td><?php echo $detPert ?></td>
                          <td>
                          <?php if($status=="no"){?>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#edit-pertanyaans<?php echo $id_pertanyaan;?>"><i class="glyphicon glyphicon-pencil"></i> Jawab</a>
                          <?php }else{ ?>
                            <a disabled="disabled" class="btn btn-danger" data-toggle="modal" data-target="#edit-pertanyaans<?php echo $id_pertanyaan;?>"><i class="glyphicon glyphicon-pencil"></i> Jawab</a>
                            <?php } ?>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#delete-pertanyaans<?php echo $id_pertanyaan;?>"><i class="glyphicon glyphicon-pencil"></i> Hapus</a>
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