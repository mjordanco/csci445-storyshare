<?php

function print_header($selected_page) {
	echo '
	<link rel="stylesheet" href="theme.css" />
	<header>
	<div id="title">
		<h1>StoryShare</h1><br>
		<h2>A place to let your imagination run wild!</h2>
	</div>
	<ul id="menu">';

		echo '<li';
		if ($selected_page == "index") {
			echo ' class="selected"';
		}
		echo '>
			<a href="./">Home</a>
		</li>';

		echo '<li';
		if ($selected_page == "prompts") {
			echo ' class="selected"';
		}
		echo '>
			<a href="./prompts.php">All Prompts</a>
		</li>';

		echo '<li';
		if ($selected_page == "stories") {
			echo ' class="selected"';
		}
		echo '>
			<a href="./stories.php">All Stories</a>
		</li>';

		echo '<li';
		if ($selected_page == "trophies") {
			echo ' class="selected"';
		}
		echo '>
			<a href="./trophies.php">Weekly Trophies</a>
		</li>';


	if (!isset($_SESSION['user_id'])) {
		echo '<li class="signin';
		if ($selected_page == "signin") {
			echo ' selected';
		}
		echo '">
			<a href="./signin.php">Sign In</a>
			</li>';
	} else {
		echo '<li';
		if ($selected_page == "submitprompt") {
			echo ' class="selected"';
		}
		echo '>
			<a href="./submitprompt.php">Submit Prompt</a>
		</li>';
		#This is so that we can see the page.
		echo '<li';
		if ($selected_page == "submitstory") {
			echo ' class="selected"';
		}
		echo '>
			<a href="./submitstory.php">Submit Story</a>
		</li>';
		
		echo '<li class="signin';
		if ($selected_page == "signout") {
			echo ' selected';
		}
		echo '">
			<a href="./signout.php">Sign Out</a>
			</li>';
		echo '<li class="signin';
		if ($selected_page == "yourprofile") {
			echo ' selected';
		}
		echo '">
			<a href="./profile.php?user_id=' . $_SESSION['user_id'] . '">Your Profile</a>
			</li>';
	}
	echo '
		</ul>
		</header>
		';
	
}

function open_db() {
	@ $db = new mysqli('localhost', 'team12', 'grapefruit', 'team12_storyshare');
	if (mysqli_connect_errno()) {
		echo 'Error: Could not connect to database. Please try again later.';
		return null;
	}

	return $db;
}

function print_feature($table, $id) {

	$db = open_db();

	$query = "SELECT * FROM " . $table . "WHERE id = " . $id;

}

function register_user($username, $password, $firstname, $lastname) {

	$db = open_db();
	
	$add_query = 'INSERT INTO users(username, password, firstname, lastname) VALUES("' . $username . '", "' . $password . '", "' . $firstname . '", "' .$lastname . '")';
	$db->query($add_query);

	$user_id = $db->insert_id;

	$_SESSION['user_id'] = $user_id;

	return $user_id;
}

function submit_prompt($name, $category, $prompt, $points, $user_id) {

	$db = open_db();

	$curdate = date('Y-m-d h:i:s');
	$add_query = 'INSERT INTO prompts(name, category, prompt, points, submit_date, user_id) VALUES("' . $name . '", "' . $category . '", "' . $prompt . '", "' . $points .'","'. $curdate  .'", ' . $user_id . ')';
	echo $add_query;
	$db->query($add_query);

	$prompt_id = $db->insert_id;
	echo $prompt_id;

	return $prompt_id;
	
	
}
function submit_story($title, $genre, $rating, $story, $prompt_id, $user_id, $points, $submit_date){
	$db = open_db();
	$submit_date = date('Y-m-d');
	$add_query = 'INSERT INTO stories(title, genre, rating, story, prompt_id, user_id, points, submit_date) VALUES("' . $title . '", "' . $genre . '", "' . $rating . '", "' . $story . '", "' . 1 . '","' . $user_id . '", "'. $points .'", ' . $submit_date . ')';
	echo $add_query;
	$db->query($add_query);

	$story_id = $db->insert_id;
	echo $story_id;

	return $story_id;
}

session_start();

?>