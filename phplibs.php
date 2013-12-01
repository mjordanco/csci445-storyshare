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
		echo '<li class="signin last ';
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
		
		echo '<li class="signin last ';
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

	$salt = '$2a$%13$' . mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

	$encrypted_password = crypt($password, $salt);
	
	$add_query = 'INSERT INTO users(username, password, firstname, lastname) VALUES("' . $username . '", "' . $encrypted_password . '", "' . $firstname . '", "' .$lastname . '")';
	$db->query($add_query);

	$user_id = $db->insert_id;

	$_SESSION['user_id'] = $user_id;

	return $user_id;
}

function verify_user($username, $password) {

	$db = open_db();

	$get_hash_query = 'SELECT password, id FROM users WHERE username ="' . $username .'";';
	$response = $db->query($get_hash_query);

	$row = mysqli_fetch_array($response);

	$hash = $row['password'];

	$crypt_result = crypt($password, $hash);

	if ($crypt_result == $hash) {
		return $row['id'];
	} else {
		return NULL;
	}

}

function get_prompts( $category) {

	$db = open_db();

	$query = 'SELECT name, prompt, points from prompts where category = "'. $category.'"' ;
	//echo $add_query;
	$stmt = $db->prepare($query);
		$stmt->execute();
		$res = $stmt->get_result();
		$numRows = $res->num_rows;
		$i =0;
		echo "<tr>";
		for($row=0 ; $row<$numRows; $row++ ){
			$tRow =$res->fetch_assoc();
			if($i ==5){
				echo "</tr><tr>";
				$i = 0;
			}
			echo "<td><ul><li>".$tRow['name']." </li> <li>".$tRow['prompt']."</li><li>".$tRow['points']."</li></ul></td>";
			++$i;
		}
		$stmt->close();
	
	
	return 0;
	
	
}

function submit_prompt($name, $category, $prompt, $points, $user_id) {
	$db = open_db();

	$curdate = date('Y-m-d h:i:s');
	$add_query = 'INSERT INTO prompts(name, category, prompt, points, submit_date, user_id) VALUES("'.$name.'", "'. $category.'", "'.$prompt.'", "'.$points.'", "'.$curdate.'", "'.$user_id.'")';
	echo $add_query;
	$db->query($add_query);

	$prompt_id = $db->insert_id;
	echo $prompt_id;

	return $prompt_id;
}

function submit_story($name, $genre, $rating, $story, $prompt_id, $user_id, $points) {
    $db = open_db();
    
	$date = date('Y-m-d h:i:s');
    
	$add_query = 'INSERT INTO stories(name, genre, rating, story, prompt_id, user_id, points, submit_date) VALUES("'.$name.'", "'.$genre.'", "'.$rating.'", "'.$story.'", "'.$prompt_id.'", "'.$user_id.'", 0, "'.$date.'")';
	echo $add_query;
    $db->query($add_query);
	/*$result = $db->query($add_query);
    
    if ($result) {
        echo $db->affected_rows." was successfully submitted.";
    } else {
        echo "An error has occured. The item was not submitted.";
    }*/
    
	$story_id = $db->insert_id;
	echo $story_id;

	return $story_id;
}

function display_table($name, $genre) {
    $db = open_db(); 
    $query = "SELECT * FROM $name";
    $result = $db->query($query);
    $num_results = $result->num_rows;

    echo "<table id='names'>";
    $column = 0;
    $entries = 0;
    for ($i=0; $i < $num_results; $i++) {
        if ($column == 0) {
            echo "<tr>";
        }
        if ($column == 4) {
            echo "</tr>";
            $column = 0;
        }
                    
        $row = $result->fetch_assoc();
        echo "<td>".$row['name']."</td>";
        $column++;
        $entries++;
    }
    
    while ($entries < 20) {
        if ($column == 0) {
            echo "<tr>";
        }
        if ($column == 4) {
            echo "</tr>";
            $column = 0;
        }
                
        echo "<td></td>";
        $column++;
        $entries++;
    }

    echo "</table>";
    echo "<br>";
}

session_start();

?>