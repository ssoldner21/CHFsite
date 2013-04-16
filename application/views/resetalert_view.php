<?php include "header.php"; ?>
<head>
   <meta charset="utf-8">
   <title>Login</title>
   <style> label { display: block; } .errors { color: red; }</style>
</head>
<body>
<?php echo form_open('reset_password'); ?>
<p>
   <?php 
      echo form_label('Email Address: ', 'email_address');
      echo form_input('email_address', '', 'id="email_address" autofocus');
   ?>
</p>
<p>
   <?php echo form_submit('submit', 'Reset Password'); ?>
</p>
<?php echo form_close(); ?>
<div class ="errors"> 
	<?php echo validation_errors(); ?> 
</div>
</body>
</html>	

