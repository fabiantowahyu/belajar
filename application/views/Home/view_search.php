<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="row-fluid">
    <legend>
        <h3> <i class="fa fa-search  fa-fw txt-color-blueDark"></i>

            <label class="txt-color-blue"><?php echo $title; ?></label>
        </h3>
    </legend>   

    <section id="widget-grid" class="">
        <!-- row -->
        <div class="row">

            <!-- NEW WIDGET START -->
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form method="get" action="<?php echo base_url(); ?>admin/Ctrl_Search" id="form-search2">

                    <div class="well">

                        <div class="input-group">

                            <input class="form-control " type="text"  id="keyword" name="keyword" value="<?php echo $keyword; ?>" placeholder="Search...">
                            <div class="input-group-btn">
                                <button class="btn btn-default btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                    Search
                                </button>

                            </div>

                        </div>
                    </div>
                </form>
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
                        <div class="widget-body ">
                            <div class="tabbable">

                                <div class="tab-content profile-edit-tab-content">
                                    <div id="edit-transaction" class="tab-pane in active">
                                        <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                            <thead class="danger">
                                                <tr>
                                                    <th>NO LSE</th>
                                                    <th>Client Name</th> 
                                                    <th>Vessel Name</th> 
                                                    <th>No LC</th> 
                                                    <th>Request Date</th>
                                                    <th class="center">Action</th> 
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($results as $row) { ?>
                                                    <tr >
                                                        <td><?php echo $row->no_lse; ?></td>
                                                        <td><?php echo $row->client_name; ?></td>
                                                        <td><?php echo $row->vessel_name; ?></td>
                                                        <td><?php echo $row->no_lc; ?></td>
                                                        <td><?php echo date("d M Y", strtotime($row->recdate)); ?> </td>
                                                        <td class="center">
                                                            <?php
                                                             echo anchor('lse/CTRL_Edit/' . $row->no_lse, '<button class="btn btn-xs btn-primary" data-rel="tooltip" title="View"><i class="fa fa-file-text bigger-120"></i></button>');
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- end widget content -->
                        </div>
                    </div>
                    <!-- end widget div -->

                </div>
            </article>
        </div>
        <!-- end widget -->
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#form-search2').submit(function (e) {
           
            if (!$('#keyword').val()) {
                e.preventDefault();
            }
        });
    });
</script>