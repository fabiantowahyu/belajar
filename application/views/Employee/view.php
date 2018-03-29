<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row-fluid">
    <legend>
    <h3>
        <?php 
        echo anchor('employee', $title, array('class'=>'link-control')); 
        echo nbs(2);
        echo anchor('employee/CTRL_New', '<i class="fa fa-plus"></i>', array('class'=>'btn btn-success btn-mini','data-rel'=>'tooltip',  'title'=>'Add Employee'));
        ?>
    </h3>
    </legend>

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

                        <!-- widget edit box -->
                        <!-- <div class="jarviswidget-editbox">
This area used as dropdown edit box

</div> -->
                        <!-- end widget edit box -->

                        <!-- widget content -->
                        <div class="widget-body no-padding">
                            <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                <thead class="info">
                                    <tr>
                                        <th width="100">EMP ID</th>
                                        <th width="150">Employee Name</th>
                                        <th width="150">Position</th>
                                        <th width="150">Branch</th>
                                        <th width="150">Join Date</th>
                                        <th width="100">Gender</th>
                                        <th width="100">Mobile Phone</th>
                                        <th width="10" class="center">Action</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                    <tr>
                                        <td><a href="#" onclick="PopUpWindow('<?php echo $url_view.$row->emp_id; ?>','mywindow',800,600,'yes','yes'); return false;"><?php echo $row->emp_id; ?></a></td>
                                        <td><?php echo $row->emp_name;?></td>
                                        <td><?php echo $row->position_name; ?></td>
                                        <td><?php echo $row->branch; ?></td>
                                        <td><?php echo date("d M Y", strtotime($row->join_date)) ?></td>
                                        <td><?php echo $row->gender; ?></td>
                                        <td><?php echo $row->hp; ?></td>
                                        <td class="center">
                                            <?php 
                                                                      echo anchor('employee/CTRL_Edit/' . $row->emp_id, '<button class="btn btn-xs btn-primary"><i class="fa fa-pencil bigger-120"></i></button>');
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
                </section>
        </div>


        <script type="text/javascript">
            localStorage.setItem('lastTab', '');
        </script>