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
		$password_again = $_POST['pass_again'];
		$first_name = $_POST['first'];
		$last_name = $_POST['last'];

		$validity_query = "SELECT id, password FROM users WHERE username = '" . $username . "';";
		$result = $db->query($validity_query);

		$row = mysqli_fetch_array($result);
		if (!$row) {
			$add_query = 'INSERT INTO users(username, password, firstname, lastname) VALUES("' . $username . '", "' . $password . '", "' . $first_name . '", "' .$last_name . '")';
			echo $add_query;
			$db->query($add_query);

			$user_id = $db->insert_id;

			$_SESSION['user_id'] = $user_id;
		}

	?>

	<?php
	print_header(0);
	?>

	<section id="signinbox">
		<center>
			<?php
				if (isset($_SESSION['user_id'])) {
					echo '<h1>Congrats, you are registered and signed in!</h1>';
				} else {
					echo '<h1>Unfortunately, that username is already taken. Please try again!</h1>';
				}
			?>
		</center>
	</section>
</body>
</html>