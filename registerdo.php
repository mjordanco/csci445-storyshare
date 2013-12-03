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
		$password_again = $_POST['pass_again'];
		$firstname = $_POST['first'];
		$lastname = $_POST['last'];
		$email = $_POST['email'];

		$_SESSION['error'] = '';

		if ($username == "" || $password == "" || $firstname == "" || $lastname == "") {
			$_SESSION['error'] .= '<h1>All registration fields are required.</h1>';
		}

		if ($password != $password_again) {
			$_SESSION['error'] .= '<h1>Your password fields didn\'t match.</h1>';
		}

		if ($_SESSION['error'] == '') {
			$_SESSION['error'] = null;
		}

		if (!isset($_SESSION['error'])) {
			$unique_query = "SELECT id, password FROM users WHERE username = '" . $username . "';";
			$result = $db->query($unique_query);

			$row = mysqli_fetch_array($result);
			if (!$row) {
				register_user($username, $password, $firstname, $lastname, $email);
			} else {
				$_SESSION['error'] = '<h1>Unfortunately, that username was already taken. Please go back and try again!</h1>';
			}
		}

		

	?>

	<?php
	print_header("");
	?>

	<section id="signinbox">
		<center>
			<?php
				if (isset($_SESSION['user_id'])) {
					echo '<h1>Congrats, you are registered and signed in!</h1>';
				} else {
					echo $_SESSION['error'];
					echo '<h1>Please go back and try again!</h1>';
					$_SESSION['error'] = null;
				}
			?>
		</center>
	</section>
</body>
</html>