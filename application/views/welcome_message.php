<?php include "header.php"; ?>
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<h1> Welcome <?php echo $_SESSION['username'] ?></h1>
<h1>Enter your daily values here:</h1> 


<?php echo form_open('record_data');?> 

<p>
   <?php 
      echo form_label('Heart Rate: ', 'heart_rate');
      echo form_input('heart_rate', '', 'id="heart_rate"');
   ?>
</p>
<p>
   <?php 
      echo form_label('Systolic Blood Pressure: ', 'sbp');
      echo form_input('sbp', '', 'id="sbp"');
   ?>
</p>
<p>
   <?php 
      echo form_label('Diastolic Blood Pressure: ', 'dbp');
      echo form_input('dbp', '', 'id="dbp"');
   ?>
</p>

<p>
   <?php 
      echo form_label('Weight: ', 'weight');
      echo form_input('weight', '', 'id="weight"');
   ?>
</p>

<p>
   <?php echo form_submit('submit', 'Submit data'); ?>
</p>
<?php echo form_close(); ?>
<div class ="errors"> 
	<?php echo validation_errors(); ?> 
</div>
</body>
</html>
