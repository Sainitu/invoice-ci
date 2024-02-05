<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assests/theme/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>Register</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
	<?php echo form_open($this->uri->uri_string()); ?>
    <!-- <form action="../../index.html" method="post"> -->

      <div class="form-group has-feedback">
	  <?php if ($use_username) { ?>
        
		<?php echo form_label('Username', $username['id'], ['class' => 'control-label']); ?>
		<?php echo form_input($username, '', 'class="form-control", placeholder="Full Name"'); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
		<small class="form-text text-muted"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></small>
      </div>
	  <?php } ?>

      <div class="form-group has-feedback">
        
		<?php echo form_label('Email Address', $email['id']); ?>
		<?php echo form_input($email, '', 'class="form-control", placeholder="Email"'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		<small class="form-text text-muted"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></small>
      </div>

      <div class="form-group has-feedback">
        
		<?php echo form_label('Password', $password['id']); ?>
		<?php echo form_password($password, '', 'class="form-control", placeholder="Password"'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<small class="form-text text-muted"><?php echo form_error($password['name']); ?></small>
      </div>

      <div class="form-group has-feedback">
        
		<?php echo form_label('Retype Password', $confirm_password['id']); ?>
		<?php echo form_password($confirm_password, '', 'class="form-control", placeholder="Retype password"'); ?>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		<small class="form-text text-muted"><?php echo form_error($confirm_password['name']); ?></small>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		  <?php echo form_submit('register', 'Register', 'class="btn btn-primary btn-block btn-flat"'); ?>
        </div>
        <!-- /.col -->
      </div>
    <!-- </form> -->
	<?php echo form_close(); ?>


    <!-- <a href="login.html" class="text-center">I already have a membership</a> -->
	<?php echo anchor('/auth/login/',  'I already have a membership'); ?>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assests/theme/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assests/theme/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>




































<!-- #################################################################################################   -->

