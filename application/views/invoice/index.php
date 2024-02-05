<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/top_nav'); ?>
<?php $this->load->view('template/side_nav'); ?>
  <!-- =============================================== -->
<!-- dataTables Json Links below  -->
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
          <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/parsleyjs"></script>

          <!-- Data-Table javascript below -->
<script type="text/javascript">
            $(document).ready( function () {
              $('#printButton').click(function() {
                        window.print();
                        });
            $('#memListTable2').DataTable({
              "ajax" : "<?php echo base_url('loadInvoice/fetchDataFromDatabase'); ?>",
              "order" : [],
            });
           
           
            
          } );
          function deleteFun(invoice_id){
              if(confirm('Are you sure?')==true){
                $.ajax({
                  url: '<?php echo base_url('loadInvoice/deleteSingleData'); ?>',
                  method: "post",
                  dataType: "json",
                  data:{invoice_id:invoice_id},
                  success:function(response){
                    if(response==1){
                      alert('Data Deleted Successfully');
                      $('#memListTable2').DataTable().ajax.reload();
                    }else{
                      alert('Deletion Failed!!');
                    }
                    console.log(response);
                  },
                  error: function () {
                    alert('Error in processing the request');
                  }
                });
              }
            }
          function viewFun(invoice_id){
              $.ajax({
                url: "<?php echo base_url('loadInvoice/getEditData') ?>",
                method: "post",
                data:{invoice_id:invoice_id},
                dataType:"json",
                success:function(response)
                {
                   $('#editID').val(response.invoice_id);
                   $('#cName1').text(response.resultData.username);
                   $('#cName2').text(response.resultData.last_name);
                   $('#cEmail').text(response.resultData.email);
                   $('#cMobile').text(response.resultData.mobile);
                   $('#in_id').text(response.resultData.invoice_id);
                   $('#Date').text(response.resultData.date);
                   $('#subtotal').text(response.resultData.sub_total);
                   $('#grandtotal').text(response.resultData.grand_total);
                   $('#servicetax').text(response.resultData.service_tax);
                   var table = '';
                   $.each(response.mergedData, function( index, value ) {
                    table += `<tr>
                                <td>${value.p_quantity}</td>
                                <td>${value.pname}</td>
                                <td>${value.p_price}</td>
                                <td>${value.p_amount}</td>
                              </tr>`;
                  });
                   
                   $('#inv_items').append(table);
                  console.log(response);
                   $('#editModel').modal({
                    backdrop:"static",
                    keyboard:false,
                   });
                }

              });
            }
            function downloadFun(invoice_id) {
            // Make an AJAX request to generate the PDF
            console.log(invoice_id);
            $.ajax({
              url: "<?php echo base_url('loadInvoice/PDF') ?>",
              method: "POST",
              dataType: 'json',
              data: { invoice_id: invoice_id },
              success: function(response) {
        // Assuming the response contains the path to the saved PDF file
        var pdfPath = response.pdfPath;

        // Display the PDF in the browser
        window.open(pdfPath, '_blank');
    },
              error: function(jqXHR, textStatus, errorThrown) {
                console.log('AJAX Error:', errorThrown);

        // Handle errors
        alert('Error generating PDF');
    }
            });
          }

            $(document).on('click', '#downloadPDF', function() {
            // Get the HTML content of the modal
            var modalContent = $('#editModel').html();

            // Send the HTML content to the server to generate the PDF
            $.ajax({
                url: 'loadInvoice/generate_pdf',
                type: 'POST',
                data: {html: modalContent},
                success: function(response) {
                    // opening pdf generated in a new tab
                    window.open(response, '_blank');
                 
                },
                error: function() {
                    alert('Error generating PDF');
                   
                }
                
            });
        });
       
    
  

</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice Management
        <small>Add/View Invoice Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>createInvoive"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Invoice Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <table id="memListTable2" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Invoice ID</th>
            <th>Customer ID</th>
            <th>Total Items</th>
            <th>Total Price</th>
            <th>Date</th>
            <th>Grand ToTal</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
            </div>
          </div>
          </div>
          </div>

          <!-- MODAL STARTS FROM HERE  -->
          <div class="modal fade" id="editModel" aris-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <div class="col-xs-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title"><i class="fa fa-globe"></i> INVOICE</h4>
                  </div>
                </div>
              
              <form  id="editForm">
              <div class="modal-body">
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>CompanyName, Inc.</strong><br>
            Rajasthan, Ind<br>
            Email: Admin@CompanyName.com
          </address>
        </div>
        <div class="col-sm-4 invoice-col pull-right">
        <div class="image">
          <img src="<?php echo base_url(); ?>assests/theme/cdnlogo.com_reactivex.svg" class="img-circle" alt="User Image" width="200" height="100">
        </div>
        </div>
      </div>

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>Admin, Inc.</strong><br>
            Name:- <span id="cName1">rr</span> <span id="cName2"></span><br>
            Phone: <span id="cMobile"></span><br>
            Email: <span id="cEmail"></span>
          </address>
        </div>
        
        <div class="col-sm-4 invoice-col pull-right">
          <b>Invoice ID:- #<span id="in_id"></span></b><br>
          <b>Invoice Date:- <span id="Date"></span></b><br>
        </div>
      </div>
                        <input type="hidden" name="invoice_id" id="editID">
                        <input type="hidden" name="cid" id="customerID">
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped" id="inv_items">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Price (Per unit)</th>
            
              <th>Amount (Per item)</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="<?php echo base_url(); ?>/assests/theme/dist/img/credit/visa.png" alt="Visa">
          <img src="<?php echo base_url(); ?>/assests/theme/dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="<?php echo base_url(); ?>/assests/theme/dist/img/credit/american-express.png" alt="American Express">
          <img src="<?php echo base_url(); ?>/assests/theme/dist/img/credit/paypal2.png" alt="Paypal">
        </div>
        <div class="col-xs-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td><span id="subtotal"></span></td>
              </tr>
              <tr>
                <th>Service Tax(10%)</th>
                <td><span id="servicetax"></span></td>
              </tr>
              <tr>
                <th>Total:</th>
                <td><span id="grandtotal"></span></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-success pull-right" id="downloadPDF" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Generate PDF</button>
                        </div>
                    
            </div> 
            </form>
          </div>
          </div>
          </div>
          <!-- END EDIT MODAL  -->
    </section>
    
</div>
    <!-- /.content -->
    
    
<?php $this->load->view('template/footer');?>