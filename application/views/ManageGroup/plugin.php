<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<!--page specific plugin scripts-->

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrapvalidator/bootstrapValidator.min.js"></script>


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
})

	function ChangeValue(intWhichOne) {
		var frmShr = document.myForm;
		var arrNonMember = new Array(frmShr.selNonMember.options.length);
		var arrIsMember = new Array(frmShr.selMember.options.length);
		var arrMember = new Array();
		var arrNon = new Array();
		var lstNon = frmShr.selNonMember;
		var lstMem = frmShr.selMember;
		var intSelected = 0;
		var intSelectedMem = 0;

		for(i=0;i<lstNon.options.length;i++){
			arrNon[i] = new CreateStruct(lstNon.options[i].selected,lstNon.options[i].text,lstNon.options[i].value);
			arrNonMember[i] = new CreateStruct(lstNon.options[i].selected,lstNon.options[i].text,lstNon.options[i].value);

			if(lstNon.options[i].selected){
				intSelected++;
			}
		}

		for(i=0;i<lstMem.options.length;i++){
			arrMember[i] = new CreateStruct(lstMem.options[i].selected,lstMem.options[i].text,lstMem.options[i].value);
			arrIsMember[i] = new CreateStruct(lstMem.options[i].selected,lstMem.options[i].text,lstMem.options[i].value);

			if(lstMem.options[i].selected){
				intSelectedMem++;
			}		

		}

		if(navigator.appName == "Microsoft Internet Explorer"){
			frmShr.reset(); 
		}	

		for(i=0;i<lstNon.options.length;i++){
			lstNon.options[i].selected = arrNonMember[i].IsSelect;
		}
		for(i=0;i<lstMem.options.length;i++){
			lstMem.options[i].selected = arrMember[i].IsSelect;
		}	
		if (intWhichOne == 2){
			var intMemLen = lstMem.options.length;
			lstMem.options.length += intSelected;
			for(i=0;i<lstNon.options.length;i++){
				if(lstNon.options[i].selected){
					if (!CheckExist(arrMember,lstNon.options[i].value)){
						lstMem.options[intMemLen].text = arrNonMember[i].selText;
						
						lstMem.options[intMemLen].value = arrNonMember[i].selValue;
						intMemLen++;
					}else{
						lstMem.options.length--;
					}
				}
			}

			var arrDeleteMem = new Array();
			var intItem = 0;
			var intLength = lstNon.options.length;
			for(i=0;i<lstNon.options.length;i++){
				if(!arrNon[i].IsSelect){
					arrDeleteMem[intItem] = new CreateStruct(false,arrNon[i].selText,arrNon[i].selValue)
					intItem++;
				}
			}
			for(i=intLength;i>=intItem;i--){
				lstNon.options.length = i;
				if(navigator.appName == "Microsoft Internet Explorer"){
					frmShr.reset(); 
				}				
			}
							
			if(intItem > 0){
				for(i=0;i<intItem;i++){
					lstNon.options[i].text = arrDeleteMem[i].selText;
					lstNon.options[i].value = arrDeleteMem[i].selValue;		
				}
			}
		}else if (intWhichOne == 3){
			var intNonLen = lstNon.options.length;
			lstNon.options.length += intSelectedMem;
			for(i=0;i<lstMem.options.length;i++){
				if(lstMem.options[i].selected){
					if (!CheckExist(arrNon,lstMem.options[i].value)){
						lstNon.options[intNonLen].text = arrIsMember[i].selText;
						lstNon.options[intNonLen].value = arrIsMember[i].selValue;
						intNonLen++;
					}else{
						lstNon.options.length--;
					}
				}
			}
		
			var arrDeleteMem = new Array();
			var intItem = 0;
			var intLength = lstMem.options.length;
			for(i=0;i<lstMem.options.length;i++){
				if(!arrMember[i].IsSelect){
					arrDeleteMem[intItem] = new CreateStruct(false,arrMember[i].selText,arrMember[i].selValue)
					intItem++;
				}
			}
			for(i=intLength;i>=intItem;i--){
				lstMem.options.length = i;
				if(navigator.appName == "Microsoft Internet Explorer"){
					frmShr.reset(); 
				}				
			}		
			if(intItem > 0){
				for(i=0;i<intItem;i++){
					lstMem.options[i].text = arrDeleteMem[i].selText;
					lstMem.options[i].value = arrDeleteMem[i].selValue;		
				}
			}
		}
		return true;
	}
	
	function CreateStruct(IsSelect,selText,selValue) {
		this.IsSelect = IsSelect;
		this.selText = selText;
		this.selValue = selValue;
	}
	
	function CheckExist(arrayName,value) {
		for (var i = 0; i < arrayName.length; i++) { 
		   var obj = arrayName[i]; 
			for (var key in obj) {          
				if (obj[key] == value) { 
					return true;
				} 
			} 
		}

		return false;
	}
	
	function SelectAll_Member() {
		var frmMember = document.myForm;
		var lstMem = frmMember.selMember;
		var arrMember = new Array();
		
		for(i=0;i<lstMem.options.length;i++){
			arrMember[i] = lstMem.options[i].value;	

		}
		
		frmMember.selMember_value.value = arrMember.join(',');
		return true;
	}
</script>