<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/top_nav'); ?>
<?php $this->load->view('template/side_nav'); ?>
  <!-- =============================================== -->
<!-- dataTables Json Links below  -->

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customer Management
        <small>Add / Modify Customer Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer</li>
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
              <h3 class="box-title">Customers List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <table id="memListTable1" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Mobile</th>
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
                                        <label >First Name</label>
                                        <input type="text" class="form-control required"   name="first_name" id="editFirstName"  maxlength="128">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label >Last Name</label>
                                        <input type="text" class="form-control required" name="last_name" id="editLastName"  maxlength="128">
                                        
                                    </div>   
                                </div>    
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Email address</label>
                                        <input type="text" class="form-control required email"   name="email" id="editEmail"  maxlength="128">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label >User Name</label>
                                        <input type="text" class="form-control required" name="username" id="editUsername"  maxlength="128">
                                        
                                    </div>   
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Mobile</label>
                                        <input type="text" class="form-control required digits"  name="mobile" id="editMobile" maxlength="10">
                                        
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
							<h5 class="modal-title" id="exampleModalLongTitle">Add Customer</h5>
							
						</div>
            <form id="createForm" class="demo-from"  data-parsley-validate>
				      	<div class="modal-body">
                <div class="row">
                <div class="col-md-6">
				        	<div class="form-group">
							    <label>User Name</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="User-Name here" name="username" required>
                  <span class="error-message" id="first-name-error"></span>
							    </div>
                </div>
              <div class="col-md-6">  
							<div class="form-group">
								<label>Email</label>
							    <input type="email" class="form-control" data-parsley-required="true" placeholder="Email Here" name="email" required data-parsley-type="email">
                  <span class="error-message" id="email-error"></span>
							</div>
							</div>
              </div>
              <div class="row">
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>First Name</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="First-Name Here" name="first_name" required>
                  <span class="error-message" id="first-name-error"></span>
							</div>
							</div>
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>Last Name</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="Last-Name Here" name="last_name" required>
                  <span class="error-message" id="last-name-error"></span>
							</div>
							</div>
				      </div> 
							<div class="form-group">
							    <label>Mobile Number</label>
							    <input  type="number" class="form-control" data-parsley-required="true" placeholder="Mobile Number Here" name="mobile" required data-parsley-type="number">
                  <span class="error-message" id="mobile-error"></span>
							</div>
							<div id="errorContainer"></div>
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
    
          <!-- Data-Table javascript below -->
          <script type="text/javascript">
            $(document).ready( function () {
            $('#memListTable1').DataTable({
              "ajax" : "<?php echo base_url('customer/fetchDataFromDatabase'); ?>",
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
	            url: "<?php echo base_url('customer/createData'); ?>",
	            data: $("#createForm").serialize(),
	            type: "post",
	            async: false,
	            dataType: 'json',
	            success: function(response){
	              if (response.status === 'success') {
	                $('#createModal').modal('hide');
	                $('#createForm')[0].reset();
	               // alert('Successfully inserted');
                  toastr.success('Successfully inserted');
	                $('#memListTable1').DataTable().ajax.reload();
                }else{
                  // Display the general error message 
           
                }
	              },
	           error: function()
	           {
	            //alert("error");
              toastr.error('Error');
	           }
          });
         
		});
  // } );
            
           
            $(document).on('click','#submitForm',function(e){
              event.preventDefault(e);
              $.ajax({
                url: "<?php echo base_url('customer/updateData'); ?>",
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
                    //alert("Update Failed");
                    toastr.error("Update Failed");
                  }
                  $('#memListTable1').DataTable().ajax.reload();

                },
                error: function(){
                  alert("Error");
                  toastr.error("Error: check again");
                }
              });
            });
            function editFun(id){
              $.ajax({
                url: "<?php echo base_url('customer/getEditData') ?>",
                method: "post",
                data:{id:id},
                dataType:"json",
                success:function(response)
                {
                   $('#editID').val(response.id);
                   $('#editFirstName').val(response.first_name);
                   $('#editLastName').val(response.last_name);
                   $('#editEmail').val(response.email);
                   $('#editUsername').val(response.username);
                   $('#editMobile').val(response.mobile);
                   $('#editRole').val(response.role);
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
                  url: '<?php echo base_url('customer/deleteSingleData'); ?>',
                  method: "post",
                  dataType: "json",
                  data:{id:id},
                  success:function(response){
                    if(response==1){
                     // alert('Data Deleted Successfully');
                      toastr.success('Data Deleted Successfully');
                      $('#memListTable1').DataTable().ajax.reload();
                    }else{
                     // alert('Deletion Failed!!');
                      toastr.success('Deletion Failed!!');
                    }
                  }
                });
              }
            }

</script>
<?php $this->load->view('template/footer');?>