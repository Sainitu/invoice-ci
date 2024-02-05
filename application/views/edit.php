<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/top_nav'); ?>
<?php $this->load->view('template/side_nav'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add / Edit User</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form  action="<?php echo base_url('employee/update/'.$employee->id); ?>" method="post" >
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="">User Name</label>
                                        <input type="text" class="form-control required" name="username" value="<?= $employee->username ?>" maxlength="128">
                                        <small><?php echo form_error('username'); ?></small>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control required email"   name="email" value="<?= $employee->email ?>" maxlength="128">
                                        <small><?php echo form_error('email'); ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" class="form-control required digits"  name="mobile" value="<?= $employee->mobile ?>" maxlength="10">
                                        <small><?php echo form_error('mobile'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Role</label>
                                        <input type="text" class="form-control required digits"  name="role" value="<?= $employee->role ?>" maxlength="10">
                                        <small><?php echo form_error('role'); ?></small>
                                    </div>
                                </div>
                                 
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <!-- <input type="submit" class="btn btn-primary" value="Submit" /> -->
                            <button type-"submit" class="btn btn-primary">Update</button>
                            <!-- <input type="Submit" class="btn btn-default" value="Back" /> -->
                            <a href="<?php echo base_url('employee'); ?>" class="btn btn-default float-right" >Back</a>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>    
    </section>
    
</div>



<?php $this->load->view('template/footer');?>