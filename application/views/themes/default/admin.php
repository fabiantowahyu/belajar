<?php

//initilize the page
require_once("themes/inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("themes/inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Dashboard";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("themes/inc/header.php");

//include left panel (navigation) - menu
//follow the tree in inc/config.ui.php
$page_nav["dashboard"]["sub"]["analytics"]["active"] = true;
include("themes/inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<body onLoad="goforit();">
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		//$breadcrumbs["Test"] = "http://url.com";
		//include("themes/inc/ribbon.php");
	?>
	<div id="ribbon">
		<?php 
			if(!empty($breadcrum)) echo $breadcrum; 
		?>
		<span class="ribbon-button-alignment pull-right">
		<div class="clock">
			<span id="clock"></span>
		</div>
		</span>
	</div>
	<!-- MAIN CONTENT -->
	<div id="content">

		<?php
			if(!empty($page)) {
				$this->load->view($page);
			} else {
				$this->load->view('error_page');
			}

		?>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN PANEL -->
</body>
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	include("themes/inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php 
	//include required scripts
	include("themes/inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->
<?php
	if(!empty($plugin)) {
		$this->load->view($plugin);
	}
?>

<?php 
	//include footer
	//include("themes/inc/google-analytics.php"); 
?>
