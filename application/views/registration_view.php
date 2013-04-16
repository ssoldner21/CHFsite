<?php include "header.php"; ?>
<head>
   <meta charset="utf-8">
   <title>Login</title>
   <style> label { display: block; } .errors { color: red; }</style>
</head>
<body>
<h1> Register your account</h1>
<?php echo form_open('register'); ?>
<p>
   <?php 
      echo form_label('First Name: ', 'first_name');
      echo form_input('first_name', '', 'id="first_name" autofocus');
   ?>
</p>
<p>
   <?php 
      echo form_label('Last Name: ', 'last_name');
      echo form_input('last_name', '', 'id="last_name"');
   ?>
</p>
<p>
   <?php 
      echo form_label('Email Address: ', 'email_address');
      echo form_input('email_address', '', 'id="email_address"');
   ?>
</p>

<p>
   <?php 
      echo form_label('Password:', 'password');
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
<div class="login">
	<a href="http://localhost/CHFsite/">Proceed to login</a>
</div>
</body>
</html>	

