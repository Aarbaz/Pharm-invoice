<div class="container-fluid" id="bg-color"><br /></div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4><?php echo ucwords($username).', ';?><small><?php echo  date('d F, Y');?></small><span class="text-sm pull-right"><a href="<?php echo site_url('Product/logout');?>">Log Out</a></span></h4>
        </div>
        
        <div class="panel-body">
          <p data-placement="top" data-toggle="tooltip">
            <a class="btn btn-info btn-sm" href="<?php echo base_url('/index.php/Product/');?>">Go back to Product list</a>
          </p>            
          <?php            
            $url = 'Product/edit/'.$prod->id;                   
            echo form_open($url, 'class="form-horizontal" id="add_product_form"');
          ?>      
            <div class="form-group">
              <div class="col-sm-5">                
                <input type="text" class="form-control" name="prod_name" placeholder="Product Name" value="<?php echo set_value('prod_name', $prod->product_name); ?>">
                <input type="hidden" name="prod_id" value="<?php echo $prod->id; ?>">
              </div>
              <div class="col-sm-6"> <?php echo form_error('prod_name', '<p class="text-danger">', '</p>'); ?></div>
            </div>

            <div class="form-group">
              <div class="col-sm-5">                
                <input type="text" class="form-control" id="weight" name="weight" placeholder="Amount" value="<?php echo set_value('weight', $prod->weight); ?>">
              </div>
              <div class="col-sm-6"> <?php echo form_error('weight', '<p class="text-danger">', '</p>'); ?></div>
            </div>

            <div class="form-group">
              <div class="col-sm-5">                
                <input type="text" class="form-control" id="price" name="price" placeholder="Quantity" value="<?php echo set_value('price', $prod->unit_price);?>">
              </div>
              <div class="col-sm-6"> <?php echo form_error('price', '<p class="text-danger">', '</p>'); ?></div>
            </div>   

            <div class="form-group">
              <div class="col-sm-5">                
                <input type="text" class="form-control" name="prod_exp" placeholder="Expiry Date" value="<?php echo set_value('prod_exp', $prod->prod_exp); ?>">
              </div>
              <div class="col-sm-6"> <?php echo form_error('prod_exp', '<p class="text-danger">', '</p>'); ?></div>
            </div>

            <div class="form-group">
              <div class="col-sm-5">
                <input type="text" class="form-control" id="price_total" name="price_total" placeholder="Total Amount" value="<?php echo set_value('price_total', $prod->price); ?>" readonly="readonly">        
              </div>
              <div class="col-sm-6"> <?php echo form_error('price_total', '<p class="text-danger">', '</p>'); ?></div>
            </div>                                      
      
          <div class="form-group">
            <div class="col-sm-5">              
              <?php echo form_submit('edit_product','Edit Product','class="btn btn-success"'); ?>
            </div>
             <div class="col-sm-6"> 
              <?php
                if( $this->session->flashdata('failed') )
                { echo '<p class="text-danger">'.$this->session->flashdata('failed').'</p>'; }
              ?>
             </div>
          </div>
      <?php echo form_close();  ?>
        </div>      
      </div>
    </div>        
  </div>
</div>

<!--footer section-->
<div class="container-fluid footer">
  <div class="row">
    <div class="col-sm-1">&nbsp;</div>
    <div class="col-sm-5">Made with <span style="color: #e25555;"><i class="glyphicon glyphicon-heart"></i></span> By CodeChain.in</div>      
    <div class="col-sm-5">
      <p class="text-right"><i class="glyphicon glyphicon-envelope"></i> personal.codechain@gmail.com &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-earphone"></i>  9028295792</p>
    </div>      
  </div>
</div>
<!--END footer section-->

</div><!--close main div-->
<script type="text/javascript">
  $(document).ready(function(){
    $('#weight, #price').on('change', function(){
      var qnty = $('#weight').val();
      var rate = $('#price').val();
      var the_amount = (qnty*rate).toFixed(2);
      $('#price_total').val(the_amount);      
    });    
  });
</script>
