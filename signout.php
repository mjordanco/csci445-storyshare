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
	<header>
		<div id="title">
			<h1>StoryShare</h1><br>
			<h2>A place to let your imagination run wild!</h2>
		</div>
		<ul id="menu">
			<li>
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
			<li class="signin">
				<a href="./signin.html">Sign In</a>
			</li>
		</ul>
	</header>

	<section id="signoutbox">
		<center>
			<?php
				session_start();
				$_SESSION['user_id'] = null;
			?>
			<h1>You have signed out...</h1>
		</center>
	</selction>
</body>
</html>