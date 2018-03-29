<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="MasterEmployee" class="row-fluid">

    <article class="col-sm-12 col-md-12 col-lg-12">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
            <header>
                <span class="widget-icon"> <i class="fa fa-eye"></i> </span>
                <h2><?php echo $title_head; ?></h2>
            </header>

            <div>
                <!-- widget content -->
                <div class="widget-body">
                    <?php echo form_open_multipart($url, array('name' => 'AddEmpform', 'class' => 'form-horizontal', 'id' => 'validation-form')); ?>

                    <fieldset>

                        <legend>General</legend>

                        <div role="content">

                            <div class="row"> 

                                <div class="col-md-4 ">
                                    <p align="center"><span><b>Photo</b></span></p>
                                    <input type="file" name="userfile" />
                                    <span class="text-danger "><i>Only for *.jpg, *.png and *.gif<br/>Maximum Attachment File (1024 Kb)</i></span>

                                    <div class="space-10"></div>

                                    <p align="center"><span><b>Employee Signature</b></span></p>
                                    <input type="file" name="signature" />
                                    <span class="text-danger"><i>Only for *.jpg, *.png and *.gif<br/>Maximum Attachment File (1024 Kb)</i></span>
                                </div>
                                <div class="vspace"></div>

                                <div class="col-md-8">
                                    <div class="form-group" >
                                        <label for="EmployeeID" class=" col-md-2 control-label">EMP ID</label>
                                        <div class="col-md-3">
                                            <?php
                                            $input = array('name' => 'emp_id', 'value' => $id, 'maxlength' => 16, 'id' => 'EmployeeID', 'class' => 'form-control', 'disabled' => 'disabled');
                                            echo form_input($input);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="FirstName" class="col-md-2 control-label">First Name <span class="text-danger">*</span></label>
                                        <div class="col-md-5">
                                            <?php
                                            $input = array('name' => 'first_name', 'maxlength' => 64, 'id' => 'FirstName', 'class' => 'form-control', 'data-bv-notempty' => 'true', 'data-bv-notempty' => 'true');
                                            echo form_input($input);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="MiddleName" class="col-md-2 col-md-2 control-label">Middle Name</label>
                                        <div class="col-md-5">
                                            <?php
                                            $input = array('name' => 'middle_name', 'maxlength' => 64, 'id' => 'MiddleName', 'class' => 'form-control');
                                            echo form_input($input);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="LastName" class="col-md-2 control-label">Last Name</label>
                                        <div class="col-md-5">
                                            <?php
                                            $input = array('name' => 'last_name', 'maxlength' => 64, 'id' => 'LastName', 'class' => 'form-control');
                                            echo form_input($input);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Position" class="col-md-2 control-label">Position <span class="text-danger">*</span></label>
                                        <div class="col-md-5">
                                            <?php
                                            echo form_dropdown('position', $option_position, $position, 'id="Position" class="form-control"  data-bv-notempty = "true"');
                                            ?>
                                                               <!--  <input type="button" name="btnPick" value="Pick" onclick="PopUpWindow('<?php echo $url_position; ?>','mywindow',800,600,'yes','yes'); return false;"> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Gender" class="col-md-2 control-label">Gender</label>
                                        <div class="col-md-5">
                                            <?php
                                            echo form_dropdown('gender', $option_gender, $gender, 'id="Gender" class="form-control"  data-bv-notempty = "true"');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="branch" class="col-md-2 control-label">Worklocation <span class="text-danger">*</span></label>
                                        <div class="col-md-5">
                                            <?php
                                            echo form_dropdown('branch_id', $option_branch, $branch_id, 'id="branch" class="form-control"  data-bv-notempty = "true"');
                                            ?>
                                        </div>
                                    </div>
                                    <!--  <div class="form-group">
                                         <label for="grade" class="col-md-2 control-label">Grade <span class="text-danger">*</span></label>
                                         <div class="col-md-4">
                                    <?php
                                    echo form_dropdown('grade_id', $option_grade, $grade_id, 'id="grade" class="form-control"');
                                    ?>
                                         </div>
                                     </div> -->
                                    <div class="form-group ">
                                        <label for="JoinDate" class="col-md-2 control-label">Join Date <span class="text-danger">*</span></label>

                                        <div class="col-md-3">
                                            <div class=" input-group">
                                                <?php
                                                $input = array('name' => 'join_date', 'id' => 'JoinDate', 'class' => 'form-control datepicker', 'data-dateformat' => 'yy-mm-dd');
                                                echo form_input($input);
                                                ?>
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email" class="col-md-2 control-label">Email</label>
                                        <div class="col-md-5">
                                            <?php
                                            $input = array('type' => 'email', 'name' => 'email', 'maxlength' => 128, 'id' => 'Email', 'class' => 'form-control');
                                            echo form_input($input);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-10"></div><br/>
                            <legend>Other Information</legend>
                            <div class="form-group">
                                <label for="BirthPlace" class="col-md-2 control-label">Birth Place &nbsp;</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'birth_place', 'id' => 'birth_place', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="BirthDate" class="col-md-2 control-label">Birth Date</label>

                                <div class="col-md-2">
                                    <div class=" input-group">
                                        <?php
                                        $input = array('name' => 'birth_date', 'id' => 'birth_date', 'class' => 'form-control datepicker',  'data-dateformat' => 'yy-mm-dd');
                                        echo form_input($input);
                                        ?>
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Religion" class="col-md-2 control-label">Religion&nbsp;</label>
                                <div class="col-md-4">
                                    <?php
                                    echo form_dropdown('religion', $option_religion, $religion, 'id="religion" class="form-control"');
                                    ?>
                                </div>
                            </div>
                            <div class="space-10"></div><br/>
                            <legend >Register User &nbsp;&nbsp;


                                <label>
                                    <?php
                                    echo form_checkbox('reguser', 1, 1, 'class="checkbox style-0" onclick="registerUser();"');
                                    ?>
                                    <span></span>
                                </label>

                            </legend>
                            <div class="form-group" id="rowuser1">
                                <label for="Username" class="col-md-2 control-label">Username <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'username', 'maxlength' => 32, 'id' => 'Username', 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group" id="rowuser2">
                                <label for="Password" class="col-md-2 control-label">Password <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'password', 'id' => 'Password', 'maxlength' => 32, 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_password($input);
                                    ?>
                                    <span class="lbl"></span>
                                </div>
                            </div>
                            <div class="form-group" id="rowuser3">
                                <label for="RePassword" class="col-md-2 control-label">Re-Type Password <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'password_re', 'id' => 'RePassword', 'maxlength' => 32, 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_password($input);
                                    ?>
                                    <span class="lbl"></span>
                                </div>
                            </div>
                            <div class="form-group" id="rowuser4">
                                <label for="Role" class="col-md-2 control-label">Role Application <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    echo form_dropdown('role', $option_role, $role, 'id="Role" class="form-control" data-bv-notempty="true"');
                                    ?>
                                </div>
                            </div>
                            <div class="form-group" id="rowuser5">
                                <label for="Status" class="col-md-2 control-label">Active</label>


                                <span>
                                    <span class="onoffswitch">
                                        <?php
                                        echo form_checkbox('status', 1, 0, 'class="onoffswitch-checkbox" id="st3"');
                                        ?>
                                        <label class="onoffswitch-label" for="st3"> 
                                            <span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
                                            <span class="onoffswitch-switch"></span> 
                                        </label> 
                                    </span>
                                </span>
                            </div>

                            <div class="space-10"></div><br/>
                            <legend>Address and Phone Information</legend>
                            <div class="form-group">
                                <label for="Address" class="col-md-2 control-label">Address <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    $txtarea = array('name' => 'address', 'rows' => 3, 'class' => 'form-control', 'data-bv-notempty' => 'true');
                                    echo form_textarea($txtarea);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="CountryName" class="col-md-2 control-label">Country <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    echo form_dropdown('country', $option_country, $country, 'id="CountryName" class="form-control" data-bv-notempty = "true"');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="ProvinceName" class="col-md-2 control-label">Province <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <?php
                                    echo form_dropdown('province', $option_province, $province, 'id="ProvinceName" class="form-control" data-bv-notempty = "true"');
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="PostalCode" class="col-md-2 control-label">Postal Code</label>
                                <div class="col-md-2">
                                    <?php
                                    $input = array('name' => 'post_code', 'maxlength' => 64, 'id' => 'PostalCode', 'class' => 'form-control input-mask-kdpos');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Phone" class="col-md-2 control-label">Phone</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'phone', 'maxlength' => 64, 'id' => 'Phone', 'class' => 'form-control input-mask-phone');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="HandPhone" class="col-md-2 control-label">Mobile Phone</label>
                                <div class="col-md-4">
                                    <?php
                                    $input = array('name' => 'hp', 'maxlength' => 64, 'id' => 'HandPhone', 'class' => 'form-control input-mask-hp');
                                    echo form_input($input);
                                    ?>
                                </div>
                            </div>

                            <div class="hr"></div>
                            <div class="form-actions">
                                <?php
                                echo anchor('employee', '<i class="fa fa-reply"></i>&nbsp;Cancel', array('class' => 'btn btn-small btn-info'));
                                echo form_hidden('emp_id', $id);
                                echo form_hidden('rdbuser', 1);
                                ?>
                                <button type="submit" name="btn_submit" value="Save" class="btn btn-small btn-primary"><i class="fa fa-save"></i> Save</button> &nbsp;

                            </div>

                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </article>
</div>
<div class="clearfix"></div>
<script>
    function registerUser() {
        if (document.AddEmpform.reguser.checked == false) {
            document.AddEmpform.rdbuser.value = 0;
            //document.AddEmpform.selStatus.selectedIndex=1;
            document.getElementById('rowuser1').style.display = "none";
            document.getElementById('rowuser2').style.display = "none";
            document.getElementById('rowuser3').style.display = "none";
            document.getElementById('rowuser4').style.display = "none";
            document.getElementById('rowuser5').style.display = "none";
            document.getElementById('rowuser6').style.display = "none";
        } else {
            document.AddEmpform.rdbuser.value = 1;
            //document.AddEmpform.selStatus.selectedIndex=0;
            document.getElementById('rowuser1').style.display = "";
            document.getElementById('rowuser2').style.display = "";
            document.getElementById('rowuser3').style.display = "";
            document.getElementById('rowuser4').style.display = "";
            document.getElementById('rowuser5').style.display = "";
            document.getElementById('rowuser6').style.display = "";
        }
    }
</script>