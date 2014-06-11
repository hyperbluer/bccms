<?php echo $_header;?>

<?php echo $_footer;?>
    <!-- BEGIN PAGE LEVEL STYLES -->
	<!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo ASSETS_ADMIN_PATH;?>js/index.js" type="text/javascript"></script>
	<script>
		jQuery(document).ready(function() {
            Index.init();
		});
	</script>
    <!-- END PAGE LEVEL SCRIPTS -->