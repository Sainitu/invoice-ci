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
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form action="<?php echo base_url('employee/store') ?>" method="post" >
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">User Name</label>
                                        <input type="text" class="form-control required" name="username" placeholder="Enter username" maxlength="128">
                                        <small><?php echo form_error('username')?></small>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control required email" placeholder="Enter Email" name="email" maxlength="128">
                                        <small><?php echo form_error('email')?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control required" name="password" placeholder="Enter Password" maxlength="10">
                                        <small><?php echo form_error('password')?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control required equalTo"  name="cpassword"  placeholder="Retype Password"maxlength="10">
                                        <small><?php echo form_error('cpassword')?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" class="form-control required digits" name="mobile" placeholder="Enter Mobile no"maxlength="10">
                                        <small><?php echo form_error('mobile')?></small>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-control required" id="role" name="role">
                                        <option value="0">Select Role</option>
                                       
                                        </select>
                                    </div>
                                </div> -->
                                
                                 
                            </div>
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo base_url('employee'); ?>" class="btn btn-default float-right" >Back</a>
                            <!-- <input type="submit" class="btn btn-primary" value="Submit" /> -->
                            <!-- <input type="reset" class="btn btn-default" value="Reset" /> -->
                        </div>
                    </form>
                </div>
            </div>
           
        </div>    
    </section>
    
</div>



<?php $this->load->view('template/footer');?>