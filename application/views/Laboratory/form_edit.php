<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div id="MasterLab" class="row-fluid">


    <article class="col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2><?php echo $title_head; ?></h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget content -->
                <div class="widget-body">

                    <div class="span12 offset panel-box2">


                        <div class="tabbable">
                            <ul class="nav nav-tabs padding-16">
                                <li class="active" id="tab-basic">
                                    <a data-toggle="tab" href="#edit-basic">
                                        <i class="green icon-edit bigger-125"></i>
                                        Basic Info
                                    </a>
                                </li>

                                <li id="tab-leader">
                                    <a data-toggle="tab" href="#edit-leader">
                                        <i class="purple icon-cog bigger-125"></i>
                                        Expert
                                    </a>
                                </li>
                                <!--
                                                                <li>
                                                                    <a data-toggle="tab" href="#edit-equipment">
                                                                        <i class="blue icon-key bigger-125"></i>
                                                                        Equipment
                                                                    </a>
                                                                </li>
                                
                                                                <li>
                                                                    <a data-toggle="tab" href="#edit-product">
                                                                        <i class="red icon-book bigger-125"></i>
                                                                        Product
                                                                    </a>
                                                                </li>
                                
                                                                <li>
                                                                    <a data-toggle="tab" href="#edit-method">
                                                                        <i class="orange icon-globe bigger-125"></i>
                                                                        Test Method
                                                                    </a>
                                                                </li>
                                
                                                                <li>
                                                                    <a data-toggle="tab" href="#edit-crm">
                                                                        <i class="green icon-lightbulb bigger-125"></i>
                                                                        Reference Material
                                                                    </a>
                                                                </li>-->
                            </ul>

                            <div class="tab-content profile-edit-tab-content">
                                <div id="edit-basic" class="tab-pane in active">
                                    <div class="space-10"></div><br/>

                                    <?php echo form_open($url, array('class' => 'form-horizontal', 'id' => 'validation-form', 'data-bv-message' => 'This value is not valid', 'data-bv-feedbackicons-valid' => 'glyphicon glyphicon-ok', 'data-bv-feedbackicons-invalid' => 'glyphicon glyphicon-remove', 'data-bv-feedbackicons-validating' => 'glyphicon glyphicon-refresh')); ?>
                                    <legend>General</legend>
                                    <div class="form-group">
                                        <label for="CompanyID" class="col-md-2 control-label"><?php echo $title; ?> ID</label>
                                        <div class="col-md-4">
                                            <?php
                                            $input = array('name' => 'id', 'value' => $id, 'maxlength' => 15, 'id' => 'CompanyID', 'class' => 'form-control', 'disabled' => 'disabled');
                                            echo form_input($input);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="CompanyName" class="col-md-2 control-label"><?php echo $title; ?> Name <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php
                                            $input = array('name' => 'name', 'value' => $name, 'maxlength' => 64, 'id' => 'CompanyName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                            echo form_input($input);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="BranchID" class="col-md-2 control-label">Branch <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php
                                            echo form_dropdown('branch_id', $option_branch, $branch_id, 'id ="BranchID" class="form-control" data-bv-notempty = "true"');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Address" class="col-md-2 control-label">Address</label>
                                        <div class="col-md-4">
                                            <?php
                                            $txtarea = array('name' => 'address', 'value' => $address, 'rows' => 3, 'class' => 'form-control', 'id' => 'Address');
                                            echo form_textarea($txtarea);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Phone" class="col-md-2 control-label">Phone</label>
                                        <div class="col-md-4">
                                            <?php
                                            $input = array('name' => 'phone', 'value' => $phone, 'maxlength' => 64, 'id' => 'Phone', 'class' => 'form-control input-mask-phone', 'data-bv-notempty' => 'false');
                                            echo form_input($input);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Status" class="col-md-2 control-label"><?php echo $title; ?> Status</label>
                                        <div class="col-md-3">
                                            <span>
                                                <span class="onoffswitch">
                                                    <?php
                                                    echo form_checkbox('status', 1, $status, 'class="onoffswitch-checkbox" id="st3"');
                                                    ?>
                                                    <label class="onoffswitch-label" for="st3"> 
                                                        <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                                        <span class="onoffswitch-switch"></span> 
                                                    </label> 
                                                </span>
                                            </span>

                                        </div>
                                    </div>


                                    <div class="space"></div><br/>
                                    <legend>Attach Files</legend>
                                    <div class="form-group">
                                        <label for="Certificate" class="col-md-2 control-label">Certificate</label>
                                        <div class="col-md-4">
                                            <?php if ($file_certificate) { ?>
                                                <a href="Javascript:void(0);" id="AttachFiles-1" title="certificate"><?php echo $file_certificate; ?></a>
                                            <?php } else { ?>
                                                <a href="Javascript:void(0);" id="AttachFiles-1" title="certificate">Upload file certificate</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Accreditation" class="col-md-2 control-label">Accreditation</label>
                                        <div class="col-md-4">
                                            <?php if ($file_accreditation) { ?>
                                                <a href="Javascript:void(0);" id="AttachFiles-2" title="accreditation"><?php echo $file_accreditation; ?></a>
                                            <?php } else { ?>
                                                <a href="Javascript:void(0);" id="AttachFiles-2" title="accreditation">Upload file accreditation</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Brochure" class="col-md-2 control-label">Brochure</label>
                                        <div class="col-md-4">
                                            <?php if ($file_brochure) { ?>
                                                <a href="Javascript:void(0);" id="AttachFiles-3" title="brochure"><?php echo $file_brochure; ?></a>
                                            <?php } else { ?>
                                                <a href="Javascript:void(0);" id="AttachFiles-3" title="brochure">Upload file brochure</a>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="hr"></div>
                                    <div class="form-actions">
                                        <?php
                                        echo anchor('laboratory', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                        echo nbs(1);
                                        echo form_hidden('id', $id);
                                        ?>
                                        <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button>&nbsp;

                                        <a href="JavaScript:Void(0);" id="cdelete" class="btn btn-small btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div>

                                <div id="edit-leader" class="tab-pane">
                                    <div class="space-10"></div>

                                    <?php $this->load->view('Laboratory/view_leader', $id); ?>
                                </div>

                                <div id="edit-equipment" class="tab-pane">
                                    <div class="space-10"></div>
                                    <?php $this->load->view('Laboratory/view_equipment', $id); ?>
                                </div>

                                <div id="edit-product" class="tab-pane">
                                    <div class="space-10"></div>
                                    <?php $this->load->view('Laboratory/view_product', $id); ?>
                                </div>

                                <div id="edit-method" class="tab-pane">
                                    <div class="space-10"></div>
                                    <?php $this->load->view('Laboratory/view_method', $id); ?>
                                </div>

                                <div id="edit-crm" class="tab-pane">
                                    <div class="space-10"></div>
                                    <?php $this->load->view('Laboratory/view_crm', $id); ?>
                                </div>
                            </div>
                        </div>
                        <div class="space-8"></div>
                    </div> </div> </div> </div>
</div>
<div class="clearfix"></div>
<?php echo form_open($url_del, array('name' => 'del', 'id' => 'del')); ?>
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

<input type="hidden" name="id" id="delid" value="<?php echo $id; ?>">
<?php echo form_close(); ?>

<script>
    
    var last_gritter;
    $('#AttachFiles-1').on('click', function () {
        var modal =
                '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
                    <div class="modal-dialog"><div class="modal-content"><div class="modal-header">\
                        <button type="button" class="close" data-dismiss="modal">&times;</button>\
                        <h4 class="blue">Change Files</h4>\
                    </div>\
                    \
<form action="<?php echo base_url();?><?php echo $url;?>" method="post" enctype="multipart/form-data">\
                                <div class="modal-body">\
                                        <div class="space-4"></div>\
                                        <div style="width:75%;margin-left:12%;"><input type="file" name="userfile" /></div>\
                                        <input type="hidden" name="upload" value="' + this.title + '"\
                                </div>\
                                \
                                <div class="modal-footer center">\
                                        <button type="submit" name="btnUpload" value="upload" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
                                        <button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
                                </div>\
</form>\
                        </div></div></div>';


        var modal = $(modal);
        modal.modal("show").on("hidden", function () {
            modal.remove();
        });

        var working = false;

        var form = modal.find('form:eq(0)');
        var file = form.find('input[type=file]').eq(0);
        file.ace_file_input({
            style: 'well',
            btn_choose: 'Click to choose new file',
            btn_change: null,
            no_icon: 'icon-picture',
            thumbnail: 'small',
            before_remove: function () {
                //don't remove/reset files while being uploaded
                return !working;
            },
            before_change: function (files, dropped) {
                var file = files[0];
                if (typeof file === "string") {
                    //file is just a file name here (in browsers that don't support FileReader API)
                    if (!(/\.(jpe?g|png|gif|pdf)$/i).test(file))
                        return false;
                } else {//file is a File object
                    var type = $.trim(file.type);
                    if (last_gritter)
                        $.gritter.remove(last_gritter);
                    if ((type.length > 0 && !(/^image|application\/(jpe?g|png|gif|pdf)$/i).test(type))
                            || (type.length == 0 && !(/\.(jpe?g|png|gif|pdf)$/i).test(file.name))//for android default browser!
                            ) {
                        last_gritter = $.gritter.add({
                            title: 'File is not an image or pdf!',
                            text: 'Please choose a jpg|gif|png|pdf image or pdf!',
                            class_name: 'gritter-error gritter-center'
                        });
                        return false;
                    }

                    if (file.size > 2100000) {//~2 Mb
                        last_gritter = $.gritter.add({
                            title: 'File too big!',
                            text: 'Image size should not exceed 2 Mb!',
                            class_name: 'gritter-error gritter-center'
                        });
                        return false;
                    }
                }

                return true;
            }
        });

    });

    $('#AttachFiles-2').on('click', function(){
			var modal =
                '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
                    <div class="modal-dialog"><div class="modal-content"><div class="modal-header">\
                        <button type="button" class="close" data-dismiss="modal">&times;</button>\
                        <h4 class="blue">Change Files</h4>\
                    </div>\
                    \
<form action="<?php echo base_url();?><?php echo $url;?>" method="post" enctype="multipart/form-data">\
                                <div class="modal-body">\
                                        <div class="space-4"></div>\
                                        <div style="width:75%;margin-left:12%;"><input type="file" name="userfile" /></div>\
                                        <input type="hidden" name="upload" value="' + this.title + '"\
                                </div>\
                                \
                                <div class="modal-footer center">\
                                        <button type="submit" name="btnUpload" value="upload" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
                                        <button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
                                </div>\
</form>\
                        </div></div></div>';

			var modal = $(modal);
			modal.modal("show").on("hidden", function(){
				modal.remove();
			});

			var working = false;

			var form = modal.find('form:eq(0)');
			var file = form.find('input[type=file]').eq(0);
			file.ace_file_input({
				style:'well',
				btn_choose:'Click to choose new file',
				btn_change:null,
				no_icon:'icon-picture',
				thumbnail:'small',
				before_remove: function() {
					//don't remove/reset files while being uploaded
					return !working;
				},
				before_change: function(files, dropped) {
					var file = files[0];
					if(typeof file === "string") {
						//file is just a file name here (in browsers that don't support FileReader API)
						if(! (/\.(jpe?g|png|gif|pdf)$/i).test(file) ) return false;
					}
					else {//file is a File object
						var type = $.trim(file.type);
						if(last_gritter) $.gritter.remove(last_gritter);
						if( ( type.length > 0 && ! (/^image|application\/(jpe?g|png|gif|pdf)$/i).test(type) )
							|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|pdf)$/i).test(file.name) )//for android default browser!
						) {
							last_gritter = $.gritter.add({
								title: 'File is not an image or pdf!',
								text: 'Please choose a jpg|gif|png|pdf image or pdf!',
								class_name: 'gritter-error gritter-center'
							});
							return false;
						}

						if( file.size > 2100000 ) {//~2 Mb
							last_gritter = $.gritter.add({
								title: 'File too big!',
								text: 'Image size should not exceed 2 Mb!',
								class_name: 'gritter-error gritter-center'
							});
							return false;
						}
					}

					return true;
				}
			});

		});

		$('#AttachFiles-3').on('click', function(){
			var modal =
                '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
                    <div class="modal-dialog"><div class="modal-content"><div class="modal-header">\
                        <button type="button" class="close" data-dismiss="modal">&times;</button>\
                        <h4 class="blue">Change Files</h4>\
                    </div>\
                    \
<form action="<?php echo base_url();?><?php echo $url;?>" method="post" enctype="multipart/form-data">\
                                <div class="modal-body">\
                                        <div class="space-4"></div>\
                                        <div style="width:75%;margin-left:12%;"><input type="file" name="userfile" /></div>\
                                        <input type="hidden" name="upload" value="' + this.title + '"\
                                </div>\
                                \
                                <div class="modal-footer center">\
                                        <button type="submit" name="btnUpload" value="upload" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
                                        <button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
                                </div>\
</form>\
                        </div></div></div>';


			var modal = $(modal);
			modal.modal("show").on("hidden", function(){
				modal.remove();
			});

			var working = false;

			var form = modal.find('form:eq(0)');
			var file = form.find('input[type=file]').eq(0);
			file.ace_file_input({
				style:'well',
				btn_choose:'Click to choose new file',
				btn_change:null,
				no_icon:'icon-picture',
				thumbnail:'small',
				before_remove: function() {
					//don't remove/reset files while being uploaded
					return !working;
				},
				before_change: function(files, dropped) {
					var file = files[0];
					if(typeof file === "string") {
						//file is just a file name here (in browsers that don't support FileReader API)
						if(! (/\.(jpe?g|png|gif|pdf)$/i).test(file) ) return false;
					}
					else {//file is a File object
						var type = $.trim(file.type);
						if(last_gritter) $.gritter.remove(last_gritter);
						if( ( type.length > 0 && ! (/^image|application\/(jpe?g|png|gif|pdf)$/i).test(type) )
							|| ( type.length == 0 && ! (/\.(jpe?g|png|gif|pdf)$/i).test(file.name) )//for android default browser!
						) {
							last_gritter = $.gritter.add({
								title: 'File is not an image or pdf!',
								text: 'Please choose a jpg|gif|png|pdf image or pdf!',
								class_name: 'gritter-error gritter-center'
							});
							return false;
						}

						if( file.size > 2100000 ) {//~2 Mb
							last_gritter = $.gritter.add({
								title: 'File too big!',
								text: 'Image size should not exceed 2 Mb!',
								class_name: 'gritter-error gritter-center'
							});
							return false;
						}
					}

					return true;
				}
			});

		});

    </script>