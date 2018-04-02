<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">
    <h3 class="header smaller lighter blue">
        <?php 
        echo 'PIC'; 
        echo nbs(2);
        echo anchor('supplier/CTRL_New_PIC/'.$id, '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini'));
        ?>
    </h3>

        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-1" data-widget-colorbutton="false"
                     data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" 
                     >
                    <!-- widget options:
usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

data-widget-colorbutton="false"
data-widget-editbutton="false"
data-widget-togglebutton="false"
data-widget-deletebutton="false"
data-widget-fullscreenbutton="false"
data-widget-custombutton="false"
data-widget-collapsed="true"
data-widget-sortable="false"

-->
                    <header>
                        <!-- <div class="widget-toolbar"> 
place your buttons here with .btn .btn-xs class 
<span class="widget-icon"> <i class="fa fa-plus"></i> </span>
</div> -->
                        <!-- <span class="widget-icon"> <i class="fa fa-plus"></i> </span> -->
                        <!-- 							<h2>
<?php 
//echo anchor('manage_menu/CTRL_New', '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini'));
?>;
</h2>
-->		
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget edit box -->
                        <!-- <div class="jarviswidget-editbox">
This area used as dropdown edit box

</div> -->
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead class="success">
                                    <tr>
                                        <th width="100">Category</th>
                                        <th width="200">Contact Name</th>
                                        <th width="150">Email</th>
                                        <th width="100">Work Phone</th>
                                        <th width="100">Handphone</th>
                                        <th width="100">Fax</th>
                                        <th width="10" class="center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results_pic as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->category_name; ?></td>
                                        <td><?php echo $row->contact_name; ?></td>
                                        <td><?php echo $row->email; ?></td>
                                        <td><?php echo $row->work_phone; ?></td>
                                        <td><?php echo $row->hp; ?></td>
                                        <td><?php echo $row->fax; ?></td>
                                        <td class="center">
                                            <a href="<?php echo base_url();?>supplier/CTRL_Edit_PIC/<?php echo $id;?>/<?php echo $row->id;?>" class="btn btn-xs btn-primary" ><i class="fa fa-edit bigger-120"></i></a>
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
            </article>
        </div>

</div>