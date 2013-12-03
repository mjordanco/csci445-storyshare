<html>
<head>
	<?php
	require_once('phplibs.php');
	?>
	<link rel="stylesheet" href="theme.css" />
	<style type="text/css">
		#signinbox {
			width: 50%;
			margin-left: auto;
			margin-right: auto;
		}
	</style>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>
	<?php
	$_SESSION['user_id'] = null;
	print_header("");
	?>

	<section id="signoutbox">
		<center>
			
			<h1>You have signed out...</h1>
		</center>
	</selction>
</body>
</html>