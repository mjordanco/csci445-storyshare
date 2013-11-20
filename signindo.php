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
		$db = open_db();

		$username = $_POST['user'];
		$password = $_POST['pass'];

		$user_id = verify_user($username, $password);

		if ($user_id != NULL) {
			$_SESSION['user_id'] = $user_id;

			header('Location: ./');
		}

		$validity_query = "SELECT id, password FROM users WHERE username = '" . $username . "';";
		$result = $db->query($validity_query);

		while($row = mysqli_fetch_array($result)) {
			$valid = $row['password'] == $password;
			
		}
	?>


	<?php
	   print_header("");
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