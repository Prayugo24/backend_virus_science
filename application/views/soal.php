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
                <button id="btnAdd" class="btn btn-success" data-toggle="modal" data-target="#input-soal"><i class="glyphicon glyphicon-plus"></i> Tambah Soal</button>
                <button id="btnAdd" class="btn btn-success" data-toggle="modal" data-target="#input-limiter"><i class="glyphicon glyphicon-plus"></i> Tambah limiter</button>
                <h4>Batas Limit Soal AR</h4>
                <?php foreach($limit->result_array() as $data){
                  $data_limit=$data['limiter'];
                  }
                  ?>
                  <input type="text" size="5"   disabled value="<?php echo  $data_limit ?>">
                <div class="x_content">
                  <div class="table-responsive ">
                    <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>ID</th>
                          <th>Soal</th>
                          <!-- <th>Gambar</th> -->
                          <th style="width: 150px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        foreach($data_soal->result_array() as $data):
                          $id_soal=$data['id_soal'];
                        $soal=$data['soal'];
                        // $gambar=$data['gambar'];
                        ?>
                        <tr align="center">
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $id_soal ?></td>
                          <td><?php echo $soal ?></td>
                          <!-- <td><img src='<?php echo base_url().'/assets/img/'.$gambar; ?>' width="50" height="50"></td> -->
                          <td>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#edit-soal<?php echo $id_soal;?>"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete-soal<?php echo $id_soal;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>

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