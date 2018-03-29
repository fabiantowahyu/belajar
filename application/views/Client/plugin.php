<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

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

<!-- ace -->
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/js/ace/ace.min.css">
<script src="<?php echo ASSETS_URL; ?>/js/ace/ace-elements.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/ace.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/jquery.gritter.min.js"></script>


<!-- chzn select -->
<script src="<?php echo ASSETS_URL; ?>/js/chzn/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/js/chzn/chosen.css">
<script src="<?php echo ASSETS_URL; ?>/js/chzn/jquery.validate.min.js"></script>

<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function() {

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
        var responsiveHelper_dt_address = undefined;
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet : 1024,
            phone : 480
        };

        $('#dt_basic').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth" : true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback" : function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                }
            },
            "rowCallback" : function(nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback" : function(oSettings) {
                responsiveHelper_dt_basic.respond();
            }
        });

        $('#dt_address').dataTable({
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
            "t"+
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
            "autoWidth" : true,
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
            },
            "preDrawCallback" : function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_address) {
                    responsiveHelper_dt_address = new ResponsiveDatatablesHelper($('#dt_address'), breakpointDefinition);
                }
            },
            "rowCallback" : function(nRow) {
                responsiveHelper_dt_address.createExpandIcon(nRow);
            },
            "drawCallback" : function(oSettings) {
                responsiveHelper_dt_address.respond();
            }
        });

        /* END BASIC */

        // custom toolbar
        $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

        // Apply the filter
        $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {

            otable
                .column( $(this).parent().index()+':visible' )
                .search( this.value )
                .draw();

        } );
        /* END COLUMN FILTER */   

        //attributeForm
        $('#validation-form').bootstrapValidator();
        // end attributeForm


        // Dialog Delete
        $('#cdelete').click(function() {
            $('#dialog_simple').dialog('open');
            return false;
        });

        $('#dialog_simple').dialog({
            autoOpen : false,
            width : 600,
            resizable : false,
            modal : true,
            title : "<div class='widget-header'><h4><i class='fa fa-warning'></i> Empty the recycle bin?</h4></div>",
            buttons : [{
                html : "<i class='fa fa-trash-o'></i>&nbsp; Delete all items",
                "class" : "btn btn-danger",
                click : function() {
                    $(this).dialog("close");
                }
            }, {
                html : "<i class='fa fa-times'></i>&nbsp; Cancel",
                "class" : "btn btn-default",
                click : function() {
                    $(this).dialog("close");
                }
            }]
        });
        //End Dialog Delete

        $(function() {
        $('#notification_error').hide();
            $(".chzn-select").chosen(); 
            
            //$("#upload_form").bootstrapValidator();
            var $validator =  $("#upload_form").validate({
            // Rules for form validation
            /*errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: false,*/
            rules : {
                
                npwp_upload : {
                    required : true
                },
                tdp : {
                    required : true
                },
                siup : {
                    required : true
                },
                situ : {
                    required : true
                },
                pkp : {
                    required : true
                },
                iupop : {
                    required : true
                },
                iukop : {
                    required : true
                },
                pkp2b : {
                    required : true
                },
                iupopkpm : {
                    required : true
                },et : {
                    required : true
                },
                
                
            },

            // Messages for form validation
            messages : {
                
                npwp_upload : {
                    required : 'Please upload your APP'
                },
            },

            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            $('#notification_error').show();
    },
            unhighlight: function (element) {
                $(element).closest('.test').removeClass('has-error').addClass('has-success');
                $('#notification_error').hide();
            },
            errorElement: 'span',
            errorClass: 'text-danger',

            /*      errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
	    */
        });

        });
        

        $.mask.definitions['~']='[+-]';
        $('.input-mask-phone').mask('(999) 9999999');
        $('.input-mask-phone').mask('(999) 9999999').val('<?php echo @$phone; ?>');
        $('.input-mask-fax').mask('(999) 9999999');
        $('.input-mask-fax').mask('(999) 9999999').val('<?php echo @$fax; ?>');
        $('.input-mask-kdpos').mask('(999) 9999999');
        $('.input-mask-kdpos').mask('99999').val('<?php echo @$postal_code; ?>');

        var last_gritter;

        $("#Parent").change(function() {
            var parent_id = $('#Parent').val();
            $.post('<?php echo @$url_tid; ?>',{parent_id:parent_id},function(result){
                if (result.success){
                    document.getElementById('OrderNumber').value = result.tid;
                } else {
                    alert(result.msg);
                }
            },'json');
        });


 $('#id-input-file-1').ace_file_input({
        no_file: 'Nomer Pokok Wajib Pajak *',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-x').ace_file_input({
        no_file: 'Nomer Pokok Wajib Pajak *',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-2').ace_file_input({
        no_file: 'Tanda Daftar Perusahaan *',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-3').ace_file_input({
        no_file: 'Surat Izin Usaha Perdagangan *',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-4').ace_file_input({
        no_file: 'Surat Izin Tempat Usaha*',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-5').ace_file_input({
        no_file: 'Penghasilan Kena Pajak*',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-6').ace_file_input({
        no_file: 'Izin Usaha Pertambangan (Operasi Produksi)*',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-7').ace_file_input({
        no_file: 'Nomor Pendaftaran Barang (NRP)*',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-8').ace_file_input({
        no_file: 'Perjanjian Karya Pengusahaan Pertambangan Batubara*',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-9').ace_file_input({
        no_file: 'IUPOPKPM*',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });
     $('#id-input-file-10').ace_file_input({
        no_file: 'Exporter Terdaftar*',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: false,
        onchange: null,
        thumbnail: false,
        whitelist: 'pdf',
        blacklist: 'exe|php'
                //onchange:''
                //
    });

 $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
            var scrollHeight = $(document).scrollTop();
            var id = $(e.target).attr("href").substr(1);
            window.location.hash = id;
            $(window).scrollTop(scrollHeight);
        });
        var hash = window.location.hash;
        $('#myTab a[href="' + hash + '"]').tab('show');
    })

     $("#validate").validate({
            // Rules for form validation
            errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: false,
            rules : {
                country : {
                    required : true
                },
                province : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                country : {
                    required : 'Please Choose your Country'
                },
                province : {
                    required : 'Please Choose your Province'
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   
                //$('.alert-error', $('.login-form')).show();
            },

            highlight: function (e) {
                $(e).closest('.form-group').removeClass('has-success').addClass('has-error');
            },

            success: function (e) {
                $(e).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(e).remove();
            },

            submitHandler: function (form) {
                form.submit();
            },
            invalidHandler: function (form) {
            }
        });

    function cekCountryRegion(){
        $('#itemRow').html('');
        
        var country_code = $('#country').val();

        var urlCekData = "<?php echo base_url(); ?>client/cek_country_region";


        $.ajax({
            url: urlCekData,
            type: 'post',
            data: {
                country_code : country_code
            },
            success: function (data) {
                var json = JSON.parse(data);
                
                
                $.each(json.result, function (i, val) {
                    
                   // alert(val.country_code);
                  //  alert(val.province_name);
                 //   die();
            
                    $('#itemRow').append(
                        '<select name="province[' + i + ']" class="form-control" id="province' + i + '" style="width:335px;margin-top:5px"></select>'
                    );
                            
                    $.get("<?php echo base_url(); ?>client/get_province/"+val.country_code, function (data) {
                        var parse = JSON.parse(data);
                        var result = parse.result;

                        $.each(result, function (j, val) {
                            $("#province" + i).append('<option value="' + this.province_code + '">' + this.province_name + '</option>');
                        });

                    });

                });

            }

        });
    }

</script>