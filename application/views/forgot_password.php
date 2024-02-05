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
        <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.3.4/parsley.min.js"></script>
 

</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
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

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
  <script type="text/javascript">
$(function () {
  $('#demo-from').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
});
</script>
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
