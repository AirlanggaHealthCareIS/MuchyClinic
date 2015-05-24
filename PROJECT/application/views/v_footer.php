</div>	
    </div>
</div>
	<!-- <div class="container-fluid text-center" style="background-color: rgb(105, 102, 102); padding:15px">
		<h6 style="color: white;">copyright | Muchy Team</h6>
	</div> -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- // <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> -->
    <!-- jQuery -->

    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <?php if ($this->input->get('error')=="pasienbaru"): ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#myModal2').modal('show'); 
            });
        </script>
    <?php endif ?>




    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- custom library -->
    <script src="<?php echo base_url(); ?>assets/js/obatkeluar.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/morris-data.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>
  </body>
</html>