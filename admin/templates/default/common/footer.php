			</div>
			<!-- END PAGE CONTAINER-->		
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
	<div class="footer">
		<div class="footer-inner">
		2013 &copy; Devlopment by Hyperblue, Design by keenthemes. Run Time:<?php echo $_runTime;?>s
		</div>
		<div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS -->
	<!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS -->
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>	
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo ASSETS_PATH;?>plugins/excanvas.js"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/respond.js"></script>
	<![endif]-->
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery.blockui.js"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery.cookie.js"></script>
    <script src="<?php echo ASSETS_PATH;?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo ASSETS_ADMIN_PATH;?>js/app.js" type="text/javascript"></script>
	<script>
		jQuery(document).ready(function() {
            App.init(); // initlayout and core plugins
		});
	</script>
    <!-- END PAGE LEVEL SCRIPTS -->
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
