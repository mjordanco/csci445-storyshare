<html>
<head>
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
		session_start();

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


	<header>
		<div id="title">
			<h1>StoryShare</h1><br>
			<h2>A place to let your imagination run wild!</h2>
		</div>
		<ul id="menu">
			<li class="">
				<a href="./">Home</a>
			</li>
			<li>
				<a href="./">All Prompts</a>
			</li>
			<li>
				<a href="./">All Stories</a>
			</li>
			<li>
				<a href="./">Weekly Trophies</a>
			</li>
			<?php
				if (session_status() == PHP_SESSION_NONE) {
    				session_start();
				}
				if (!isset($_SESSION['user_id'])) {
					echo '<li class="signin">
						<a href="./signin.html">Sign In</a>
						</li>';
				} else {
					echo '<li class="signin">
						<a href="./signout.php">Sign Out</a>
						</li>';
					echo '<li class="signin">
						<a href="./profile.php?user_id=' . $_SESSION['user_id'] . '">Your Profile</a>
						</li>';
				}
			?>
			
		</ul>
	</header>

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