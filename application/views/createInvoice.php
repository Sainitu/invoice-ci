<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/top_nav'); ?>
<?php $this->load->view('template/side_nav'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Invoice Management System      
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
              <!-- general form elements -->
              <?php  if ($this->session->flashdata('success_message')) { 
                  // echo $this->session->flashdata('success_message');
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success_message'); ?>
                </div>
               <?php
                }
                ?>
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Customer Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form method="post" action="<?php echo site_url('invoice/insert_invoice'); ?>" id="form" data-parsley-validate="">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">                                
                                <div class="form-group">
                                <label>Date:</label>

                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker" name="date" required="">
                                </div>
                              </div>      
                                </div>
                                <div class="col-md-4 pull-right">
                                    <div class="form-group">
                                        <label >Customer Name</label>
                                        <input type="text" class="form-control" id="customer" placeholder="Enter Name" name="customer" required="">
                                    </div>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control" id="email1"  name="email" readonly>
                                        <small><?php echo form_error('email')?></small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="text">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile1"  name="mobile" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="text">Username</label>
                                        <input type="text" class="form-control" id="user1"  name="mobile" readonly>
                                    </div>
                                </div>
                            </div>  
                        <!-- <div class="box-body">   checkpoint -->                      
                        <!-- <div class="box-header"> -->
                        <h3 class="box-title">Enter Product Details</h3>
                        <br>
                        <br>
                    <!-- </div> -->
    <div class="row">
    <div class="col-xs-12">
        <input type="hidden" name="product_id"  id="id1">
        <!-- Input fields for adding new rows -->
        <div class="col-md-3">
        <div class="form-group">
            <label for="newItem">Product Name:</label>
            <input type="text" name="product_name" id="item1" class="form-control" placeholder="Enter Item name here"  >
            <div id="item_valid1"></div></td>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
            <label for="newRate">Price:</label>
            <input type="text" name="rate" id="rate1" class="form-control" placeholder="Enter price here"  disabled>
            <div id="rate_valid1"></div></td>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
            <label for="newTax">Tax:</label>
            <input type="text" name="tax" id="tax1" class="form-control" placeholder="Enter tax here"  disabled>
            <div id="tax_valid1"></div></td>
        </div>
        </div>
        <div class="col-md-3">
        <div class="form-group">
            <label for="newQuantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity1" class="form-control" placeholder="Enter quantity here" >
            
            <div id="quantity_valid1"></div></td>
        </div>
        </div>
        
        <div class="form-group pull-right" >
            <button type="button" class="btn btn-primary" id="addRow">Add Row</button>
        </div>
    </div>
</div>

<!-- Table to display the entered values -->
<table class="table" id="mprDetailDataTable ">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Tax</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="tableBody">
        <!-- Existing rows will be added here -->
    </tbody>
</table>

              <input type="hidden" value="1" id="hide">
              
              <br><br>
              
                <table >
                  <tr>
                    <th>Sub Total</th>
                    <td><input type="text" name="sub_total" id="sub_total"class="form-control"></td>
                    <td></td>
                  </tr>
                   <tr>
                    <td></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Service Tax(10%)&nbsp;</th>
                    <td><input type="text" name="o_tax" id="o_tax" class="form-control"></td>
                    <td></td>
                  </tr>
                   <tr>
                    <td></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>Grand Total</th>
                    <td><input type="text" name="grand_total" id="grand_total" class="form-control"></td>
                    <td></td>
                  </tr>
                </table>                    
          <!-- </div>/.box-body -->
            </div>
                            <!-- </div> 
                            </div> -->                      
                       <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary submit btn-lg pull-right">Create Invoice</button>
                            <!-- <a href="<?php // echo site_url('invoice/insert_invoice'); ?>" class="btn btn-default float-right" >Back</a> -->
                        </div>
                    </form>
                </div>
            </div>          
        </div>    
    </section>    
</div>
<?php $this->load->view('template/footer');?>

<script type="text/javascript">
  
  $(document).ready(function(){
    //Date picker
  $('#datepicker').datepicker({
      autoclose: true
    })

    // Counter to keep track of the rows
    var rowCounter = 1;
    var tdTxt=0;
    // Event listener for the "Add Row" button
    $('#addRow').click(function(){
        // Get the values from the input fields
        var itemID = $('#id1').val();
        var itemName = $('#item1').val();
        var itemRate = $('#rate1').val();
        var itemTax = $('#tax1').val();
        var itemQuantity = $('#quantity1').val();
        console.log(itemID);

        var itemAmount = (parseFloat(itemRate) + (parseFloat(itemRate) * parseFloat(itemTax) / 100)) * parseInt(itemQuantity);
        if (itemTax && itemQuantity) {
        // Create a new row with the captured values
        var newRow = '<tr  id="row['+rowCounter+']">';
        newRow += '<input type="hidden" name="invoice_items['+rowCounter+'][itemID]" value="' + itemID + '" >';
        newRow += '<td><input type="text" name="invoice_items['+rowCounter+'][itemName]" value="' + itemName + '" readonly></td>';
        newRow += '<td><input type="text" name="invoice_items['+rowCounter+'][itemRate]" value="' + itemRate + '" readonly></td>';
        newRow += '<td><input type="text" name="invoice_items['+rowCounter+'][itemTax]" value="' + itemTax + '" readonly></td>';
        newRow += '<td><input type="text" name="invoice_items['+rowCounter+'][itemQuantity]" value="' + itemQuantity + '" readonly></td>';
        newRow += '<td><input type="text" id="amount" class="amount" name="invoice_items['+rowCounter+'][amount]" value="' + itemAmount + '" readonly></td>';
        newRow += '<td><button type="button" class="btn btn-danger remove " data-rowid="' + rowCounter + '">Remove</button></td>';
        newRow += '</tr>';
        
        // Append the new row to the table
        $('#tableBody').append(newRow);
        // Increment the row counter for the next row
        rowCounter++;
        
        // Clear the input fields for the next entry
        $('#item1').val('');
        $('#rate1').val('');
        $('#tax1').val('');
        $('#quantity1').val('');
        $('#itemID').val('');
        // Recalculate Sub Total, Service Tax, and Grand Total
        updateTotals();
        }else{
            toastr.warning("First Enter all values");
            $('#item1').focus();
        }
    });

    // Event listener for the "Remove" button in each row
    $(document).on('click', '.remove', function(){
        var rowId = $(this).data('rowid');
        // $('#row' + rowId).remove();
        $('#row\\[' + rowId + '\\]').remove(); // Escape special characters in the selector

        // Recalculate Sub Total, Service Tax, and Grand Total
        updateTotals();
    });

    // Function to update Sub Total, Service Tax, and Grand Total
function updateTotals() {
    var subTotal = 0;
   
 
    $('.amount').each(function(){
       
        subTotal += parseFloat($(this).val());
        // console.log(subTotal);
    });   
    $('#sub_total').val(subTotal);

    var serviceTax = subTotal * 0.1;
    $('#o_tax').val(serviceTax);

    var grandTotal = subTotal + serviceTax;
    $('#grand_total').val(grandTotal);
}

});

    $(document).ready(function(){
    $('.add').click(function(){

    $( "#item"+total+"" ).autocomplete({
    source: function(request, response) {
    $.ajax({ 
    url: "<?php echo site_url('invoice/autocomplete'); ?>",
    data: { name: $("#item"+total+"").val()},
    dataType: "json",
    type: "POST",
    success: function(data){              
      response(data);
    }    
  });
},
});
/*Ajax content fills */
$('#item'+total+'').blur(function(){
$.post('<?php echo site_url('invoice/get_contents');?>',{name:$('#item'+total+'').val()},function(res){
  var obj=jQuery.parseJSON(res);
  $('#rate'+total+'').val(obj.Price);
  $('#tax'+total+'').val(obj.tax);
  $('#quantity'+total+'').focus();
});
}); 


 });


      // SUBMIT BUTTON CODE HERE ONLY 
     
// $('.submit').click(function(){
    $(document).on('click', '.submit', function(){
    $('#form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
    })
        
    $('#form').submit();
              
    
    
    });



//item name for first row

        $( "#item1" ).autocomplete({

        source: function(request, response) {
        $.ajax({ 
            url: "<?php echo site_url('invoice/autocomplete'); ?>",
            data: { name: $("#item1").val()},
            dataType: "json",
            type: "POST",
            success: function(data){              
            response(data);
            }    
        });
        },
        });
        $( "#customer" ).autocomplete({
        source: function(request, response) {
        $.ajax({ 
            url: "<?php echo site_url('invoice/autocomplete1'); ?>",
            data: { name: $("#customer").val()},
            dataType: "json",
            type: "POST",
            success: function(data){              
            response(data);
            }    
        });
        },
        });

        /* MATCH CONTENT FROM THE ITEM NAME FIELD */
        $('#customer').blur(function(){
            $.post('<?php echo site_url('invoice/get_contents1');?>',{name:$("#customer").val()},function(res){
                var obj = jQuery.parseJSON(res);
                $('#email1').val(obj.email);
                $('#user1').val(obj.username);
                $('#mobile1').val(obj.mobile);
            });
            }); 
        /* MATCH CONTENT FROM THE ITEM NAME FIELD */
        $('#item1').blur(function(){
            $.post('<?php echo site_url('invoice/get_contents');?>',{name:$("#item1").val()},function(res){
                var obj = jQuery.parseJSON(res);
                $('#id1').val(obj.id);
                $('#rate1').val(obj.Price);
                $('#tax1').val(obj.tax);
                $('#quantity1').focus();
            });
            });
            
      
            
    });

</script>
