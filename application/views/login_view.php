
<?php include "header.php"; ?>
</head>

<body>
<!-- wrap starts here -->
<div id="wrap">

	<!--header -->
	<div id="header">			
				
	</div>
	
<div id="main">
	<h2>---Sample Login---</h2>
	<h3>email: hht@hht.com  password: hhthht</h3>
	<h1>Welcome to the CHF Tracker!</h1>
	<p>This website was created to help Congestive Heart Failure patients track their daily weights, blood pressures, heart rates and oxygen saturations in order to lead a more independent lifestyle. </p>
	<h1>Goals of the Website</h1>
	<ol>
	<li>Decrease the number of hospitalizations of patients with CHF; Home telemonitoring in CHF 
	patients was associated with increased use of beta blockers at appropriate doses and decrease in 
	overall hospitalization and mortality related to CHF patients (Antonicelli, et. al. 2010).
	</li>
	<li>Decrease overall complications related to CHF
	</li>
	<li>Make CHF easy to manage from home
	</li>
	<li>Providing 24/7 availability to patients that have questions about their condition
    </li>
	</ol>
</div>

<div id="sidebar" >
	<h1> Please Login</h1>
	<?php echo form_open('admin'); ?>
	<p>
	   <?php 
		  echo form_label('Email Address: ', 'email_address');
		  echo form_input('email_address', set_value('email_address'), 'id="email_address" autofocus');
	   ?>
	</p>

	<p>
	   <?php 
		  echo form_label('Password: ', 'password');
		  echo form_password('password', '', 'id="password"');
	   ?>
	</p>

	<p align="center">
	   <?php echo form_submit('submit', 'Login'); ?>
	</p>
	<?php echo form_close(); ?>
	<div class ="errors"> 
		<?php echo validation_errors(); ?> 
	</div>
	<div class="register">
		<a href="http://localhost/CHFsite/index.php/register">Register Now</a></br>
		<a href="http://localhost/CHFsite/index.php/forgot_password">Reset password</a>
	</div>
</div>
</div> 
</body>
</html>	

