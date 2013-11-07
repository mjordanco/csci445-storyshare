<html>
<head>
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
			session_start();
			if (!isset($_SESSION['user_id'])) {
				echo '<li class="signin">
					<a href="./signin.html">Sign In</a>
					</li>';
			} else {
				echo '<li class="signin">
					<a href="./signout.php">Sign Out</a>
					</li>';
				echo '<li class="signin selected">
					<a href="./profile.php?user_id=' . $_SESSION['user_id'] . '">Your Profile</a>
					</li>';
			}
		?>
		
	</ul>
</header>

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