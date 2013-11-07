<html>
<head>
	<?php
	require_once('phplibs.php');
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
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
	print_header(0);
	?>

<section id="signinbox">
	<center>
		<?php
			$user_id = $_GET['user_id'];

			@ $db = new mysqli('localhost', 'root', '', 'storyshare');
			if (mysqli_connect_errno()) {
	 			echo 'Error: Could not connect to database. Please try again later.';
	 			exit;
			}

			$query = 'SELECT * FROM users WHERE id = ' . $user_id;
			$result = $db->query($query);

			$row = mysqli_fetch_array($result);

			echo '<h1>Username: ' . $row['username'] . '</h1>';
			echo '<h2>' . $row['firstname'] . ' ' . $row['lastname'] . '</h2>';
		?>
	</center>
</section>
</body>
</html>