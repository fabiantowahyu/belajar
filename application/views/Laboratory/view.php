<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">
    <h3 class="header smaller lighter blue">
        <?php 
        echo anchor('laboratory', $title, array('class'=>'link-control')); 
        echo nbs(2);
        echo anchor('laboratory/CTRL_New', '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini'));
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
                    <header>
                        <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                        <h2>Row Tables </h2>
                    </header>

                    <!-- widget div-->
                    <div>

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead class="danger">
                                    <tr>
                                        <th width="100"><?php echo $title; ?> ID</th>
                                        <th width="250"><?php echo $title; ?> Name</th>
                                        <th width="200">Address</th>
                                        <th width="100">Phone</th>
                                        <th width="100">Branch</th>
                                        <th width="10" class="center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if($results){
    foreach ($results as $row) { ?>
                                    <tr>
                                        <td><a href="#" onclick="PopUpWindow('<?php echo $url_view.$row->id; ?>','mywindow',600,500,'yes','yes'); return false;"><?php echo $row->id; ?></a></td>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->address; ?></td>
                                        <td><?php echo $row->phone; ?></td>
                                        <td><?php echo $row->branch; ?></td>
                                        <td class="center">
                                            <?php 
                                echo anchor('laboratory/CTRL_Edit/' . $row->id, '<button class="btn btn-xs btn-primary"><i class="fa fa-pencil bigger-120"></i></button>');
                                            ?>
                                        </td>
                                    </tr>
                                    <?php } 
}?>
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
    </section></div>

<script type="text/javascript">
    localStorage.setItem('lastTab', '');
</script>

