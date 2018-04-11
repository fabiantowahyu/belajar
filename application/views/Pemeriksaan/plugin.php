<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!--page specific plugin scripts-->
<!--<link href="<?php echo base_url(); ?>themes/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>themes/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo base_url(); ?>themes/js/plugins/dataTables/datatables.min.js"></script>

    
    <script src="<?php echo base_url(); ?>themes/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/plugins/pace/pace.min.js"></script>-->

<!--inline scripts related to this page-->

<script>


    $(document).ready(function () {
//	$('#dt_basic').DataTable({
//	    pageLength: 25,
//	    responsive: true,
//	    dom: '<"html5buttons"B>lTfgitp',
//	    buttons: [
//		{extend: 'copy'},
//		{extend: 'csv'},
//		{extend: 'excel', title: 'ExampleFile'},
//		{extend: 'pdf', title: 'ExampleFile'},
//
//		{extend: 'print',
//		    customize: function (win) {
//			$(win.document.body).addClass('white-bg');
//			$(win.document.body).css('font-size', '10px');
//
//			$(win.document.body).find('table')
//				.addClass('compact')
//				.css('font-size', 'inherit');
//		    }
//		}
//	    ]
//
//	});

		var last = $('#last_num').val();
                
             $('#btnAddRow').click(function () {
              $('#content_row').hide();   
            var last = $('#last_num').val();
            if (last == "") {
                var i = 0;
                var no = 1;
                $("#itemRow").empty();
            } else {
                var i = parseInt(last);
                var no = parseInt(last) + 1;
            }
            if (i == 0)
            {
                // $("#itemRow").empty();
            }

            $("#itemRow").append('<tr id="row' + i + '">' +
                    /*'<td>'+no+'</td>' +*/
                    '<td align="center" width="20%"><select name="barang[' + i + '][item]" class="form-control optionItem' + no + '" onChange="cekUom(this,' + i + ')"></select></td>' +
                    
                    '<td align="center" width="20%"><input type="text" class=" form-control input-small align-right" name="barang[' + i + '][unit_price]" id="unit_price_' + i + '"onchange="setNumber(' + i + ')" placeholder="Unit prices"/></td>' +
                    '<td align="center" width="10%"><input type="text" class=" form-control input-mini" name="barang[' + i + '][discount]" id="discount_' + i + '"onchange="setNumber_discount(' + i + ')"  placeholder="Discount" onkeypress="return isNumberKey(event)"/></td>' +
                    '<td align="center" width="10%"><input type="hidden" class="input-small" name="barang[' + i + '][total]" id="total_' + i + '" placeholder="Total"/> <input type="text" class="form-control align-right" id="total_temp_' + i + '" placeholder="Total" disabled/></td>' +
                    '<td><a class="btn btn-xs btn-danger" onclick="delRow(' + i + ')"><i class="fa fa-remove"></i></button></td>' +
                    '</tr>');

            $.get("../get_item_list_tindakan_lab", function (data) {
                var pointer = no - 1;
                var parse = JSON.parse(data);
                var result = parse.result;

                $(".optionItem" + pointer).append('<option value="">--Select Item--</option>');
                $.each(result, function (i, val) {
                    $(".optionItem" + pointer).append('<option value="' + this.id_tindakan_lab + '">'+ this.id_tindakan_lab + ' - '+ this.nama + '</option>');
                });
            });
//
//            $.get("get_ppn", function (data) {
//                var pointer = no - 1;
//                var parse = JSON.parse(data);
//                var result = parse.result;
//
//                $.each(result, function (i, val) {
//                    $(".optionTax" + pointer).append('<option value="' + this.ppn_code + '">' + this.ppn_name + '</option>');
//                });
//            });
//            $.get("get_uom", function (data) {
//                var pointer = no - 1;
//                var parse = JSON.parse(data);
//                var result = parse.result;
//
//                $.each(result, function (i, val) {
//                    $(".optionUOM" + pointer).append('<option value="' + this.id + '">' + this.name + '</option>');
//                });
//            });
            $("#delivery_date_" + i).datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            });
            no++;
            i++;
            $('#last_num').val(i);
        });

        var j = $('#last_num').val();
        var num = parseInt(j);
        $('#btnAddRowEdit').click(function () {
            var last = $('#last_num').val();
            if (last == "") {
                var j = 0;
                var num = 1;
                $("#itemRow").empty();
            } else {
                var j = parseInt(last);
                var num = parseInt(last) + 1;
            }
            console.log(j);
            $("#itemRow").append('<tr id="row' + j + '">' +
                    /*'<td>'+num+'</td>' +*/
                    '<td align="center"><select name="barang[' + j + '][item]" class="optionItem' + num + '" onChange="cekUom(this,' + j + ')"></select></td>' +
                    '<td align="center"><input type="text" class="input-mini" name="barang[' + j + '][qty]" id="qty_' + j + '" onkeyup="sumTotal(' + j + ')" placeholder="Quantity" onkeypress="return isNumberKey(event)"/></td>' +
                    '<td  align="center" width="10%"><select name="barang[' + j + '][uom]" class="optionUOM' + num + '" id="uom' + j + '" style="width:100px" ></select></td>' +
                    '<td align="center"><input type="text" class="input-small align-right" name="barang[' + j + '][unit_price]" id="unit_price_' + j + '" onchange="setNumber(' + j + ')" placeholder="Unit prices"/></td>' +
                    '<td align="center"><input type="text" class="input-mini" name="barang[' + j + '][discount]" id="discount_' + j + '"onchange="setNumber_discount(' + j + ')" placeholder="Discount" onkeypress="return isNumberKey(event)"/></td>' +
                    '<td align="center"><select name="barang[' + j + '][tax]" class="optionTax' + num + '" id="tax' + j + '" style="width:100px" onchange="setNumber_tax(' + j + ')"></select></td>' +
                    '<td align="center"><input type="hidden" class="input-small" name="barang[' + j + '][total]" id="total_' + j + '" placeholder="Total"/>  <input type="text" class="input-small align-right" id="total_temp_' + j + '" placeholder="Total" disabled/></td>' +
                    '<td align="center"><input type="hidden" class="input-small" name="barang[' + j + '][tax_amount]" id="tax_amount_' + j + '" placeholder="Tax Amount"/> <input type="text" class="input-small align-right" id="tax_amount_temp_' + j + '" placeholder="Tax Amount" disabled/></td>' +
                    '<td align="center"><input type="text" class="input-small" name="barang[' + j + '][delivery_date]" id="delivery_date_' + j + '" placeholder="Delivery Date"/></td>' +
                    '<td><a class="btn btn-mini btn-danger" onclick="delRow(' + j + ')"><i class="icon-remove"></i></button></td>' +
                    '</tr>');

            $.get("../get_item_list", function (data) {
                var pointer = num - 1;
                var parse = JSON.parse(data);
                var result = parse.result;
                $(".optionItem" + pointer).append('<option value="">--Select Item--</option>');
                $.each(result, function (i, val) {
                    $(".optionItem" + pointer).append('<option value="' + this.code + '">' + this.name + '</option>');
                });
            });

            $.get("../get_ppn", function (data) {
                var pointer = num - 1;
                var parse = JSON.parse(data);
                var result = parse.result;

                $.each(result, function (i, val) {
                    $(".optionTax" + pointer).append('<option value="' + this.ppn_code + '">' + this.ppn_name + '</option>');
                });
            });

            $.get("../get_uom", function (data) {
                var pointer = num - 1;
                var parse = JSON.parse(data);
                var result = parse.result;

                $.each(result, function (i, val) {
                    $(".optionUOM" + pointer).append('<option value="' + this.id + '">' + this.name + '</option>');
                });
            });

            $("#delivery_date_" + j).datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            });
            num++;
            j++;
            $('#last_num').val(j);
        });
   
                
             function delRow(j)
    {
        $("#row" + j).remove();
        calculate();
    }   
                
    });

</script>
