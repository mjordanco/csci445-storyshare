<?php

function print_header($selected_index) {
	echo '
	<link rel="stylesheet" href="theme.css" />
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
		</li>';
	if (!isset($_SESSION['user_id'])) {
		echo '<li class="signin">
			<a href="./signin.php">Sign In</a>
			</li>';
	} else {
		echo '<li class="signin">
			<a href="./signout.php">Sign Out</a>
			</li>';
		echo '<li class="signin">
			<a href="./profile.php?user_id=' . $_SESSION['user_id'] . '">Your Profile</a>
			</li>';
	}
	echo '
		</ul>
		</header>
		';
	
}

session_start();

?>