<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
             <h3 class="header smaller lighter blue"><?php echo $title; ?>&nbsp;

                    <?php
                    echo anchor($urlback, '<button class="btn btn-xs btn-warning btn-mini"><i class="fa fa-mail-reply"></i></button>');
                    echo "&nbsp;";
                    echo anchor($url, '<button class="btn btn-xs btn-success btn-mini"><i class="fa fa-plus"></i></button>');
                    ?>

                </h3>

            

            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h6>&nbsp; Edit Form </h6>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                    <!--
<form action=<?php echo $url ?> method="post" id="validation-form" class="form-horizontal"
data-bv-message="This value is not valid"
data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
                    -->

                    <fieldset>

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="RequestName" class="col-md-2 control-label">Request Name</label>
                                <label class="control-label">: <?php echo $request_name; ?></label>
                            </div>
                            <div class="form-group">
                                <label for="Description" class="col-md-2 control-label">Description</label>
                                <label class="control-label">: <?php echo $remark ?></label>
                            </div>
                        </div>
                    </fieldset>
                    <legend></legend>

                    <section id="widget-grid" class="">
                        <!-- row -->
                        <div class="row">

                            <!-- NEW WIDGET START -->
                            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <!-- Widget ID (each widget will need unique ID)-->
                                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-1" data-widget-colorbutton="false"
                                     data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" 
                                     >
                                    <header>
                                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                        <h2>Row Tables </h2>
                                    </header>

                                    <!-- widget div-->
                                    <div>
                                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                            <thead class="success">
                                                <tr>
                                                    <th width="300" colspan="2" class="center">Requester</th>
                                                    <th width="300" colspan="3" class="center">Approval By</th>
                                                    <th width="50" rowspan="2">Action</th>
                                                </tr>
                                                <tr>
                                                    <th width="120">Employee Code</th>
                                                    <th>Employee Name</th>
                                                    <th width="120">Employee Code</th>
                                                    <th>Employee Name</th>
                                                    <th width="50">Required</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $emp_id_prev = "";
                                                if (count($results_approval) * 1 == 0) {
                                                    echo "<tr><td colspan='100%' style='text-align:center;' >No Data</td></tr>";
                                                }
                                                foreach ($results_approval as $key => $row) {
                                                    ?>
                                                    <tr>

                                                        <?php
                                                        if ($emp_id_prev == $row->requester) {
                                                            echo '
								<td>&nbsp;</td>
                        		<td>&nbsp;</td>
                        	';
                                                        } else {
                                                            echo '
								<td>' . $row->requester . '</td>
                        		<td>' . $row->requester_name . '</td>
                        	';
                                                        }
                                                        ?>

                                                        <td>
                                                            <ul>
                                                                <?php
                                                                $row_emp = explode(',', substr($row->approved_by, 0, -1));
                                                                for ($i = 0; $i < count($row_emp); $i++) {
                                                                    echo '<li>' . $row_emp[$i] . '</li>';
                                                                }
                                                                ?>
                                                            </ul>
                                                        </td>

                                                        <td>
                                                            <ul>
                                                                <?php
                                                                $row_emp_name = explode(',', substr($row->approved_by, 0, -1));
                                                                for ($i = 0; $i < count($row_emp_name); $i++) {

                                                                    $employee_name = $this->md_request_approval->MDL_getEmployeeName($row_emp_name[$i]);
                                                                    echo '<li>' . $employee_name . '</li> ';
                                                                }
                                                                ?>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($row->is_required == 1) {
                                                                echo "Yes";
                                                            } else {
                                                                echo "No";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="center">						
                                                            <?php
                                                            if ($emp_id_prev == $row->requester) {
                                                                echo '&nbsp;';
                                                            } else {
                                                                ?>
                                                                <a class="btn btn-xs btn-primary" href="<?php echo base_url() . 'request_approval/CTRL_Edit_Detail/' . $id . '/' . $row->requester . ''; ?>"><i class="fa fa-pencil bigger-120"></i></a>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $emp_id_prev = $row->requester;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end widget -->
                            </article>
                        </div>
                    </section>
                </div>
                <div class="form-actions">
                    <?php
                    echo anchor('request_approval', '<i class="fa fa-reply"></i>&nbsp;Back', array('class' => 'btn btn-small btn-primary'));
                    ?>
                </div>

            </div>
            <!-- end widget content -->
        </div>
        <!-- end widget div -->
</div>
<!-- end widget -->
</article>
<div class="clearfix"></div>
</div>

