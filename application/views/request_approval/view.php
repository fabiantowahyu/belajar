<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    
    <h3 class="header smaller lighter blue">
        <?php
        echo anchor('Request_approval', $title, array('class' => 'link-control'));
        echo nbs(2);
        //echo anchor('request_approval/CTRL_New', '<i class="icon-plus"></i>', array('class'=>'btn btn-success btn-mini'));
        ?>
    </h3>
    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-colorbutton="false"
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
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Row Tables </h2>
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
                             <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead class="success">
                                    <tr>
                                        <th width="100">Approval ID</th>
                                        <th width="250">Request Name</th>
                                        <th width="300">Description</th>
                                        <!--<th width="100">Status</th>-->
                                        <th width="10" class="center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->request_name; ?></td>
                                        <td><?php echo $row->remark; ?></td>
                                        <td class="center">
                                            <?php 
                                                                      echo anchor('request_approval/CTRL_View_Detail/' . $row->id, '<button class="btn btn-xs btn-danger"><i class="fa fa-search-plus bigger-130"></i></button>');
                                            ?>
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
    </section>
</div>