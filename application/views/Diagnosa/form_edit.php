<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <!-- NEW WIDGET START -->
    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2>Edit Form <?php echo $title_head; ?></h2>
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
                        <legend><?php echo $title_head; ?></legend>
                         <div class="form-group">
                    <label for="TypeName" class="col-md-2 control-label">Nama Diagnosa</label>
                    <div class="col-md-4">
                        <?php
                        $input = array('name' => 'nama','value'=>$nama, 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="TableName" class="col-md-2 control-label">Poli</label>
                    <div class="col-md-4">
                          <?php
                        $input = array('name' => 'poli','value'=>$poli, 'maxlength' => 64, 'id' => 'TypeName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                        echo form_input($input);
                        ?>
                    </div>
                </div>
                      
                    </fieldset>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                echo anchor('diagnosa', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                echo nbs(1);
                                echo form_hidden('id_diagnosa', $id_diagnosa);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Submit</button> &nbsp;
                                <a href="#" id="cdelete" data-toggle="modal" data-target="#myModal" class="btn btn-small btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                            </div>
                        </div>
                    </div>

                    <?php echo form_close(); ?>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
    </article>
    <!-- end widget -->
</div>

<?php echo form_open($url_del, array('name' => 'del', 'id' => 'del')); ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-times"></i>&nbsp;Delete</a></h4>
			</div>
			<div class="modal-body">
				<p>
					Are you sure to delete this data..!!!
				</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cancel
				</button>
				<button type="submit" name="btn_submit_delete" class="btn btn-danger">
					Delete
				</button>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="id" id="delid" value="<?php echo $id_diagnosa; ?>">
<?php echo form_close(); ?>