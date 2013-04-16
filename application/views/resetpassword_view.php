<?php include "header.php"; ?>
<head>
   <meta charset="utf-8">
   <title>Login</title>
   <style> label { display: block; } .errors { color: red; }</style>
</head>
<body>
<h1>Reset Password</h1>
<p>An email has been sent to your address on file to reset your password.</p>
<?php echo form_open('confirm_password'); ?>
<p>
   <?php 
      echo form_label('New Password:', 'password');
      echo form_password('password', '', 'id="password"');
   ?>
</p>

<p>
   <?php 
      echo form_label('Confirm Password:', 'confpassword');
      echo form_password('confpassword', '', 'id="confpassword"');
   ?>
</p>

<p>
   <?php echo form_submit('submit', 'Register'); ?>
</p>
<?php echo form_close(); ?>
<div class ="errors"> 
	<?php echo validation_errors(); ?> 
</div>
<div class="reset">
	<a href="http://localhost/CHFsite/index.php/resetpassword">Forgot password</a>
</div>
</body>
</html>	

