<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder">Save Paise</span>
                Application &copy; 2017-2018
            </span>						 
        </div>
    </div>
</div>


<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="<?php echo base_url(); ?>assets1/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement)
        document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?php echo base_url(); ?>assets1/js/bootstrap.min.js"></script>

 
		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>assets1/js/jquery-ui.min.js"></script>
		<script src="<?php echo base_url(); ?>assets1/js/jquery.ui.touch-punch.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo base_url(); ?>assets1/js/ace-elements.min.js"></script>
<script src="<?php echo base_url(); ?>assets1/js/ace.min.js"></script>
<script type="text/javascript">
                   // $(document).on('click', '.nav-list li ul li', function() {
                   //  $(".nav-list li ul li").removeClass("active");
                   // $(this).addClass("active");
                   // });

                   $(".nav-list li ul li").on("click", function () {
                       $(".nav-list li").removeClass("active");
                       $(this).addClass("active");
                   });
</script>  
 
</body>
</html>