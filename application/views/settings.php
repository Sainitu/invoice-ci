<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/top_nav'); ?>
<?php $this->load->view('template/side_nav'); ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Settings
        <small>Change your basic & login settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Change Basic Information</h3>
        </div>
        <form role="form" action="<?php echo base_url('Settings/update1'); ?>" method="post">
        <div class="box-body">
        <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo set_value('email', $user_first_name); ?>">
              </div>
            </div>
              <!-- /.form-group -->

            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" value="<?php echo set_value('email', $user_last_name); ?>">
              </div>
              
              <!-- /.form-group --> 
            </div>
            <!-- /.col -->
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
        </div>
        </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  <!-- #################CAN START NEW BOX BELOW################### -->

  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Change Basic Information</h3>
        </div>
        <form role="form" action="<?php echo base_url('Settings/update'); ?>" method="post">
        <div class="box-body">
        <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo set_value('email', $user_email); ?>"   style="width: 100%;">
                <small><?php echo form_error('email'); ?></small>
              </div>
            </div>
              <!-- /.form-group -->
            <!-- /.col -->
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Change Email</button>
        </div>
        </form>
        <!-- /.box-footer-->
    </div>
      <!-- /.box -->

      <!-- add new box #####################################################################  -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Change Basic Information</h3>
        </div>
        <form role="form" action="<?php echo base_url() ?>changePasswordSettings" method="post">
        <div class="box-body">
        <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword1">Current Password</label>
                                        <input type="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword1">New Password</label>
                                        <input type="password" class="form-control" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="inputPassword2">Confirm New Password</label>
                                        <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm new password" name="cNewPassword" maxlength="10" required>
                                    </div>
                                </div>
                            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Change Password</button>
        </div>
        </form>
        <!-- /.box-footer-->
        <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <?php  
                    $noMatch = $this->session->flashdata('nomatch');
                    if($noMatch)
                    {
                ?>
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('nomatch'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- /.content -->
    
    
<?php $this->load->view('template/footer');?>