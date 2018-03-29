<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
    <legend>
        <h3><?php echo anchor('registration', $title, array('class'=>'link-control')); ?></h3>
    </legend>

    <div>
        <div class="widget-body">
        <form method="post" id="user-filter" action="<?=base_url()?>registration/CTRL_SetFilterUser">
            <label for="RequestName" class="col-md-1 control-label">Status</label>
            <div class="col-md-3">
                <select name="user_filter" onchange="submitFilter()" class="form-control">
                    <option value="0" <?=$status == 0 ? "selected" : '' ?>>Unverified</option>
                    <option value="1" <?=$status == 1 ? "selected" : '' ?>>Verified</option>
                    <option value="2" <?=$status == 2 ? "selected" : '' ?>>Rejected</option>
                </select>
            </div>
            <br/><br/>
        </form>
        <br/>
        </div>
    </div>

    <section id="widget-grid">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false"
                     data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" 
                     >
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Row Tables </h2>
                    </header>


                    <!-- widget div-->
                    <div>
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead class="danger">
                                    <tr>
										<th width="100" class="center">ID</th>	 
										<th width="170" class="center">User Name</th>
										<th width="200" class="center">Email</th>
										<th width="200" class="center">Date & Time</th>
										<th width="130" style="text-align:center">Status</th>
										<th class="center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                    <tr>
										<td class="center"><?php echo $row->id; ?></td>
										<td><?php echo $row->username; ?></td>
										<td><?php echo $row->email; ?></td>
										<td><?php echo $row->timestamp; ?></td>
										<td style="text-align:center"><?php 
											if($row->status == 0){ ?>
												<span class="label label-info"><?php echo "Unverified"; ?></span>
											<?php }
											if($row->status == 1){ ?>
												<span class="label label-success"><?php echo "Verified"; ?></span>
											<?php }
											if($row->status == 2){ ?>
												<span class="label label-warning"><?php echo "Denied"; ?></span>
											<?php }
										?></td>
										<td>
											<button class="btn btn-xs btn-primary" id="btn_detail" onclick="go_to_detail(<?=$row->id?>)" <?=$row->status != 0 ? 'disabled' : ''?>>
												<i class="fa fa-edit bigger-120"></i>
											</button>
										</td>
									</tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end widget content -->
                    </div>
                    <!-- end widget div -->
                </div>
                <!-- end widget -->
        </section>
    </div>

<!-- <script src="<?php echo base_url();?>themes/js/jquery.js"></script> -->

<script type="text/javascript">
	function go_to_detail(id){
		window.location.href="<?php echo base_url()?>registration/CTRL_Detail/"+id;
	}

	function submitFilter(){
		document.getElementById('user-filter').submit();
	}
</script>