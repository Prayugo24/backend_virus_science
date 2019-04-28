
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
                <button id="btnAdd" class="btn btn-success" data-toggle="modal" data-target="#input-kategori"><i class="glyphicon glyphicon-plus"></i> Tambah Soal</button>
                <div class="x_content">
                  <div class="table-responsive ">
                    <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <thead>
                          <tr align="center">
                            <th>No</th>
                            <th>ID</th>
                            <th>Kategori</th>
                            <th style="width: 150px">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $no=1;
                          foreach($data_kategori->result_array() as $data):
                            $id_kategori=$data['id_kategori'];
                          $kategori=$data['kategori'];

                          ?>
                          <tr align="center">
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $id_kategori ?></td>
                            <td><?php echo $kategori ?></td>
                            <td>
                            <a class="btn btn-warning" data-toggle="modal" data-target="#edit-kategori<?php echo $id_kategori;?>"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                              <a class="btn btn-danger" data-toggle="modal" data-target="#delete-kategori<?php echo $id_kategori;?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>

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