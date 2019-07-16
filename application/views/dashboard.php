<div class="right_col" role="main">
  <div class="page-header" >
    <h1>Aplikasi Media Pembelajaran Augmented BIOLOGI</h1>
    <h2>Selamat Datang <small><?php echo $this->session->userdata('user_nama'); ?></small></h2>
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue-sky">
          <div class="inner">
            <h3><?php echo $total_soal; ?></h3>
            <p>SOAL</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="<?php echo base_url('index.php/admin/con_soal') ?>" class="small-box-footer">Info Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $total_jawaban; ?></h3>

            <p>Pilihan Jawaban Soal</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="<?php echo base_url('index.php/admin/con_jawaban') ?>" class="small-box-footer">Info Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <h3><?php echo $total_deskripsi; ?></h3>
            <p>Deskripsi</p>
          </div>
          <div class="icon">
            <i class="fa fa-mail-reply-all"></i>
          </div>
          <a href="<?php echo base_url('index.php/admin/con_deskripsi') ?>" class="small-box-footer">Info Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      
    </div>
  </div>
  <br />
</div>