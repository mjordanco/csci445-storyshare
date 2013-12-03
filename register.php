<html>
<head>
	<?php
	require_once('phplibs.php');
	?>
	<style type="text/css">
		#signinbox {
			width: 50%;
			margin-left: auto;
			margin-right: auto;
		}
		#signinbox button {
			margin-top: 20px;
		}

		#signinbox h1 {
			margin-bottom: 0px;
			font-size: 40px;
			font-weight: 100;
		}

		#signinbox h2 {
			margin-top: 10px;
			margin-bottom: 30px;
		}
	</style>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>
	<?php
	print_header("");
	?>

	<section id="signinbox">
		<center>
			<h1>Register for StoryShare</h1>
			<h2>StoryShare is a website devoted to creative authorship.</h2>
			<form method="post" action="registerdo.php">
				<input type="text" placeholder="Username..." name="user"/><br>
				<input type="password" placeholder="Password..." name="pass"/><br>
				<input type="password" placeholder="Re-type Password..." name="pass_again"/><br>
				<input type="text" placeholder="First Name" name="first"/><br>
				<input type="text" placeholder="Last Name" name="last"/><br>
				<input type="text" placeholder="Email" name="email"/><br>
				<button type="submit">Register</button><br><br>
			</form>
		</center>
	</section>
</body>
</html>