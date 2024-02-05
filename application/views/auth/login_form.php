

<?php
$login = array(
'name'=> 'login',
'id'=> 'login',
'value' => set_value('login'),
'maxlength'=> 80,
'size'=> 30,
'required'=> 'TRUE'
);
if ($login_by_username AND $login_by_email) {
$login_label = 'Email or login';
} else if ($login_by_username) {
$login_label = 'Username';
} else {
$login_label = 'Email';
}
$password = array(
'name'=> 'password',
'id'=> 'password',
'size'=> 30,
'required'=> 'TRUE'
);
$remember = array(
'name'=> 'remember',
'id'=> 'remember',
'value'=> 1,
'checked'=> set_value('remember'),
'style' => 'margin:0;padding:0',
);
$captcha = array(
'name'=> 'captcha',
'id'=> 'captcha',
'maxlength'=> 8,
);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
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
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://parsleyjs.org/src/parsley.css" rel="stylesheet" />
       
 

</head>
<body class="hold-transition login-page">
<div class="bs-callout bs-callout-warning hidden">
  <h4>Oh snap!</h4>
  <p>This form seems to be invalid :(</p>
</div>

<div class="bs-callout bs-callout-info hidden">
  <h4>Yay!</h4>
  <p>Everything seems to be ok :)</p>
</div>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php echo form_open($this->uri->uri_string(), array('data-parsley-validate' => 'parsley', 'id' => 'demo-from')); ?>
      
      <div class="form-group has-feedback">

    <?php echo form_label($login_label, $login['id'], ['class' => 'control-label']); ?>
    <?php echo form_input($login, '', 'class="form-control" placeholder="Email"', 'data-parsley-required data-parsley-type="email"'); ?>
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    <small class="form-text text-muted">
    <?php echo form_error($login['name']); ?>
    <?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
  </small>
    </div>

      <div class="form-group has-feedback">
    <?php echo form_label('Password', $password['id'], ['class' => 'control-label']); ?>
    <?php echo form_password($password, '', 'class="form-control" placeholder="Password"'); ?>
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    <small class="form-text text-muted">
    <?php echo form_error($password['name']); ?>
    <?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
    </small>
    </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
            <?php echo form_checkbox($remember, '1', TRUE, '', 'class="form-check-input"'); ?>
            <?php echo form_label('Remember me', $remember['id'], ['class' => 'form-check-label']); ?>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
          <!-- <button type="submit" class="btn btn-primary btn-block btn-flat"> -->
          <?php echo form_submit('submit', 'Sign In', 'class="btn btn-primary btn-block btn-flat"'); ?>
          <!-- </button> -->

        </div>
        <!-- /.col -->
      </div>
    <!-- </form> -->
    <?php echo form_close(); ?>


    <!-- /.social-auth-links -->

    <!-- <a href="auth/forgot_password_form/">I forgot my password</a><br> -->
    <?php echo anchor('/auth/forgot_password/', 'I Forgot my password'); ?><br>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->
    <?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register A New Member'); ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assests/theme/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assests/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="<?php echo base_url(); ?>assests/theme/plugins/iCheck/icheck.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.3.4/parsley.min.js"></script>
  <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

$(function () {
  $('#demo-from').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    // $('.bs-callout-info').toggleClass('hidden', !ok);
    // $('.bs-callout-warning').toggleClass('hidden', ok);
  })
});
</script>

</body>
</html>

<?php

// $hash = '$2y$10$ApG3yPdPFlNjLcUr3QBnyu/RQIckAg0J6EyqtRE2UMr8SCXDk61DS';

// if (password_verify('asdf', $hash)) {
//     echo print_r('Password is valid!');die;
// } else {
//     echo print_r('Invalid password.');die;
// }
?>  
<!-- //#########################################################  -->
    <!-- Bootstrap core CSS -->
