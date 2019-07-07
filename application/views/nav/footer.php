 <!-- footer content -->
 <footer>
  <div class="pull-right">
    <p>copyright &copy Pray</p>
</div>
<div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

    <script type="text/javascript">
      function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
           
            return false;
        return true;
    }
</script>
<script src="<?php echo base_url('assets/');?>vendor/popper/popper.min.js"></script>

<script src="<?php echo base_url();?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url();?>assets/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="<?php echo base_url();?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="<?php echo base_url();?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="<?php echo base_url();?>assets/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.time.js"></script>
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.stack.js"></script>
<script src="<?php echo base_url();?>assets/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url();?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url();?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="<?php echo base_url();?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="<?php echo base_url();?>assets/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url();?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="<?php echo base_url();?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?php echo base_url();?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url();?>assets/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/datatable/js/jquery.dataTables.js"></script>

      <script type="text/javascript">
        $(document).on('click', '.browse', function(){
          var file = $(this).parent().parent().parent().find('.file');
          file.trigger('click');
        });
        $(document).on('change', '.file', function(){
          $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
      </script>

      <script type="text/javascript">
        function editimage()
        {
          $('#editImg').modal('show');
        }
      </script>

</body>
</html>