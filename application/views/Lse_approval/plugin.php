<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!--page specific plugin scripts-->

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrapvalidator/bootstrapValidator.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/libs/jquery-ui-1.10.3.min.js"></script>

<!--POP UP WINDOWS -->
<script src="<?php echo ASSETS_URL; ?>/js/ace/function.js"></script>

<script>
    if (!window.jQuery) {
	document.write('<script src="<?php echo base_url(); ?>themes/js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>
<script src="<?php echo base_url(); ?>themes/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>


<script type="text/javascript">
    function setRequired(id) {
	id = id.toString();
	var status = $('#approval_status').val();
	if (status == 4) {
	    $('#remark' + id).attr('required', true);
	} else {
	    $('#remark' + id).attr('required', false);
	}
    }
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    $(document).ready(function () {
	/* // DOM Position key index //
	 
	 l - Length changing (dropdown)
	 f - Filtering input (search)
	 t - The Table! (datatable)
	 i - Information (records)
	 p - Pagination (paging)
	 r - pRocessing 
	 < and > - div elements
	 <"#id" and > - div with an id
	 <"class" and > - div with a class
	 <"#id.class" and > - div with an id and class
	 
	 Also see: http://legacy.datatables.net/usage/features
	 */

	/* BASIC ;*/
	var responsiveHelper_dt_basic = undefined;
	var responsiveHelper_datatable_fixed_column = undefined;
	var responsiveHelper_datatable_col_reorder = undefined;
	var responsiveHelper_datatable_tabletools = undefined;
	var breakpointDefinition = {
	    tablet: 1024,
	    phone: 480
	};
	$('#dt_basic').dataTable({
	    "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
		    "t" +
		    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
	    "autoWidth": false,
	    "oLanguage": {
		"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
	    },
	    "preDrawCallback": function () {
		// Initialize the responsive datatables helper once.
		if (!responsiveHelper_dt_basic) {
		    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
		}
	    },
	    "rowCallback": function (nRow) {
		responsiveHelper_dt_basic.createExpandIcon(nRow);
	    },
	    "drawCallback": function (oSettings) {
		responsiveHelper_dt_basic.respond();
	    }
	});
	/* END BASIC */

	// custom toolbar
	$("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
	// Apply the filter
	$("#datatable_fixed_column thead th input[type=text]").on('keyup change', function () {

	    otable
		    .column($(this).parent().index() + ':visible')
		    .search(this.value)
		    .draw();
	});
	//local storage cookie
	$('#myTab a').click(function (e) {
	    e.preventDefault();
	    $(this).tab('show');
	});
	$("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
            var scrollHeight = $(document).scrollTop();
	    var id = $(e.target).attr("href").substr(1);
	    window.location.hash = id;
             $(window).scrollTop(scrollHeight );
	});
	var hash = window.location.hash;
	$('#myTab a[href="' + hash + '"]').tab('show');
    });
</script>

<script type="text/javascript">
    function isNumberKey(evt)
    {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode === 46) {
	    return true;
	} else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	    return false;
	} else {
	    return true;
	}
    }

    $(document).ajaxStart(function () {
	Pace.restart();
    });
</script>
