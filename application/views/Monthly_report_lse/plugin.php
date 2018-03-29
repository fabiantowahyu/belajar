<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!--page specific plugin scripts-->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.cust.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.tooltip.min.js"></script>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrapvalidator/bootstrapValidator.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/libs/jquery-ui-1.10.3.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
	
	$('#validation-form').bootstrapValidator();

	$(function () {
	    var trgt = [<?php echo join($charts1['temp'], ","); ?>],
		    toggles = $("#rev-toggles"), target = $("#flotcontainer");

	    var data = [{
		    data: trgt,
		    lines: {
			show: true,
			lineWidth: 3,
			fill: true,
			fillColor: {
			    colors: [{
				    opacity: 0.1
				}, {
				    opacity: 0.13
				}]
			}
		    },
		    points: {
			show: true
		    }
		}]

	    var options = {
		grid: {
		    hoverable: true
		},
		tooltip: true,
		tooltipOpts: {
		    content: 'Month : %x - Income: %y',
		    dateFormat: '%m-%Y',
		    defaultTheme: true
		},
		xaxis: {
		    ticks: [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"]]
		},
		yaxes: {
		    tickFormatter: function (val, axis) {
			return "$" + val;
		    },
		    min: 0
		}

	    };

	    plot2 = null;

	    function plotNow() {
		var d = [];
		toggles.find(':checkbox').each(function () {
		    if ($(this).is(':checked')) {
			d.push(data[$(this).attr("name").substr(4, 1)]);
		    }
		});
		if (d.length > 0) {
		    if (plot2) {
			plot2.setData(d);
			plot2.draw();
		    } else {
			plot2 = $.plot(target, d, options);
		    }
		}

	    }
	    ;

	    toggles.find(':checkbox').on('change', function () {
		plotNow();
	    });
	    plotNow()

	});
    });
</script>