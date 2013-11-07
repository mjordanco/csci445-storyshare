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

		#signinbox button {
			margin-top: 40px;
		}
	</style>
</head>
<body>
	<?php
	print_header(0);
	?>

	<section id="signinbox">
		<center>
			<h1>Sign in to StoryShare</h1>
			<form method="post" action="signindo.php">
				<input type="text" placeholder="Username" name="user"/><br>
				<input type="password" placeholder="Password" name="pass"/><br>
				<button type="submit">Sign In</button><br><br>
			</form>
			<a href="./register.php">Or Register...</a>
		</center>
	</section>
</body>
</html>