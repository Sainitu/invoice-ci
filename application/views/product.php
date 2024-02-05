<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/top_nav'); ?>
<?php $this->load->view('template/side_nav'); ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Management
        <small>Add / Modify Product Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <!-- <a class="btn btn-primary" href="<?php// echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Add New</a> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                    <i class="fa fa-plus"></i> Add New</button>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Product Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <table id="memListTable2" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Product name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
</table>
            </div>
          </div>
          </div>
          </div>
          <!-- edit mode  -->
          <div class="modal fade" id="editModel" aris-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4 class="modal-title">Edit Records</h4>
                  
                </div>
              
              <form  id="editForm">
                        <div class="modal-body">
                        <input type="hidden" name="id" id="editID">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Product Name</label>
                                        <input type="text" class="form-control required"   name="PName" id="editProductName"  maxlength="128">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label >Price</label>
                                        <input type="text" class="form-control required" name="Price" id="editPrice"  maxlength="128">
                                        
                                    </div>   
                                </div>    
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Category</label>
                                        <input type="text" class="form-control required email"   name="Category" id="editCategory"  maxlength="128">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label >Quantity</label>
                                        <input type="text" class="form-control required" name="Quantity" id="editQuantity"  maxlength="128">
                                        
                                    </div>   
                                </div>    
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Description</label>
                                        <input type="text" class="form-control required"   name="description" id="editDescription"  maxlength="128">                               
                                    </div>
                                </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label >tax</label>
                                        <input type="number" class="form-control required"   name="tax" id="editTax" >                               
                                    </div>
                                </div>
                            </div>
                          
                        </div><!-- /.box-body -->
    
                        <div class="modal-footer">
                            <button type-"button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                            <button type-"submit" class="btn btn-primary" id="submitForm">Update</button>
                        </div>
                    </form>
            </div>
        <!-- END EDIT MODAL  -->
          </div>
          </div>
            <!-- START OF THE CREATE MODEL  -->
          <div class="modal fade" id="createModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
							<h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
							
						</div>
            <form id="createForm" class="demo-from" method="POST" data-parsley-validate="">
				      	<div class="modal-body">
                <div class="row">
                <div class="col-md-6">
				        	<div class="form-group">
							    <label>Product Name</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="Product Name here" name="PName" required>
                  <?php echo form_error('PName', '<div class="text-danger">', '</div>'); ?>
                </div>
                </div>
              <div class="col-md-6">  
							<div class="form-group">
								<label>Price</label>
							    <input type="number" class="form-control" data-parsley-required="true" placeholder="Price Here" name="Price" required data-parsley-type="email">
                  <?php echo form_error('Price', '<div class="text-danger">', '</div>'); ?>
							</div>
							</div>
              </div>
              <div class="row">
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>Category</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="Category Here" name="Category" required>
                  <?php echo form_error('Category', '<div class="text-danger">', '</div>'); ?>
							</div>
							</div>
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>Quantity</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="Quantity Here" name="Quantity" required>
                  <?php echo form_error('Quantity', '<div class="text-danger">', '</div>'); ?>
							</div>
							</div>
				      </div>
              <div class="row">
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>Description</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="Description Here" name="description" required>
                  <?php echo form_error('description', '<div class="text-danger">', '</div>'); ?>
							</div>
              </div>
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>Tax(%):</label>
							    <input type="number" class="form-control" data-parsley-required="true" placeholder="Enter tax Percentage" name="tax" required>
                  <?php echo form_error('tax', '<div class="text-danger">', '</div>'); ?>
							</div>
							</div>
							
              </div>							
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
				        	<button type="submit" class="btn btn-primary" id="submit">Save</button>
				      	</div>
				    </div>
            </form>
				</div>
			</div>
          </div>
          <!-- END OF CREATE MODEL FORM  -->
    </section>
    
</div>
    <!-- /.content -->
    
    <script type="text/javascript">
            $(document).ready( function () {
            $('#memListTable2').DataTable({
              "ajax" : "<?php echo base_url('product/fetchDataFromDatabase'); ?>",
              "order" : [],
            });
          } );
          
          $('#createForm').parsley();
          $('#createForm').parsley().on('field:validated', function() {
              var ok = $('.parsley-error').length === 0;
              $('.bs-callout-info').toggleClass('hidden', !ok);
              $('.bs-callout-warning').toggleClass('hidden', ok);
            })
            
            $(document).on('click','#submit',function() {
              
              
              console.log("val");
			$.ajax({
	            url: "<?php echo base_url('product/createData'); ?>",
	            data: $("#createForm").serialize(),
	            type: "post",
	            async: false,
	            dataType: "json",
	            success: function(response){
	              if (response.error) {
                var errorMessage = "Validation errors:<br>";
                // $.each(response.error, function(key, value) {
                //     errorMessage += value + "<br>";
                // });
                for (var key in response.error) {
                      if (response.error.hasOwnProperty(key)) {
                          errorMessage += response.error[key] + "<br>";
                      }
                  }
                $('#errorMessages').html(errorMessage);
            } else {
                $('#errorMessages').html(""); // Clear any previous error messages
                $('#createModal').modal('hide');
                $('#createForm')[0].reset();
                //alert('Successfully inserted');
                toastr.success("Successfully inserted");
                $('#memListTable2').DataTable().ajax.reload();
            }
          
	                // $('#createModal').modal('hide');
	                // $('#createForm')[0].reset();
	                // alert('Successfully inserted');
	                // $('#memListTable2').DataTable().ajax.reload();
	              },
                error: function(xhr, status, error) {
                    console.log(error);
                  }
          });
         
		});
  // } );
            
           
            $(document).on('click','#submitForm',function(e){
              event.preventDefault(e);
              $.ajax({
                url: "<?php echo base_url('product/updateData'); ?>",
                data: $("#editForm").serialize(),
                type: "post",
                async: false,
                dataType: 'json',
                success: function(response){
                  $('#editModal').modal('hide');
                  $('#editForm')[0].reset();
                  if(response == 1){
                    // alert("Successfully Updated");
                    toastr.success("Successfully Updated");
                  }else{
                   // alert("Update Failed");
                    toastr.warning("Update Failed");
                  }
                  $('#memListTable2').DataTable().ajax.reload();

                },
                error: function(){
                  //alert("Error");
                  toastr.warning("Error:- Update Failed");
                }
              });
            });
            function editFun(id){
              $.ajax({
                url: "<?php echo base_url('product/getEditData') ?>",
                method: "post",
                data:{id:id},
                dataType:"json",
                success:function(response)
                {
                   $('#editID').val(response.id);
                   $('#editProductName').val(response.PName);
                   $('#editPrice').val(response.Price);
                   $('#editCategory').val(response.Category);
                   $('#editQuantity').val(response.Quantity);
                   $('#editDescription').val(response.description);
                   $('#editTax').val(response.tax);
                   
                   $('#editModel').modal({
                    backdrop:"static",
                    keyboard:false,
                   });
                }

              });
            }
            function deleteFun(id){
              if(confirm('Are you sure?')==true){
                $.ajax({
                  url: '<?php echo base_url('product/deleteSingleData'); ?>',
                  method: "post",
                  dataType: "json",
                  data:{id:id},
                  success:function(response){
                    if(response==1){
                     // alert('Data Deleted Successfully');
                      toastr.warning("Data Deleted Successfully");
                      $('#memListTable2').DataTable().ajax.reload();
                    }else{
                     // alert('Deletion Failed!!');
                      toastr.error("Deletion Failed");
                    }
                  }
                });
              }
            }

</script>   
<?php $this->load->view('template/footer');?>