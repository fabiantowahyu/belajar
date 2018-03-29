<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">
    <h3 class="header smaller lighter blue">
        <?php 
        echo 'Address'; 
        echo nbs(2);
        echo anchor('client/CTRL_New_Address/'.$id, '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini'));
        ?>
    </h3>

   
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false"
                     data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="true" 
                     >
                    <header>
                       
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
                            <table id="dt_address" class="table table-striped table-bordered table-hover" width="100%">
                                <thead class="success">
                                    <tr>
                                        <th width="50">Shipping</th>
                                        <th width="50">Billing</th>
                                        <th width="100">Label</th>
                                        <th width="100">Address</th>
                                        <th width="100">Phone</th>
                                        <th width="10" class="center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results_address as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->shipping; ?></td>
                                        <td><?php echo $row->billing; ?></td>
                                        <td><?php echo $row->label; ?></td>
                                        <td><?php echo $row->address; ?></td>
                                        <td><?php echo $row->phone; ?></td>
                                        <td class="center">
                                            <a href="<?php echo base_url();?>client/CTRL_Edit_Address/<?php echo $id;?>/<?php echo $row->id;?>" class="btn btn-xs btn-primary" ><i class="fa fa-edit bigger-120"></i></a>
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