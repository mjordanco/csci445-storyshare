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
</head>
<body>
	<?php

		@ $db = new mysqli('localhost', 'root', '', 'storyshare');
		if (mysqli_connect_errno()) {
 			echo 'Error: Could not connect to database. Please try again later.';
 			exit;
		}

		$username = $_POST['user'];
		$password = $_POST['pass'];

		$validity_query = "SELECT id, password FROM users WHERE username = '" . $username . "';";
		$result = $db->query($validity_query);

		while($row = mysqli_fetch_array($result)) {
			$valid = $row['password'] == $password;
			if ($valid) {
				$user_id = $row['id'];
				$_SESSION['user_id'] = $user_id;
			}
		}
	?>


	<?php
	print_header(0);
	?>

	<section id="signinbox">
		<center>
			<?php
				if (isset($_SESSION['user_id'])) {
					echo '<h1>Sign in was successful!</h1>';
				} else {
					echo '<h1>There was a problem with your sign in. Please try again!</h1>';
				}
			?>
		</center>
	</section>
</body>
</html>