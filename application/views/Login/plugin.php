<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!--page specific plugin scripts-->

<!-- wizard script -->
<script src="<?php echo base_url();?>themes/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>themes/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script src="<?php echo base_url();?>themes/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>


<!-- ace -->
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/js/ace/ace.min.css">
<script src="<?php echo ASSETS_URL; ?>/js/ace/ace-elements.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/ace.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/ace/jquery.gritter.min.js"></script>

<!-- Choosen -->
<script src="<?php echo ASSETS_URL; ?>/js/chzn/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/js/chzn/chosen.css">
<script src="<?php echo ASSETS_URL; ?>/js/chzn/jquery.validate.min.js"></script>

<!--inline scripts related to this page-->

<style>
    div.form-bootstrapWizard {
        pointer-events: none;
    }

    .smart-form *, .smart-form *::after, .smart-form *::before {
        margin: 1;
        padding: 1;
        box-sizing: content-box;
        -moz-box-sizing: content-box;
    }

</style>

<script type="text/javascript">
    //runAllForms();

    $(function() {
        // Validation
        $("#login-form").validate({
            // Rules for form validation
            errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: false,
            rules : {
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true,
                    minlength : 3,
                    maxlength : 20
                }
            },

            // Messages for form validation
            messages : {
                email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                password : {
                    required : 'Please enter your password'
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

        $("#forgot-password-form").validate({
            // Rules for form validation
            errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: false,
            rules : {
                forgot_email : {
                    required : true,
                    email : true
                }
            },
            // Messages for form validation
            messages : {
                forgot_email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
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

        var $validator =  $("#wizard-1").validate({
            // Rules for form validation
            /*errorElement: 'span',
            errorClass: 'text-danger',
            focusInvalid: false,*/
            rules : {
                name : {
                    required : true
                },
                email : {
                    required : true,
                    email : true
                },
                "nrp_commodity[]" : { 
                    required : true
                },
                "nrp_registration_no[]" : { 
                    required : true
                },
                "nrp_registration_date[]" : { 
                    required : true
                },
		"nrp_expiration_date[]" : { 
                    required : true
                },
                "nrp_brand[]" : {
                    required : true
                },
                "nrp_product[]" : {
                    required : true
                },
                "npb_registration_no[]" : { 
                    required : true
                },
                "npb_registration_date[]" : { 
                    required : true
                },
		"npb_expiration_date[]" : { 
                    required : true
                },
                "npb_commodity" : { 
                    required : true
                },
                "npb_brand[]" : {
                    required : true
                },
                "npb_product[]" : {
                    required : true
                },
                address : {
                    required : true
                },
                phone : {
                    required : true,
                    number : true,
                    minlength : 5,
                    maxlength : 15
                },


                "nrp_file_upload[]" : {
                    required : true
                },
                "npb_file_upload[]" : {
                    required : true
                },
                APP : {
                    required : true
                },
                TDI : {
                    required : true
                },
                NPWP : {
                    required : true
                },
                SM : {
                    required : true
                },
                username_create_account : {
                    required : true
                },
                email_create_account : {
                    required : true,
                    email : true
                },
                password_create_account : {
                    required : true,
                    minlength : 3,
                    maxlength : 20
                },
                passwordConfirm : {
                    required : true,
                    minlength : 3,
                    maxlength : 20,
                    equalTo : '#passwordNew'
                },
                terms : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                name : {
                    required : 'Please enter your domestic name'
                },
                email : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                nrp_commodity : {
                    required : 'Please choose your commodity'
                },
                nrp_registration_no : {
                    required : 'Please input registration number'
                },
                nrp_registration_date : {
                    required : 'Please input registration date'
                },
		nrp_expiration_date : {
                    required : 'Please input registration date'
                },
                nrp_brand : {
                    required : 'Please enter your brand'
                },
                nrp_product : {
                    required : 'Please enter your product type'
                },
                npb_registration_no : {
                    required : 'Please input registration no'
                },
                npb_registration_date : {
                    required : 'Please registration date'
                },
		npb_expiration_date : {
                    required : 'Please registration date'
                },
                npb_commodity : {
                    required : 'Please choose your commodity'
                },
                npb_brand : {
                    required : 'Please enter your brand'
                },
                npb_product : {
                    required : 'Please enter your product type'
                },
                address : {
                    required : 'Please enter your address'
                },
                phone : {
                    required : 'Please enter your mobile phone',
                    number : 'Please enter valid number',
                    minlength : 'Please enter at least 5 digits',
                    maxlength : 'Please enter no more than 15 digits'
                },


                nrp_file_upload : {
                    required : 'Please upload your NRP'
                },
                npb_file_upload : {
                    required : 'Please upload your NPB'
                },
                APP : {
                    required : 'Please upload your APP'
                },
                TDI : {
                    required : 'Please upload your TDI'
                },
                NPWP : {
                    required : 'Please upload your NPWP'
                },
                SM : {
                    required : 'Please upload your SM'
                },
                username_create_account : {
                    required : 'Please enter your username'
                },
                email_create_account : {
                    required : 'Please enter your email address',
                    email : 'Please enter a VALID email address'
                },
                password_create_account : {
                    required : 'Please enter your password'
                },
                passwordConfirm : {
                    required : 'Please enter your password one more time',
                    equalTo : 'Please enter the same password as above'
                },
                terms : {
                    required : 'You must agree with Terms and Conditions'
                }
            },

            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
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


        $('#bootstrap-wizard-1').bootstrapWizard({
            'tabClass': 'form-wizard',
            'onNext': function (tab, navigation, index) {
                var $valid = $("#wizard-1").valid();
                if (!$valid) {
                    $validator.focusInvalid();
                    return false;
                } else {
                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
                        'complete');
                    $('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
                        .html('<i class="fa fa-check"></i>');
                }
		if(index===3){
		    $('.next').hide();
		    }else{
			$('.next').show();
		    }
		   
            },'onPrevious': function (tab, navigation, index) {
               $('.next').show();
            },
		
        });

        $(function() {
            $(".chzn-select").chosen({width: "500px"}); 
            $('#modal-form').on('show', function () {
                $(this).find('.chzn-container').each(function () {
                    $(this).find('a:first-child').css('width', '200px');
                    $(this).find('.chzn-drop').css('width', '210px');
                    $(this).find('.chzn-search input').css('width', '250px');
                });
            });
        });

    });
</script>

<script>
    $(document).ready(function(){
        // Model i agree button
        $("#i-agree").click(function(){
            $this=$("#terms");
            if($this.checked) {
                $('#myModal').modal('toggle');
            } else {
                $this.prop('checked', true);
                $('#myModal').modal('toggle');
            }
        });

        /* Attachment Validation */
        $("#check").click(function(){
            var fileName1 = $("#id-input-file-1").val();
            var fileName2 = $("#id-input-file-2").val();
            var fileName3 = $("#id-input-file-3").val();
            var fileName4 = $("#id-input-file-4").val();
            var fileName5 = $("#id-input-file-5").val();
            var fileName6 = $("#id-input-file-6").val();
            var fileName7 = $("#id-input-file-7").val();

            if(fileName1 === '' || fileName2 === '' || fileName3 === '' || fileName4 === '' || fileName5 === '' || fileName7 === ''){
                $('#message').html("<strong>Please Attach File (*.pdf) </strong>"); $('#message').show();
                $('#message1,#message2,#message3,#message4,#message5,#message6,#message7').show();
            }
        });

        $("#check2").click(function(){
            $('#message,#message1,#message2,#message3,#message4,#message5,#message6,#message7').hide();
        });

        $('#id-input-file-1').ace_file_input({
            no_file:'Nomor Registrasi Product (NRP)*',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:true,
            onchange:null,
            thumbnail:false, //| true | large
            whitelist:'pdf',
            blacklist:'exe|php'
            //onchange:''
            //
        });

        $('#id-input-file-2').ace_file_input({
            no_file:'Akta Pendirian Perusahaan*',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false, //| true | large
            whitelist:'pdf',
            blacklist:'exe|php'
            //onchange:''
            //
        });
        $('#id-input-file-3').ace_file_input({
            no_file:'IUI / TDI*',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false,
            whitelist:'pdf',
            blacklist:'exe|php'
            //onchange:''
            //
        });
        $('#id-input-file-4').ace_file_input({
            no_file:'NPWP*',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false,
            whitelist:'pdf',
            blacklist:'exe|php'
            //onchange:''
            //
        });
        $('#id-input-file-5').ace_file_input({
            no_file:'Sertifikat Merek*',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false,
            whitelist:'pdf',
            blacklist:'exe|php'
            //onchange:''
            //
        });
        $('#id-input-file-6').ace_file_input({
            no_file:'Perjanjian Lisensi Merek',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false,
            whitelist:'pdf',
            blacklist:'exe|php'
            //onchange:''
            //
        });
        $('#id-input-file-7').ace_file_input({
            no_file:'Nomor Pendaftaran Barang (NPB)*',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:false,
            onchange:null,
            thumbnail:false,
            whitelist:'pdf',
            blacklist:'exe|php'
            //onchange:''
            //
        });
        /* --------------------- */

        /* View Validation */
        $('#login-view').show();
        $('#forgot-pass, #sign-in, #import , #all , #NPB').hide();
        $('#create-new-account').hide();
        $("#goods").change(function() {
            var type = this.value;
            //alert(type);
            if(type==="G001"){

                $("#NPB").hide(); $(' #NRP').fadeIn();
            }else if(type==='G002'){

                $(" #NRP").hide(); $('#NPB').fadeIn();
            }else{
                $('#NPB, #NRP').fadeIn();
            }
        });

        $("#view1").click(function() {
            $('#login-view').hide(); $('#forgot-pass').fadeIn();
        });
        $("#view2").click(function() {
            $('#login-view').fadeIn(); $('#forgot-pass').hide();
        });
        $("#view-create").click(function() {
            $('#sign-in').fadeIn(); $('#create-account').hide(); $('#create-new-account').fadeIn(); $('#login-view').hide(); $('#forgot-pass').hide(); 
            $("#left_view").removeClass();
            $("#left_view").addClass('col-xs-12 col-sm-12 col-md-7 col-lg-6 hidden-xs hidden-sm');
            $("#right_view").removeClass();
            $("#right_view").addClass('col-xs-12 col-sm-12 col-md-5 col-lg-6');
        });
        $("#view-sign").click(function() {
            $('#sign-in').hide(); $('#create-account').fadeIn(); $('#create-new-account').hide(); $('#login-view').fadeIn(); $("#left_view").removeClass();
            $("#left_view").addClass('col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm');
            $("#right_view").removeClass();
            $("#right_view").addClass('col-xs-12 col-sm-12 col-md-5 col-lg-4');
        });

        /* ------------------- */
    });

    $("#datepicker").datepicker({
			    defaultDate: "+1w",
			    changeMonth: true,
			    numberOfMonths: 3,
			    prevText: '<i class="fa fa-chevron-left"></i>',
			    nextText: '<i class="fa fa-chevron-right"></i>',
			    onClose: function (selectedDate) {
			        $("#to").datepicker("option", "maxDate", selectedDate);
			    }
		
			});
 $(document).ready(function() {
    $('#terms').change(function () {
        //alert("asd");
        $('#terms + span').remove();
    });
});                 // $('#terms + p').remove();
</script>
