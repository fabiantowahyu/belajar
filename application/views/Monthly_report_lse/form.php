<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
	<div>
	    <div class="widget-body">
		<?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
		<fieldset>
		    <div class="row-fluid">
			<ul id="sparks" class="">
			    <label for="year" class="col-md-1 control-label">Year: &nbsp;</label>
			    <div class="col-md-3">
				<div class="input-group">
				    <?php
				    $input = array('name' => 'year', 'id' => 'year', 'value' => $charts1['year'], 'class' => 'form-control datepicker input-xs', 'data-dateformat' => 'yy', 'required' => '', 'onchange' => 'this.form.submit()');
				    echo form_input($input);
				    ?>
				</div>
			    </div>
			    <div id="graph_order">
				<li class="sparks-info">
				    <h5>LSE Total<span class="txt-color-red"><i class="fa fa-cube"></i>&nbsp;<?= $charts1['lse_total']->LSETotal; ?></span></h5>
				    <div class="sparkline txt-color-red hidden-mobile hidden-md hidden-sm">
					<?php
					if ($charts1['report'] != "") {
					    echo implode(",", $charts1['report']);
					}
					?>
				    </div>
				</li>
			    </div>
		    </div>
		    </ul>
	    </div>
	    <br>
	    <div class="row">
		<article class="col-sm-12">
		    <div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
			<header>
			    <span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
			    <h2>Yearly Reports </h2>

			    <ul class="nav nav-tabs pull-right in" id="myTab">
				<li class="active" id="tab_order">
				    <a data-toggle="tab" href="#s1"><i class="fa fa-clock-o"></i> <span id="view_order" class="hidden-mobile hidden-tablet">LSE Report</span></a>
				</li>
			    </ul>
			</header>
			<div class="no-padding">
			    <div class="jarviswidget-editbox">
			    </div>
			    <div class="widget-body">
				<div id="myTabContent" class="tab-content">
				    <div class="tab-pane fade active in" id="s1">
					<div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">
					    <div class="col-md-12 inline-group">
						<div class="pull-right">
                                                        <input type="checkbox" hidden="true" name="gra-0" id="gra-0" checked="checked">
							<i></i>
						</div>
					    </div>
					    <div class="padding-10">
						<div id="flotcontainer" class="chart-large has-legend-unique"></div>
					    </div>
					</div>
				    </div>
				</div>
			    </div>
			</div>
		    </div>
		</article>
	    </div>
	    </fieldset>
	    <?php echo form_close(); ?>
	</div>
</div>
</article>
<div class="clearfix"></div>
</div>
