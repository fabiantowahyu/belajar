<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!--page specific plugin scripts-->
<link href="<?php echo base_url(); ?>themes/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>themes/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo base_url(); ?>themes/js/plugins/dataTables/datatables.min.js"></script>

    
    <script src="<?php echo base_url(); ?>themes/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/plugins/pace/pace.min.js"></script>

<!--inline scripts related to this page-->

<script>


    $(document).ready(function () {
	$('#dt_basic').DataTable({
	    pageLength: 25,
	    responsive: true,
	    dom: '<"html5buttons"B>lTfgitp',
	    buttons: [
		{extend: 'copy'},
		{extend: 'csv'},
		{extend: 'excel', title: 'ExampleFile'},
		{extend: 'pdf', title: 'ExampleFile'},

		{extend: 'print',
		    customize: function (win) {
			$(win.document.body).addClass('white-bg');
			$(win.document.body).css('font-size', '10px');

			$(win.document.body).find('table')
				.addClass('compact')
				.css('font-size', 'inherit');
		    }
		}
	    ]

	});

		
    });

</script>
