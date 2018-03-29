<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <article class="col-sm-12 col-md-12 col-lg-12">
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">


            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2><?php echo $title_head; ?></h2>
            </header>


            <div>
                <div class="widget-body">

                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-16">
                            <li class="active" id="tab-basic">
                                <a data-toggle="tab" href="#edit-basic">
                                    <i class="blue fa fa-pencil bigger-125"></i>
                                    Personal Info
                                </a>
                            </li>

                            <li id="tab-address">
                                <a data-toggle="tab" href="#edit-address">
                                    <i class="blue fa fa-envelope bigger-125"></i>
                                    Address And Phone Information
                                </a>
                            </li>

                            <!-- <li id="tab-education">
                                                    <a data-toggle="tab" href="#edit-education">
                                                            <i class="blue icon-cog bigger-125"></i>
                                                            Education
                                                    </a>
                                            </li>
            
                                            <li>
                                                    <a data-toggle="tab" href="#edit-training">
                                                            <i class="blue icon-key bigger-125"></i>
                                                            Training
                                                    </a>
                                            </li>
                            
                            <li id="tab-family">
                                                    <a data-toggle="tab" href="#edit-family">
                                                            <i class="blue icon-cog bigger-125"></i>
                                                            Family And Dependant
                                                    </a>
                                            </li>
                                            
                                            <li id="tab-bank">
                                                    <a data-toggle="tab" href="#edit-bank">
                                                            <i class="blue icon-lightbulb"></i>
                                                            Bank Account Information
                                                    </a>
                                            </li> -->
                        </ul>

                        <div class="tab-content profile-edit-tab-content">
                            <div id="edit-basic" class="tab-pane in active">
                                <div class="space-10"></div>
                                <?php if ($this->session->flashdata('send_success')) { ?>
                                    <div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?= $this->session->flashdata('send_success') ?> </div>
                                <?php } ?>
                                <div role="content">
                                    <fieldset>
                                        <div class="space-10"></div><br/>
                                        <div class="row row col-md-4 col-md-offset-1 centered">
                                            <p><span><b>Photo</b></span></p>
                                            <span class="profile-picture">
                                                <img class="well well-light well-sm  editable img-responsive" id="Photo" src="<?php echo base_url() . $file_name; ?>" width="150" />
                                            </span><br/>
                                            <span class="text-danger"><i>Only for *.jpg, *.png and *.gif<br/>Maximum Attachment File (1024 Kb)</i></span>



                                        </div>
                                        <div class="row row col-md-4">
                                            <p><span><b>Employee Signature</b></span></p>
                                            <span class="profile-picture">
                                                <img class="well well-light well-sm  editable img-responsive" id="Signature" width="150" src="<?php echo base_url() . $file_signature; ?>" />

                                                <?php /* if ($company->aws_s3 == '0') { ?>
                                                  <img class="editable" id="Signature" width="150" src="<?php echo base_url() . $file_signature; ?>" />
                                                  <?php } else {
                                                  ?>
                                                  <img class="editable" id="Signature" width="150" src="https://s3-ap-southeast-1.amazonaws.com/cubics-ap-southeast-1-251383776320/signature/<?php echo $signature; ?>" />
                                                  <?php } */ ?>
                                            </span><br>
                                            <span class="text-danger"><i>Only for *.jpg, *.png and *.gif<br/>Maximum Attachment File (1024 Kb)</i></span>

                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="space-10"></div><br/>
                                        <?php echo form_open_multipart($url, array('name' => 'form_employee', 'class' => 'form-horizontal', 'id' => 'validation-form')); ?>
                                        <legend>General</legend>

                                        <div class="row col-md-6">

                                            <div class="form-group" >
                                                <label for="FirstName" class=" col-md-3 control-label">First Name <span class="text-danger">*</span></label>
                                                <div class="col-md-6">

                                                    <?php
                                                    $input = array('name' => 'first_name', 'value' => $first_name, 'maxlength' => 64, 'id' => 'FirstName', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group" >
                                                <label for="MiddleName" class=" col-md-3 control-label">Middle Name </label>
                                                <div class="col-md-6">

                                                    <?php
                                                    $input = array('name' => 'middle_name', 'value' => $middle_name, 'maxlength' => 64, 'id' => 'MiddleName', 'class' => 'form-control');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group" >

                                                <label for="LastName" class=" col-md-3 control-label">Last Name </label>
                                                <div class="col-md-6">

                                                    <?php
                                                    $input = array('name' => 'last_name', 'value' => $last_name, 'maxlength' => 64, 'id' => 'LastName', 'class' => 'form-control');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                <label for="Gender" class=" col-md-3 control-label">Gender </label>
                                                <div class="col-md-6">

                                                    <?php
                                                    echo form_dropdown('gender', $option_gender, $gender, 'id="Gender" class="form-control"');
                                                    ?>
                                                </div>
                                            </div>



                                            <div class="form-group" >
                                                <label for="Email" class=" col-md-3 control-label">Email</label>
                                                <div class="col-md-6">

                                                    <?php
                                                    $input = array('name' => 'email', 'value' => $email, 'maxlength' => 128, 'id' => 'Email', 'class' => 'form-control');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>   


                                            <div class="form-group" >
                                                <label for="Gender" class=" col-md-3 control-label">Branch </label>
                                                <div class="col-md-6">

                                                    <?php
                                                    echo form_dropdown('branch_id', $option_branch, $branch_id, 'id="branch" class="form-control"');
                                                    ?>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row col-md-6">
                                            <div class="form-group" >
                                                <label for="marital_place" class=" col-md-3 control-label">Employment Status</label>
                                                <div class="col-md-6 ">

                                                    <?php
                                                    echo form_dropdown('emp_status', $option_empstatus, $emp_status, 'id="emp_status" class="form-control" onchange="setOnOff(document.form_employee);"');
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group" >
                                                <label for="Position" class=" col-md-3 control-label">Position </label>
                                                <div class="col-md-6">

                                                    <?php
                                                    echo form_dropdown('position_id', $option_position, $position_id, 'id="Position" class="form-control"');
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="form-group" >
                                                <label for="id_number" class=" col-md-3 control-label">ID Number </label>
                                                <div class="col-md-6">

                                                    <?php
                                                    $input = array('name' => 'id_number', 'value' => $id_number, 'id' => 'id_number', 'class' => 'form-control');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>




                                            <div class="form-group ">
                                                <label for="ID_ExpiredDate" class="col-md-3 control-label">ID Expired Date </label>

                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'id_expireddate', 'value' => $id_expireddate, 'id' => 'id_expireddate', 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>     











                                            <div class="form-group ">
                                                <label for="JoinDate" class="col-md-3 control-label">Effective Date <span class="text-danger">*</span></label>

                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'join_date', 'value' => $join_date, 'id' => 'JoinDate', 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="form-group ">
                                                <label for="Date" class="col-md-3 control-label">End Date</label>

                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'end_date', 'value' => $end_date, 'id' => 'end_date', 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="space-10"></div><br/>
                                        <legend>Other Information</legend>
                                        <div class="row col-md-6">

                                            <div class="form-group" >
                                                <label for="birth_place" class=" col-md-3 control-label">Birth Place</label>
                                                <div class="col-md-6">

                                                    <?php
                                                    $input = array('name' => 'birth_place', 'value' => $birth_place, 'id' => 'birth_place', 'class' => 'form-control');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>




                                            <div class="form-group ">
                                                <label for="birth_date" class="col-md-3 control-label">Birth Date</label>

                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'birth_date', 'value' => $birth_date, 'id' => 'birth_date', 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>





                                            <div class="form-group" >
                                                <label for="Religion" class=" col-md-3 control-label">Religion</label>
                                                <div class="col-md-6">

                                                    <?php
                                                    echo form_dropdown('religion', $option_religion, $religion, 'id="religion" class="form-control"');
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-md-6">
                                            <div class="form-group" >
                                                <label for="marital_status" class=" col-md-3 control-label">Marital Status</label>
                                                <div class="col-md-6">

                                                    <?php
                                                    echo form_dropdown('marital_status', $option_maritalstatus, $marital_status, 'id="marital_status" class="form-control"');
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group" >
                                                <label for="marital_place" class=" col-md-3 control-label">Marital Place</label>
                                                <div class="col-md-6">

                                                    <?php
                                                    $input = array('name' => 'marital_place', 'value' => $marital_place, 'id' => 'marital_place', 'class' => 'form-control');
                                                    echo form_input($input);
                                                    ?>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <label for="marital_date" class="col-md-3 control-label">Marital Date</label>

                                                <div class="col-md-6">
                                                    <div class=" input-group">
                                                        <?php
                                                        $input = array('name' => 'marital_date', 'value' => $marital_date, 'id' => 'marital_date', 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                        echo form_input($input);
                                                        ?>
                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="space"></div>
                                        <div class="form-actions">
                                            <?php
                                            echo anchor('employee', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                            echo nbs(1);
                                            echo form_hidden('emp_id', $id);
                                            ?>
                                            <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button>&nbsp;

                                            <a href="JavaScript:Void(0);" id="cdelete"  data-toggle="modal" data-target="#myModal" class="btn btn-small btn-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </fieldset>
                                </div>
                            </div>
                            <div id="edit-address" class="tab-pane">
                                <div class="space-10"></div>
                                <?php $this->load->view('Employee/form_edit_address', $id); ?>
                            </div>

                            <!-- <div id="edit-education" class="tab-pane">
                                    <div class="space-10"></div>
                            <?php $this->load->view('Employee/view_education', $id); ?>
                            </div>
            
                            <div id="edit-training" class="tab-pane">
                                    <div class="space-10"></div>
                            <?php $this->load->view('Employee/view_training', $id); ?>
                            </div>
            
            <div id="edit-family" class="tab-pane">
                                    <div class="space-10"></div>
                            <?php $this->load->view('Employee/view_family', $id); ?>
                            </div>
                            
                            <div id="edit-bank" class="tab-pane">
                                    <div class="space-10"></div>
                            <?php $this->load->view('Employee/view_bank', $id); ?>
                            </div> -->
                        </div>
                    </div>
                    <div class="space-8"></div>
                </div>
            </div>
        </div>
    </article>
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
    function setOnOff(thisform)
    {
        if (thisform.emp_status.value != 'Permanent')
        {

            document.getElementById('enddate').style.display = '';
        } else {
            document.getElementById('enddate').style.display = 'none';
        }

    }
    
    $(document).ready(function () {
        
        
        
        
        
        
        $('#Photo,#Signature').on('click', function(){
			var a = this.id;
			var modal = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="blue">Change Picture</h4></div><form action="<?php echo base_url();?><?php echo $url;?>" method="post" enctype="multipart/form-data" class="no-margin">'+
				'<div class="modal-body">'+
				'<div class="space-4"></div><div ><input type="file" name="userfile" /></div>'+
				'<div><input type="hidden" name="upload_type" value="' + a + '" /></div></div>'+
				'<div class="modal-footer center"><button type="submit" name="upload" value="upload" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>'+
				'<button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>'+
				'</div></form></div></div></div>';
		
			var modal = $(modal);
			modal.modal("show").on("hidden", function(){
				modal.remove();
			});

			var working = false;

			var form = modal.find('form:eq(0)');
			var file = form.find('input[type=file]').eq(0);
			file.ace_file_input({
				style:'well',
				btn_choose:'Click to choose new picture',
				btn_change:null,
				no_icon:'fa fa-picture-o',
				thumbnail:'small',
				before_remove: function() {
					//don't remove/reset files while being uploaded
					return !working;
				},
				before_change: function(files, dropped) {
					var file = files[0];
					if(typeof file === "string") {
						//file is just a file name here (in browsers that don't support FileReader API)
						if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
					}
					else {//file is a File object
						var type = $.trim(file.type);
						if(last_gritter) $.gritter.remove(last_gritter);
						if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
								|| ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
							) {
							last_gritter = $.gritter.add({
								title: 'File is not an image!',
								text: 'Please choose a jpg|gif|png image!',
								class_name: 'gritter-error gritter-center'
							});
							return false;
						}
		
						if( file.size > 1000000 ) {//~1Mb
							last_gritter = $.gritter.add({
								title: 'File too big!',
								text: 'Image size should not exceed 1Mb!',
								class_name: 'gritter-error gritter-center'
							});
							return false;
						}
					}

					return true;
				}
			});

		});
		
    });
    
    
    
</script>