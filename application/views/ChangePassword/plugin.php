<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!--page specific plugin scripts-->

<script src="<?php echo base_url();?>themes/js/jquery.validate.min.js"></script>

<!--inline scripts related to this page-->

<script type="text/javascript">
	$(function() {
		
		$('#validation-form').validate({
			errorElement: 'span',
			errorClass: 'text-danger',
			focusInvalid: false,
			rules: {
				password_new: {
					required: true,
					minlength: 5
				},
				password_re: {
					required: true,
					minlength: 5,
					equalTo: "#NewPassword"
				},
				password: {
					required: true,
					minlength: 5
				}
			},
	
			messages: {
				password_new: {
					required: "Please specify a password.",
					minlength: "Please specify a secure password."
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
		
	})
</script>