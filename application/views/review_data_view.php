<?php include "header.php"; ?>
<head>
   <meta charset="utf-8">
   <title>Login</title>
   <style> label { display: block; } .errors { color: red; }</style>
</head>
	<body>
		<h1>You entered:</h1>
		<p>Heart rate: <?php echo $_SESSION['heartrate'] ?></p>
		<p>Systolic BP: <?php echo $_SESSION['sbp'] ?></p>
		<p>Diatolic BP: <?php echo $_SESSION['dbp'] ?></p>
		<p>Weight: <?php echo $_SESSION['weight'] ?></p>
		<a href="http://localhost/CHFsite/index.php/logout">Logout</a>
	</body>
</html>	