


<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin LTE</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/admin-template/assests/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/admin-template/assests/theme/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/admin-template/assests/theme/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/admin-template/assests/theme/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="http://localhost/admin-template/assests/theme/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>AdminLTE</b><br>Forgot Password</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
      <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
            
            <?php echo form_open($this->uri->uri_string()); ?>
            <div class="form-group has-feedback">
            <?php echo form_label($login_label, $login['id'], ['class' => 'control-label']); ?>
            <?php echo form_input($login, '', 'class="form-control"'); ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <small class="form-text text-muted"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></small>
            </div>

            <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-6 pull-right">
            <?php echo form_submit('reset', 'Get New Password', 'class="btn btn-primary btn-block btn-flat"'); ?>
            </div>
          </div>
            <?php echo form_close(); ?>
    </div>
    </div>
    <!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assests/theme/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>