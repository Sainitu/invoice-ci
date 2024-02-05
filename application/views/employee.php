<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/top_nav'); ?>
<?php $this->load->view('template/side_nav'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
        <small>Add, Delete and Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Management</li>
      </ol>
    </section>
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
              <h3 class="box-title">Users List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <table id="memListTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Mobile</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <!-- <tboday>
                  <td>
                  <a class="btn btn-sm btn-info" href="<?php // echo base_url('employee/edit/'.$row->id) ?>"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-sm btn-danger deleteUser" href="<?php // echo base_url('employee/delete/'.$row->id) ?>"><i class="fa fa-trash"></i></a>
                  </td>
    </tboday> -->
    <!-- <tfoot>
        <tr>
            <th></th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Mobile</th>
            <th>Role</th>
        </tr>
    </tfoot> -->
</table>
            </div>
            <!-- /.box-body -->
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
                                        <label >Mobile Number</label>
                                        <input type="text" class="form-control required digits"  name="mobile" id="editMobile" maxlength="10">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Role</label>
                                        <input type="text" class="form-control required digits"  name="role"id="editRole"  maxlength="10">
                                       
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
          <!-- /.box -->

          <!-- ################ Create Modal Box ################# -->
         
			<!-- Modal -->
			<div class="modal fade" id="createModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
				    <div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Add Record</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  	<span aria-hidden="true">&times;</span>
							</button>
						</div>
            <form id="createForm" class="demo-from"  data-parsley-validate>
				      	<div class="modal-body">
                <div class="row">
                <div class="col-md-6">
				        	<div class="form-group">
							    <label>User Name</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="User-Name here" name="username" required>
							    </div>
                </div>
              <div class="col-md-6">  
							<div class="form-group">
								<label>Email</label>
							    <input type="email" class="form-control" data-parsley-required="true" placeholder="Email Here" name="email" required data-parsley-type="email">
							</div>
							</div>
              </div>
              <div class="row">
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>First Name</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="First-Name Here" name="first_name" required>
							</div>
							</div>
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>Last Name</label>
							    <input type="text" class="form-control" data-parsley-required="true" placeholder="Last-Name Here" name="last_name" required>
							</div>
							</div>
				      </div>
              <div class="row">
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>Password</label>
							    <input type="password" class="form-control" data-parsley-required="true" id="pas" placeholder="Password Here" name="password" required>
							</div>
							</div>
              <div class="col-md-6"> 
							<div class="form-group">
							    <label>Confirm Password</label>
							    <input type="password" class="form-control" data-parsley-required="true" placeholder="Confirm Password Here" name="cpassword" required data-parsley-equalto='#pas'>
							</div>
							</div>
				      </div>
              
							<div class="form-group">
							    <label>Mobile Number</label>
							    <input  type="number" class="form-control" data-parsley-required="true" placeholder="Mobile Number Here" name="mobile" required data-parsley-type="number">
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
		
        
          
    </section>

    <!-- ################# DO NOT EDIT BELOW CODE IN ANY CASE ######################## -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users List 2</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table id="#datatable1" class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Mobile no.</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php     foreach ($employee as $row ) : ?>
                  
                <tr>
                  <td><?php     echo $row->id; ?></td>
                  <td><?php     echo $row->username; ?></td>
                  <td><?php     echo $row->email; ?></td>
                  <td><?php     echo $row->role; ?></td>
                  <td><?php     echo $row->mobile; ?></td>
                  <!-- <td>Admin</td> same above formula but use role column name -->
                  <td>
                  <a class="btn btn-sm btn-info" href="<?php echo base_url('employee/edit/'.$row->id) ?>"><i class="fa fa-pencil"></i></a>
                  <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url('employee/delete/'.$row->id) ?>"><i class="fa fa-trash"></i></a>
                  </td> <!-- BUTTONS-->
                </tr>
                <?php  endforeach;                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 
    </section>
    <!-- /.content -->

</div>
</div>
<script type="text/javascript">
  $(document).ready( function () {
            $('#memListTable').DataTable({
              "ajax" : "<?php echo base_url('EmployeeController/fetchDataFromDatabase'); ?>",
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
	            url: "<?php echo base_url('EmployeeController/createData'); ?>",
	            data: $("#createForm").serialize(),
	            type: "post",
	            async: false,
	            dataType: 'json',
	            success: function(response){
	              
	                $('#createModal').modal('hide');
	                $('#createForm')[0].reset();
	                //alert('Successfully inserted');
                  toastr.success("Successfully inserted");
	                $('#memListTable').DataTable().ajax.reload();
	              },
                error: function(xhr, status, error) {
                   // console.log(error);
                    toastr.error("Data Not inserted");
                  }
	          
          });
         
		});
  

    $(document).on('click','#submitForm',function(e){
              event.preventDefault(e);
              $.ajax({
                url: "<?php echo base_url('EmployeeController/updateData'); ?>",
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
                  $('#memListTable').DataTable().ajax.reload();

                },
                error: function(){
                  alert("Error");
                  toastr.warning("Error: Updation fail");
                }
              });
            });

            function editFun(id){
              $.ajax({
                url: "<?php echo base_url('EmployeeController/getEditData') ?>",
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
                  url: '<?php echo base_url('EmployeeController/deleteSingleData'); ?>',
                  method: "post",
                  dataType: "json",
                  data:{id:id},
                  success:function(response){
                    if(response==1){
                      //alert('Data Deleted Successfully');
                      toastr.warning("Data Deleted Successfully");
                      $('#memListTable').DataTable().ajax.reload();
                    }else{
                      //alert('Deletion Failed!!');
                      toastr.error("Deletion Failed!");
                    }
                  }
                });
              }
            }


</script>
<?php $this->load->view('template/footer');?>