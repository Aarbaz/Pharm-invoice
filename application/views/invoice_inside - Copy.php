<div class="container-fluid" id="bg-color"><br /></div>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo ucwords($username).', ';?><small><?php echo  date('d F, Y');?></small><span class="text-sm pull-right"><a href="<?php echo site_url('Invoice/logout');?>">Log Out</a></span>
                    </h4>
                </div>
				
				<div class="panel-body">	
					<div class="challan-div">			     
						<form id="insider_invoice_form" name="insider_invoice_form" class="form-horizontal" action="<?php echo site_url('Invoice/add_insider_invoice');?>" method="post">
							<div class="form-group">						
								<h3 class="text-center">TAX INVOICE</h3>
							</div>
							<div class="col-sm-5 leftbox">
								<div class="form-group">
									<label class="control-label col-sm-3">To</label>
									<div class="col-sm-9">
	  									<select name="customerName" id="customerName" class="form-control">
	  										<option value="" selected="selected">--select customer--</option>
                                            <?php foreach ($custList->result() as $row){
                                                echo '<option value="'.$row->id.'" '.set_select('customerName',$row->id).'>'.$row->bakery_name.'</option>';
                                            } ?>
	  									</select>									
							   		</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3">Address</label>
									<div class="col-sm-9" id="addds_holder">
                                        <input type="text" name="cust_adds_txt" id="cust_adds_txt" class="form-control" value="<?php echo set_value('cust_adds_txt');?>" readonly="readonly">
                                        <input type="hidden" name="cust_adds" value="" id="cust_adds">
                                        <input type="hidden" name="cust_name" value="" id="cust_name">         
                                    </div>
								</div>	
								<div class="form-group">
									<label class="control-label col-sm-3">Buyer's GST</label>
									<div class="col-sm-9">
                                        <input type="text" name="cust_gst_txt" id="cust_gst_txt" class="form-control" value="<?php echo set_value('cust_gst_txt');?>" readonly="readonly">
                                        <input type="hidden" name="cust_gst" value="" id="cust_gst">
							   		</div>
								</div> 
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Select Region</label>
                                    <div class="col-sm-9">
                                        <select id="region" name="region" class="form-control">
                                            <option value="">--select--</option>
                                            <option value="in" <?php echo set_select('region','in');?>>In Maharashtra</option>
                                            <option value="out" <?php echo set_select('region','out');?>>Out of Maharashtra</option>
                                        </select>
                                    </div>
                                </div>   
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Invoice Type</label>
                                    <div class="col-sm-9">
                                        <select id="amount_with" name="amount_with" class="form-control">
                                            <option value="">--select--</option>
                                            <option value="with" <?php echo set_select('amount_with','with');?>>With Tax</option>
                                            <option value="without" <?php echo set_select('amount_with','without');?>>Without Tax</option>
                                        </select>
                                    </div>
                                </div>                                                                                             
							</div>
							<div class="col-sm-1">&nbsp;</div>
							<div class="col-sm-6 leftbox">
								<div class="form-group">
									<label class="control-label col-sm-4">INVOICE NO.</label>
									<div class="col-sm-6">&nbsp;&nbsp;&nbsp;
                                        <?php

                                        $invoice_no = '';                
                                        if(!empty($last_invoice->invoice_no))
                                        {
                                            $db_invoice = $last_invoice->invoice_no;
                                            $num_part = substr($db_invoice, 3);
                                            $add_one = intval($num_part)+1;

                                            if(strlen($add_one) < 3)
                                            {
                                                $ch_no = sprintf("%03u", $add_one);
                                                $invoice_no = 'INV'.$ch_no;
                                            }
                                            else
                                            {
                                                $invoice_no = 'INV'.$add_one;
                                            }
                                        }
                                        else
                                        {                    
                                            $invoice_no = 'INV001';
                                        }                    

                                        ?>       
                                        <label><?php echo $invoice_no;?><input type="hidden" name="invoice_no" value="<?php echo $invoice_no; ?>"></label>                           
                                    </div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">INVOICE DATE</label>
									<div class="col-sm-6">&nbsp;&nbsp;&nbsp;<?php echo date('d/m/Y');?></div>
								</div>	
								<div class="form-group">
									<label class="control-label col-sm-4">DATE OF SUPPLY</label>
									<div class="col-sm-8">&nbsp;&nbsp;
									<?php echo date('d/m/Y');?>
									<input type="hidden" name="sup_date" class="form-control">
									</div>
								</div>	
								<div class="form-group">
									<label class="control-label col-sm-4">PLACE OF SUPPLY</label>
									<div class="col-sm-8">
										<input type="text" name="sup_place" value="<?php echo set_value('sup_place');?>" class="form-control">
									</div>
								</div>	
								<div class="form-group">
									<label class="control-label col-sm-4">OTHER</label>
									<div class="col-sm-8"><input type="text" name="sup_other" value="<?php echo set_value('sup_other');?>" class="form-control">
									</div>
								</div>																																								
							</div>
                            <div class="col-sm-12">&nbsp;</div>
                            <div class="form-group"><br />
                              <div class="col-sm-8 col-sm-offset-2">
                                <?php echo validation_errors('<p class="text text-danger">', '</p>'); ?>
                              </div>
                            </div>

                            <div class="form-group"><br />
                                <div class="col-sm-8 col-sm-offset-2">                
                                    <?php
                                    if($this->session->flashdata('pass'))
                                    {
                                      echo '<div class="alert alert-success alert-block successMsg"> ';
                                      echo $this->session->flashdata('pass');
                                      echo '</div>';
                                    }
                                    else if($this->session->flashdata('fail'))
                                    {
                                      echo '<div class = "alert alert-warning successMsg">';
                                      echo $this->session->flashdata('fail');
                                      echo '</div>';
                                    }
                                  ?>
                                </div>
                            </div>                             
							<div class="form-group" id="table_with_tax">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>                                            
                                            <th>PRODUCT</th>
                                            <th>HSN</th>
                                            <th>QNTY @kg</th>
                                            <th>AMOUNT WITH TAX</th>
                                            <th>RATE</th>
                                            <th>AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row_one">
                                            <td>
                                                <select name="items[]" id="items" class="form-control">
                                                    <option value="">--select product--</option>
                                                    <?php foreach ($productList->result() as $row){ 
                                                    echo '<option value="'.$row->product_name.'" '. set_select("items[]", $row->product_name).'>'.$row->product_name.'</option>';
                                                    } ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="hsn[]" class="hsn form-control" size="3" maxlength="7" value="1901"></td>
                                            <td><input type="text" name="qnty[]" class="qnty form-control" size="3" maxlength="7"></td>
                                            <td><input type="text" name="amount_with_tax[]" class="amount_with_tax only_num form-control" size="3" maxlength="7"></td>                      
                                            <td><input type="text" name="rate[]" class="rate form-control" size="3" maxlength="7"></td>
                                            <td>
                                                <input type="text" name="amount[]" class="amount form-control" style="width: 40%; display: inline;" value="" size="3" readonly="readonly">&nbsp;
                                                <button type="button" name="add_more" id="add_more" class="add_more btn btn-success btn-sm"><b>+</b></button>&nbsp;
                                                <button type="button" name="remove" id="remove" class="btn btn-warning btn-sm remove"><b>X</b></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--table withouot tax-->
                            <div class="form-group" id="table_without_tax">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>                                            
                                            <th>PRODUCT</th>
                                            <th>HSN</th>
                                            <th>QNTY @kg</th>                                            
                                            <th>RATE</th>
                                            <th>AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row_one">
                                            <td>
                                                <select name="items[]" id="items" class="form-control">
                                                    <option value="">--select product--</option>
                                                    <?php foreach ($productList->result() as $row){ 
                                                    echo '<option value="'.$row->product_name.'" '. set_select("items[]", $row->product_name).'>'.$row->product_name.'</option>';
                                                    } ?>
                                                </select>
                                            </td>
                                            <td><input type="text" name="hsn[]" class="hsn form-control" size="3" maxlength="7" value="1901"></td>
                                            <td><input type="text" name="qnty[]" class="qnty form-control" size="3" maxlength="7"></td>                                            
                                            <td><input type="text" name="rate[]" class="rate form-control" size="3" maxlength="7"></td>
                                            <td>
                                                <input type="text" name="amount[]" class="amount form-control" style=" width: 40%; display: inline;" value="" size="3" readonly="readonly">&nbsp;
                                                <button type="button" name="add_more" id="add_more" class="add_more btn btn-success btn-sm"><b>+</b></button>
                                                &nbsp;<button type="button" name="remove" id="remove" class="btn btn-warning btn-sm remove"><b>X</b></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                            <!--ends here-->
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <b>TRANSPORT CHARGES</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="trans_charge" class="form-control only_num" id="trans_charge" style="display: inline; width: 30%" value="" size="3">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <b>OTHER</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="other_charge" id="other_charge" class="only_num form-control" style="display: inline; width: 30%" value="" size="3">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <b>TOTAL TAXABLE VALUE</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="total_tax_value" class="form-control" id="total_tax_value" readonly="readonly" style="display: inline; width: 30%" value="" size="3">
                                </div>
                            </div>

                            <div class="form-group in_state">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <b>CGST @ 2.5%</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="cgst_charge" class="form-control" id="cgst_charge" readonly="readonly" style="display: inline; width: 30%" value="" size="3">
                                </div>
                            </div>

                            <div class="form-group in_state">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <b>SGST @ 2.5%</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="sgst_charge" id="sgst_charge" readonly="readonly" class="form-control" style="display: inline; width: 30%" value="" size="3">
                                </div>
                            </div>

                            <div class="form-group out_state">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <b>IGST @ 5%</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="igst_charge" id="igst_charge" readonly="readonly" class="form-control" style="display: inline; width: 30%" value="" size="3">
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <b>TOTAL AMOUNT</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="total_amount" id="total_amount" readonly="readonly" class="total form-control" style="display: inline; width: 30%" value="" size="3">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-6">
                                    <b>ROUND OFF TOTAL</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="total_round" id="total_round" readonly="readonly" class="form-control" style="display: inline; width: 30%" value="" size="3">
                                </div>
                            </div>                                                        
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <b>AMOUNT IN WORDS:</b>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="total_word" id="total_word" class="form-control" style="display: inline; width: 50%" value="" size="3">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">&nbsp;</div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-1">
                                    <b>This receipt should be signed by the person having the authority. No complaints will be entertained if the same are received after 24 hours of the delivery.</b>
                                </div>
                                <div class="col-sm-3">
                                    <p class="text-right">FOR <b>LABBAIK ENTERPRISES</b></p>
                                    <p class="text-right"><br />AUTHORISED SIGNATURE</p>
                                </div>
                                <div class="col-sm-2">&nbsp;</div>
                            </div>                              
                            <div class="form-group">
                              <div class="col-sm-6 col-sm-offset-3">
                                <button type="submit" name="add_challan" class="btn btn-primary">SAVE & PRINT</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="reset" name="reload" class="btn btn-primary">Reset</button>                    
                              </div>
                            </div>


						</form>
					</div>
				</div>

			 	<div class="panel-footer">
                    <p class="text-right">for Labbaik Bakery </p>
				</div>
    		</div>
    	</div>    		
	</div>
</div>
</div><!--close main div-->
<script src="<?php echo base_url('assets/js/to_words.js'); ?>"></script>
<script type="text/javascript">

$(document).ready(function(){
    //hide invoice data table on load
    $('#table_with_tax, #table_without_tax').hide();
    setTimeout(function(){
        $('.successMsg, .err_db').fadeIn().fadeOut().fadeIn().fadeOut('slow');
    }, 3000);    

    // add new row
    $(document).on('click', '.add_more', function(){        
        $(this).closest('tr').clone(true).find(':input:not(".hsn")').val('').end().insertAfter($(this).closest('tr'));
    }); 
    //Remove table row  
    $(document).on('click', '.remove', function(){
      var $tr = $(this).closest('tr');
      if ($tr.index() != '0') {
        $tr.remove();
      }
    }); 

    //show IGSC OR CGST and SGST
    $('#region').click(function(){
        var reg = $(this).val();
        if(reg != '')
        {
            if(reg == 'in')
            {
                $('.in_state').fadeIn('slow');
                $('.out_state').fadeOut('slow');
            }
            else
            {
                $('.out_state').fadeIn('slow');
                $('.in_state').fadeOut('slow');
            }
        }
    });   
    //add only NUMBER and .
    $('.only_num').on('keyup', function(){
        var val = $(this).val();
        if(isNaN(val))
        {
            val = val.replace(/[^0-9\.]/g,'');
            if(val.split('.').length>2) 
            val = val.replace(/\.+$/,"");       
        }
        $(this).val(val); 
    });

    //show customer address on customer name change event
    var cust_list = <?php echo json_encode($custList->result()); ?>;
    $("#customerName").on('change', function(){
        var cust_id = $("#customerName option:selected").val();

        for (var key = 0; key < cust_list.length; key++) 
        {
            if( cust_list[key].id == cust_id )
            {
                $("#cust_adds_txt").val(cust_list[key].bakery_address+'-'+cust_list[key].bakery_city);
                $("#cust_adds").val(cust_list[key].bakery_address+'-'+cust_list[key].bakery_city);
                $("#cust_name").val(cust_list[key].bakery_name);
                $("#cust_gst_txt").val(cust_list[key].bakery_gst);
                $("#cust_gst").val(cust_list[key].bakery_gst);
            }
        }
    });


    //show amount with TAX or without TAX and validation logic
    $('#amount_with').change(function(){
        var a_w_t = $(this).val();
        if(a_w_t != '')
        {
            if(a_w_t == 'with')
            {                
                $('#table_with_tax').show();  
                $('#table_without_tax').hide();
                //show AMOUNT by qnty*rate
                $('.amount, .rate').on('focus', function(){                    
                    var ro  = $(this).parents('tr');
                    var tot_amount = ro.find("input[name*= 'amount_with_tax']").val();
                    var qnty = ro.find(".qnty").val() ? ro.find(".qnty").val() : 1;
                    var amount = ((tot_amount*100)/105).toFixed(2);
                    var rate = (amount/qnty).toFixed(2);
                    ro.find('.amount').val(amount);        
                    ro.find("input[name*= 'rate']").val(rate);
                });   
                //show TOTAL AMOUNT by qnty*rate        
                var total = 0, total_in_word = 0;
                //total Amount before GST
                $('#total_tax_value').on('focus', function(){ 
                    total = 0;
                    $('.amount').each(function(){            
                        if( $(this).val() !== '' )
                        {
                            var amt = $(this).val();
                            total += parseFloat(amt);                
                        }   
                    });
                    var other_charge = $('#other_charge').val() != '' ? $('#other_charge').val() : 0;
                    var trans_charge = $('#trans_charge').val() != '' ? $('#trans_charge').val() : 0;        
                    total +=  parseFloat(other_charge) + parseFloat(trans_charge);        
                    $(this).val(total.toFixed(2));
                }); 
                // add CGST and SGST 5%
                $('#cgst_charge, #sgst_charge').on('focus', function(){
                    var tax = parseFloat( (total*2.5)/100 );
                    $(this).val(tax.toFixed(2));
                });
                $('#igst_charge').on('focus', function(){
                    var tax = parseFloat( (total*5)/100 );
                    $(this).val(tax.toFixed(2));
                });                
                //total with TAX
                $('#total_amount').on('focus', function(){
                    if( $('#cgst_charge').val()!= '' && $('#sgst_charge').val()!='')
                    {
                        var total_with_tax = parseFloat($('#total_tax_value').val()) + parseFloat($('#cgst_charge').val()) + parseFloat($('#sgst_charge').val()) ;
                        $(this).val(total_with_tax.toFixed(2)); 
                    } 
                    if( $('#igst_charge').val()!= '' )
                    {
                        var total_with_tax = parseFloat($('#total_tax_value').val()) + parseFloat($('#igst_charge').val()) ;
                        $(this).val(total_with_tax.toFixed(2)); 
                    }                                   
                });
                $('#total_round').on('focus', function(){ 
                    var rupee = Math.round( $('#total_amount').val() ); 
                    $(this).val(rupee);
                });      
                // amount in WORDS
                $("#total_word").on('focus', function(){
                    var tot = NumToWord($('#total_round').val());
                   $(this).val(tot);
                });
                $('.amount,.rate,#total_tax_value,#cgst_charge,#sgst_charge,#total_amount,#total_round,#total_word').val('');
            }
            else
            {
                $('#table_with_tax').hide();  
                $('#table_without_tax').show();
                 //show AMOUNT by qnty*rate
                $('.amount').on('focus', function(){                    
                    var ro  = $(this).parents('tr');
                    var qnty = ro.find('.qnty').val();
                    var rate = ro.find('.rate').val();
                    $(this).val(qnty*rate);        
                });
                //show TOTAL AMOUNT by qnty*rate  total_tax_value
                var total = 0, total_in_word = 0;
                //total Amount before GST
                $('#total_tax_value').on('focus', function(){ 
                    total = 0;
                    $('.amount').each(function(){            
                        if( $(this).val() !== '' )
                        {
                            var amt = $(this).val();
                            total += parseFloat(amt);                
                        }   
                    });
                    var other_charge = $('#other_charge').val() != '' ? $('#other_charge').val() : 0;
                    var trans_charge = $('#trans_charge').val() != '' ? $('#trans_charge').val() : 0;        
                    total +=  parseFloat(other_charge) + parseFloat(trans_charge);                    
                    $(this).val(total.toFixed(2));
                });
                // add CGST and SGST 2.5%
                $('#cgst_charge, #sgst_charge').on('focus', function(){
                    var tax = parseFloat( (total*2.5)/100 );
                    $(this).val(tax.toFixed(2));
                });
                $('#igst_charge').on('focus', function(){
                    var tax = parseFloat( (total*5)/100 );
                    $(this).val(tax.toFixed(2));
                });
                //total with TAX
                $('#total_amount').on('focus', function(){
                    if( $('#cgst_charge').val()!= '' && $('#sgst_charge').val()!='')
                    {
                        var total_with_tax = parseFloat($('#total_tax_value').val()) + parseFloat($('#cgst_charge').val()) + parseFloat($('#sgst_charge').val()) ;
                        $(this).val(total_with_tax.toFixed(2)); 
                    } 
                    if( $('#igst_charge').val()!= '' )
                    {
                        var total_with_tax = parseFloat($('#total_tax_value').val()) + parseFloat($('#igst_charge').val()) ;
                        $(this).val(total_with_tax.toFixed(2)); 
                    }                                   
                });
                $('#total_round').on('focus', function(){ 
                    var rupee = Math.round( $('#total_amount').val() );      
                    $(this).val(rupee);
                });    
                // amount in WORDS
                $("#total_word").on('focus', function(){
                    total_in_word = $('#total_round').val();
                    var total_words = NumToWord(total_in_word);
                   $(this).val(total_words);
                });               
            }
        }
    });         
})

</script>
</body>
</html>
