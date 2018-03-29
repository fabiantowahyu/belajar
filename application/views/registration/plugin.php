<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!--page specific plugin scripts-->

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrapvalidator/bootstrapValidator.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/libs/jquery-ui-1.10.3.min.js"></script>

<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/js/ace/ace.min.css">
<script src="<?php echo ASSETS_URL; ?>/js/ace/ace-elements.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/function.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/ace.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/jquery.gritter.min.js"></script>

<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {
        var client_type = $('#client_type').val();
        //alert(client_type);

        if (client_type === 'G001') {
            $('#NPB').hide();
        } else if (client_type === 'G002') {
            $('#NRP').hide();
        } else {
            $('#NRP , #NPB').show();
        }

        /* // DOM Position key index //
         
         l - Length changing (dropdown)
         f - Filtering input (search)
         t - The Table! (datatable)
         i - Information (records)
         p - Pagination (paging)
         r - pRocessing 
         < and > - div elements
         <"#id" and > - div with an id
         <"class" and > - div with a class
         <"#id.class" and > - div with an id and class
         
         Also see: http://legacy.datatables.net/usage/features
         */

        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        $('#dt_basic').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth": true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_dt_basic.respond();
            }
        });

        /* END BASIC */

        // custom toolbar
        $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on('keyup change', function () {

            otable
                    .column($(this).parent().index() + ':visible')
                    .search(this.value)
                    .draw();

        });
        /* END COLUMN FILTER */

        //attributeForm
        $('#validation-form').bootstrapValidator();
        // end attributeForm


        // Dialog Delete
        $('#cdelete').click(function () {
            $('#dialog_simple').dialog('open');
            return false;
        });

        $('#dialog_simple').dialog({
            autoOpen: false,
            width: 600,
            resizable: false,
            modal: true,
            title: "<div class='widget-header'><h4><i class='fa fa-warning'></i> Empty the recycle bin?</h4></div>",
            buttons: [{
                    html: "<i class='fa fa-trash-o'></i>&nbsp; Delete all items",
                    "class": "btn btn-danger",
                    click: function () {
                        $(this).dialog("close");
                    }
                }, {
                    html: "<i class='fa fa-times'></i>&nbsp; Cancel",
                    "class": "btn btn-default",
                    click: function () {
                        $(this).dialog("close");
                    }
                }]
        });
        //End Dialog Delete

        $("#Parent").change(function () {
            var parent_id = $('#Parent').val();
            $.post('<?php echo @$url_tid; ?>', {parent_id: parent_id}, function (result) {
                if (result.success) {
                    document.getElementById('OrderNumber').value = result.tid;
                } else {
                    alert(result.msg);
                }
            }, 'json');
        });

    });

</script>
<script>
//$('input:checkbox').click(function() {
//    alert("asdasd");
//    if ($('#row1').attr('checked',true)) {
//	alert("addclass");
//	//$('#row1').css({background:'#FCF6CF'});
//        $(this).closest('tr').addClass('success');
//    } else {
//	alert("removeclass");
//        $(this).closest('tr').removeClass('success');
//    }   });


    function highlight(row) {

        if ($('#check' + row).is(":checked")) {
            $('#info').show();
            $('#row' + row).closest('tr').addClass('success');
        } else {
            //alert("removeclass");
            $('#row' + row).closest('tr').removeClass('success');
        }
        $('#closeInfo').click(function () {

            $('#info').hide();

        });
    }

    function highlight_npb(row) {

        if ($('#check_npb' + row).is(":checked")) {
            $('#info').show();
            $('#row_npb' + row).closest('tr').addClass('success');
        } else {
            //alert("removeclass");
            $('#row_npb' + row).closest('tr').removeClass('success');
        }
        $('#closeInfo').click(function () {

            $('#info').hide();

        });
    }

    $('#check_registration_nrp').click(function () {

        if ($('#check_registration_nrp').is(":checked")) {
            $('.replace_nrp').prop('checked', true);
            $('#row1, #row2,#row3,#row4,#row5,#row6').addClass('success');

        } else {
            $('.replace_nrp').prop('checked', false);
            $('#row1, #row2,#row3,#row4,#row5,#row6').removeClass('success');
        }

    });

    $('#check_registration_npb').click(function () {

        if ($('#check_registration_npb').is(":checked")) {
            $('.replace_npb').prop('checked', true);
            $('#row_npb1, #row_npb2,#row_npb3,#row_npb4,#row_npb5,#row_npb6').addClass('success');

        } else {
            $('.replace_npb').prop('checked', false);
            $('#row_npb1, #row_npb2,#row_npb3,#row_npb4,#row_npb5,#row_npb6').removeClass('success');
        }

    });
    function getdetailRegistration(registration_no) {

        //alert(registration_no);
        var client_type= $('#client_type').val();
        
        if (registration_no != '') {

            $.ajax({
                url: "<?php echo base_url(); ?>registration/getRegistrationDetail",
                type: "POST",
                data: {registration_no: registration_no, client_type:'G001'},
                dataType: "json",
                success: function (data) {
                    //alert(registration_no);



                    $('#gov_commodity_name_nrp_temp').val(data.commodity);
                    $('#gov_commodity_name_nrp').text(data.commodity_name);
                    $('#gov_brand_nrp_temp').val(data.brand);
                    $('#gov_brand_nrp').text(data.brand);
                    $('#gov_product_type_nrp_temp').val(data.product_type);
                    $('#gov_product_type_nrp').text(data.product_type);
                    $('#gov_registration_date_nrp_temp').val(data.regdate);
                    $('#gov_registration_date_nrp').text(data.regdate);
                    $('#gov_expiration_date_nrp_temp').val(data.expdate);
                    $('#gov_expiration_date_nrp').text(data.expdate);
                    $('#gov_registration_no_nrp_temp').val(data.registration_no);
                    $('#gov_registration_no_nrp').text(data.registration_no);

                    $('#gov_attachment_nrp_temp').val(data.attachment);
                    $('#gov_attachment_nrp').html('<a href="#" onclick="popWindow(\'' + data.attachment + '\'); return false;"><label>attachment</label></a>');


                    if ($('#comp_commodity_name_nrp').text() === $('#gov_commodity_name_nrp').text()) {
                        $('#gov_commodity_name_nrp_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_commodity_name_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }


                    if ($('#comp_brand_nrp').text() === $('#gov_brand_nrp').text()) {
                        $('#gov_brand_nrp_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_brand_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }


                    if ($('#comp_product_type_nrp').text() === $('#gov_product_type_nrp').text()) {
                        $('#gov_product_type_nrp_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_product_type_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                    if ($('#comp_registration_date_nrp').text() === $('#gov_registration_date_nrp').text()) {
                        $('#gov_registration_date_nrp_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_registration_date_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                    if ($('#comp_expiration_date_nrp').text() === $('#gov_expiration_date_nrp').text()) {
                        $('#gov_expiration_date_nrp_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_expiration_date_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                    if ($('#comp_registration_no_nrp').text() === $('#gov_registration_no_nrp').text()) {
                        $('#gov_registration_no_nrp_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_registration_no_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                    if ($('#comp_attachment_nrp').text() === $('#gov_attachment_nrp').text()) {
                        $('#gov_attachment_nrp_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_attachment_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                }
            });

        } else {

            $('#gov_commodity_name_nrp_temp').val('');
            $('#gov_commodity_name_nrp').text('');
            $('#gov_brand_nrp_temp').val('');
            $('#gov_brand_nrp').text('');
            $('#gov_product_type_nrp_temp').val('');
            $('#gov_product_type_nrp').text('');
            $('#gov_registration_date_nrp_temp').val('');
            $('#gov_registration_date_nrp').text('');
            $('#gov_expiration_date_nrp_temp').val('');
            $('#gov_expiration_date_nrp').text('');
            $('#gov_registration_no_nrp_temp').val('');
            $('#gov_registration_no_nrp').text('');

            $('#gov_attachment_nrp_temp').val('');
            $('#gov_attachment_nrp').html('');


            $('#gov_commodity_name_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_brand_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_product_type_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_registration_date_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_expiration_date_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_registration_no_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_attachment_nrp_check').html('<i class="fa fa-remove txt-color-red"></i>');
        }
    }

    function getdetailRegistrationNPB(registration_no) {
    
        //alert(registration_no);
        if (registration_no != '') {
            $.ajax({
                url: "<?php echo base_url(); ?>registration/getRegistrationDetail",
                type: "POST",
                data: {registration_no: registration_no,client_type:'G002'},
                dataType: "json",
                success: function (data) {
                    //alert(data.brand);



                    $('#gov_commodity_name_npb_temp').val(data.commodity);
                    $('#gov_commodity_name_npb').text(data.commodity_name);
                    $('#gov_brand_npb_temp').val(data.brand);
                    $('#gov_brand_npb').text(data.brand);
                    $('#gov_product_type_npb_temp').val(data.product_type);
                    $('#gov_product_type_npb').text(data.product_type);
                    $('#gov_registration_date_npb_temp').val(data.regdate);
                    $('#gov_registration_date_npb').text(data.regdate);
                    $('#gov_expiration_date_npb_temp').val(data.expdate);
                    $('#gov_expiration_date_npb').text(data.expdate);
                    $('#gov_registration_no_npb_temp').val(data.registration_no);
                    $('#gov_registration_no_npb').text(data.registration_no);

                    $('#gov_attachment_npb_temp').val(data.attachment);
                    $('#gov_attachment_npb').html('<a href="#" onclick="popWindow(\'' + data.attachment + '\'); return false;"><label>attachment</label></a>');


                    if ($('#comp_commodity_name_npb').text() === $('#gov_commodity_name_npb').text()) {
                        $('#gov_commodity_name_npb_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_commodity_name_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }


                    if ($('#comp_brand_npb').text() === $('#gov_brand_npb').text()) {
                        $('#gov_brand_npb_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_brand_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }


                    if ($('#comp_product_type_npb').text() === $('#gov_product_type_npb').text()) {
                        $('#gov_product_type_npb_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_product_type_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                    if ($('#comp_registration_date_npb').text() === $('#gov_registration_date_npb').text()) {
                        $('#gov_registration_date_npb_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_registration_date_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                    if ($('#comp_expiration_date_npb').text() === $('#gov_expiration_date_npb').text()) {
                        $('#gov_expiration_date_npb_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_expiration_date_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                    if ($('#comp_registration_no_npb').text() === $('#gov_registration_no_npb').text()) {
                        $('#gov_registration_no_npb_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_registration_no_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                    if ($('#comp_attachment_npb').text() === $('#gov_attachment_npb').text()) {
                        $('#gov_attachment_npb_check').html('<i class="fa fa-check txt-color-green"></i>');
                    } else {
                        $('#gov_attachment_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
                    }

                }
            });
        } else {


            $('#gov_commodity_name_npb_temp').val('');
            $('#gov_commodity_name_npb').text('');
            $('#gov_brand_npb_temp').val('');
            $('#gov_brand_npb').text('');
            $('#gov_product_type_npb_temp').val('');
            $('#gov_product_type_npb').text('');
            $('#gov_registration_date_npb_temp').val('');
            $('#gov_registration_date_npb').text('');
            $('#gov_expiration_date_npb_temp').val('');
            $('#gov_expiration_date_npb').text('');
            $('#gov_registration_no_npb_temp').val('');
            $('#gov_registration_no_npb').text('');

            $('#gov_attachment_npb_temp').val('');
            $('#gov_attachment_npb').html('');


            $('#gov_commodity_name_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_brand_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_product_type_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_registration_date_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_expiration_date_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_registration_no_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');
            $('#gov_attachment_npb_check').html('<i class="fa fa-remove txt-color-red"></i>');

        }
    }

    function popWindow(attachment) {
//alert(attachment);
        PopUpWindow('<?php echo $file; ?>' + attachment + '', 'mywindow', 800, 600, 'yes', 'yes');
    }

</script>