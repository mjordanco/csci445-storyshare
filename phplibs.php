<?php

function print_header($selected_page) {
    echo "<link rel='shortcut icon' href='/favicon.ico'>";
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
			<a href="./prompts.php?sortGenre=View All">All Prompts</a>
		</li>';

		echo '<li';
		if ($selected_page == "stories") {
			echo ' class="selected"';
		}
		echo '>
			<a href="./stories.php?sortGenre=View All">All Stories</a>
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

		$db = open_db();
		$query = "SELECT count(id) FROM prompts;";
		$result = $db->query($query);
		$row = $result->fetch_assoc();
		if ($row['count(id)'] > 0) {
			echo '<li';
			if ($selected_page == "submitstory") {
				echo ' class="selected"';
			}
			echo '>
				<a href="./submitstory.php">Submit Story</a>
			</li>';
		}

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

function register_user($username, $password, $firstname, $lastname, $email) {

	$db = open_db();

	$salt = '$2a$%13$' . mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

	$encrypted_password = crypt($password, $salt);
	
	$add_query = 'INSERT INTO users(username, password, firstname, lastname, email) VALUES("' . $username . '", "' . $encrypted_password . '", "' . $firstname . '", "' . $lastname . '", "' . $email . '")';
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
			echo "<td><ul class=\"pBox\"><li class=\"left\">Title:</li><li class=\"right\">".$tRow['name']." </li> 
			<li class=\"left\">Prompt:</li><li class=\"right\">".$tRow['prompt']."</li></ul><ul class =\"dispP\">
			<li class=\"poin\">Points: </li><li class=\"pright\">".$tRow['points']."</li></ul> 
			<div class=\"leftF\">
			<form method=\"post\" action=\"submitvotedo.php\"></form> <button type=\"submit\"><img src=\"./upArrow.bmp\"  width=\"20\" height=\"30\"></button></form>
			</div><div class =\"rightF\">
			<form method=\"post\" action=\"submitvotedo.php\"></form> <button type=\"submit\"><img src=\"./downArrow.bmp\"  width=\"20\" height=\"30\"></button></form></div></td>";
			++$i;
		}
		$stmt->close();
	
	
	return 0;
}

function submit_prompt($name, $genre, $prompt, $points, $user_id) {
	$db = open_db();

	$curdate = date('Y-m-d h:i:s');
	$add_query = 'INSERT INTO prompts(name, genre, prompt, points, submit_date, user_id) VALUES("'.$name.'", "'. $genre.'", "'.$prompt.'", "'.$points.'", "'.$curdate.'", "'.$user_id.'")';
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
    if ($db->query($add_query)) {
        echo "<p style='color: white; font-size: large;'>Your story was successfully submitted!</p>";
    } else {
    	echo $db->error;
    }
    
	$story_id = $db->insert_id;

	return $story_id;
}

       
function submit_vote($vote, $table, $name, $id, $updated_points) {            
    $db = open_db();
    $update = 'UPDATE '.$table.' SET points='.$updated_points.' WHERE id='.$id.'';
    $db->query($update);
    
    echo "<p style='color: white; font-size: x-large;'>Your ".$vote." vote for ".$name." was successfully submitted!</p>";
}

function display_table($name, $text, $genre) {
    $db = open_db(); 
    $query = 'SELECT * FROM ' . $name . ';';
    $result = $db->query($query);
    $num_results = $result->num_rows;

    echo "<h1 style='padding: 0px 0px 0px 15px; color: #CC0000;'>Current ".ucfirst($text)." Genre: ".$genre."</h1>";
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
        $storyID = $row['id'];
        if (($genre == "View All") || ($genre == $row['genre'])) {
            echo "<td id='specialCell' class='hoverClass'>";
                echo "<span class='noHover' OnClick='readStory(".$storyID.")'>".$row['name']."</span>";
            
                if ($text == "prompt") {
                    $str = $row['prompt'];
                } else {
                    $str = $row['story'];
                }
            
                if (strlen($str) > 100) {
                    $str = substr($str, 0, 100) . "...";
                }
                echo "<span class='hover' OnClick='readStory(".$storyID.")'>".$str."</span>";
            
            
            
            echo "<div class='arrows'>";
            echo "<form method='get' action='submitvotedo.php'><button type='submit' name='vote' value='up'><img src='upArrow.png' width='20' height='20'></button>";
                echo "<input type='hidden' name='table' value='".$name."'>";
                echo "<input type='hidden' name='name' value='".$row['name']."'>";
                echo "<input type='hidden' name='id' value='".$row['id']."'>";
                echo "<input type='hidden' name='points' value='".$row['points']."'>";
            echo "</form>";
            
            echo "<form method='get' action='submitvotedo.php'><button type='submit' name='vote' value='down'><img src='downArrow.png' width='20' height='20'></button>";
                echo "<input type='hidden' name='table' value='".$name."'>";
                echo "<input type='hidden' name='name' value='".$row['name']."'>";
                echo "<input type='hidden' name='id' value='".$row['id']."'>";
                echo "<input type='hidden' name='points' value='".$row['points']."'>";
            echo "</form>";
            echo "</div>";
            
            echo "</td>";
            
            $column++;
            $entries++;
        } 
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

function displayStory($storyID) {
        $db = open_db(); 
        $query = "SELECT * FROM stories WHERE id=$storyID";
        $result = $db->query($query);
        $storyRow = $result->fetch_assoc();
    
        echo "<h2 style='color: #CC0000;'>".$storyRow['name']."</h2>";
        echo "<br>";
        echo "<pre><span class='forPre' style='font-size: medium; font-family: 'Times New Roman', Times, serif'>".wordwrap(stripslashes($storyRow['story']), 115, "\n", false)."</span></pre>";
}

function getUserName($userId){
	$userName = "";
	 $db = open_db(); 
    $query = "SELECT * FROM users Where id= \"$userId\" ";
    $result = $db->query($query);
    $num_results = $result->num_rows;
	if($num_results == 1){
		$row = $result->fetch_assoc();
		$userName = $row['username'];
	}
	return $userName;
}

function display_prompts_trophies($startweek, $stopweek) {
    $db = open_db(); 
    $query = "SELECT * FROM prompts Where submit_date < \"$stopweek\" AND submit_date > \"$startweek\" ORDER BY points DESC LIMIT 4";
    $result = $db->query($query);
    $num_results = $result->num_rows;
	$tNames = array("Gold", "Silver", "Bronze");
    #echo "<h1 style='padding: 0px 0px 0px 15px; color: #CC0000;'>Current ".ucfirst($text)." Genre: ".$genre."</h1>";
    echo "<table id='names'>";
    $column = 0;
    $entries = 0;
    for ($i=0; $i < 3; $i++) {
        if ($column == 0) {
            echo "<tr>";
        }
        if ($column == 4) {
            echo "</tr>";
            $column = 0;
        }
        
        $row = $result->fetch_assoc();
            echo "<td class='specialCell'>";
				echo "<h3> $tNames[$i] </h3>";
                echo "UserName: ".getUserName($row['user_id'])."<br>";
				echo "Points: ".$row['points']."<br>";
				echo "Genre: ".$row['genre']."<br>";
                echo "<span class='hover'>".$row['prompt']."</span>";
               
            echo " </td>";
            $column++;
        
		
    }
	echo "</tr>";
    echo "</table>";
    echo "<br>";
}

function display_stories_trophies($startweek, $stopweek) {
    $db = open_db(); 
    $query = "SELECT * FROM stories Where submit_date < \"$stopweek\" AND submit_date > \"$startweek\" ORDER BY points DESC LIMIT 4";
    $result = $db->query($query);
    $num_results = $result->num_rows;
	$tNames = array("Gold", "Silver", "Bronze");
    #echo "<h1 style='padding: 0px 0px 0px 15px; color: #CC0000;'>Current ".ucfirst($text)." Genre: ".$genre."</h1>";
    echo "<table id='names'>";
    $column = 0;
    $entries = 0;
    for ($i=0; $i < 3; $i++) {
        if ($column == 0) {
            echo "<tr>";
        }
        if ($column == 4) {
            echo "</tr>";
            $column = 0;
        }
        
        $row = $result->fetch_assoc();
            echo "<td class='specialCell'>";
				echo "<h3> $tNames[$i] </h3>";
                echo "UserName: ".getUserName($row['user_id'])."<br>";
				echo "Points: ".$row['points']."<br>";
				echo "Genre: ".$row['genre']."<br>";
                echo "<span class='hover'>".$row['story']."</span>";
               
            echo " </td>";
            $column++;
        
		
    }
	echo "</tr>";
    echo "</table>";
    echo "<br>";
}

function user_stats($userId){
	$userName = "";
	 $db = open_db(); 
    $query = "SELECT user_id, id, points FROM stories Where user_id= \"$userId\" ";
    $result = $db->query($query);
    $num_results = $result->num_rows;
	$pointsS =0;
	for($i=0; $i < $num_results; $i = $i +1){
		$row = $result->fetch_assoc();
		$pointsS = $pointsS + $row['points'];
	}
	echo "<h4>Total Stories: $num_results <h4>";
	$query = "SELECT user_id, id, points FROM prompts Where user_id= \"$userId\" ";
    $result = $db->query($query);
    $num_results = $result->num_rows;
	$pointsP =0;
	for($i=0; $i < $num_results; $i = $i +1){
		$row = $result->fetch_assoc();
		$pointsP = $pointsP + $row['points'];
	}
	echo "<h4>Total Prompts: $num_results<h4>";
	
	echo "<h4>Total Trophies: <h4>";
	$total = $pointsS + $pointsP;
	echo "<h4>Total points: $total <h4>";
}

function display_user_prompts_drop($userID){

                $db = open_db(); 
                $query = "SELECT user_id, name FROM prompts where user_id=\"$userID\"";
                $result = $db->query($query);
                $num_results = $result->num_rows;
				
                echo "<select name='prompts' size='5' id='prompts' onchange='this.form.submit()'>";
                for ($i=0; $i < $num_results; $i++) {
                    $row = $result->fetch_assoc();
                     echo "<option value=".$row['name'].">".$row['name']."</option>";
                }
                echo "</select>";
                echo "<br>";
}

function display_user_stories_drop($userID){

                $db = open_db(); 
                $query = "SELECT user_id, name FROM stories where user_id=\"$userID\"";
                $result = $db->query($query);
                $num_results = $result->num_rows;
				
                echo "<select name='stories' size='5' id='stoires' onchange='this.form.submit()'>";
                for ($i=0; $i < $num_results; $i++) {
                    $row = $result->fetch_assoc();
                     echo "<option value=".$row['name'].">".$row['name']."</option>";
                }
                echo "</select>";
                echo "<br>";
}

function display_prompts_user($userid , $name) {
    $db = open_db(); 
    $query = "SELECT * FROM prompts Where user_id=\"$userid\" AND name = \"$name\"";
    $result = $db->query($query);
    $num_results = $result->num_rows;
    #echo "<h1 style='padding: 0px 0px 0px 15px; color: #CC0000;'>Current ".ucfirst($text)." Genre: ".$genre."</h1>";
    echo "<table id='names'>";
    $column = 0;
    $entries = 0; 
		echo "<tr>";
        $row = $result->fetch_assoc();
            echo "<td class='specialCell'>";
				echo "<h3> $name </h3>";
				echo "Points: ".$row['points']."<br>";
				echo "Category: ".$row['category']."<br>";
                echo "Prompt: ".$row['prompt']."<br>";
               
            echo " </td>";
            $column++;
	echo "</tr>";
    echo "</table>";
    echo "<br>";
}

function display_stories_user($userid , $name) {
    $db = open_db(); 
    $query = "SELECT * FROM stories Where user_id=\"$userid\" AND name = \"$name\"";
    $result = $db->query($query);
    $num_results = $result->num_rows;
    #echo "<h1 style='padding: 0px 0px 0px 15px; color: #CC0000;'>Current ".ucfirst($text)." Genre: ".$genre."</h1>";
    echo "<table id='names'>";
    $column = 0;
    $entries = 0; 
		echo "<tr>";
        $row = $result->fetch_assoc();
            echo "<td class='specialCell'>";
				echo "<h3> $name </h3>";
				echo "Points: ".$row['points']."<br>";
                echo "story: ".$row['story']."<br>";
               
            echo " </td>";
            $column++;
	echo "</tr>";
    echo "</table>";
    echo "<br>";
}

function displayFeatured($table_name, $typeTitle, $body) {
        $db = open_db(); 
        $query = "SELECT * FROM $table_name";
        $result = $db->query($query);
        $num_results = $result->num_rows;
        $rand = rand(1, $num_results-1);

        for ($i=0; $i < $rand; $i++) {
            $row = $result->fetch_assoc();
        }
        $featured = $row;

        echo "<h1>Featured $typeTitle: ".$featured['name']."</h1>";
        
        $str = $featured[$body];
        if (strlen($str) > 1000) {
                $str = substr($str, 0, 1000) . "...";
        }
        echo "<p style='font-size: large;'>".$str."</p>";
    
	    echo "<div class='featured_bottom'>";
            echo "<h3>Submitted by ".getUserName($featured['user_id'])."</h3>";
            if ($table_name == "stories") {
		      echo "<button type='button' OnClick='readStory(".$featured['id'].")'>Continue Reading...</button>";
            }
	    echo "</div>";
}

function hash_email($email) {
	return md5( strtolower( trim( $email ) ) );
}

function print_gravatar($user_id) {
	$db = open_db();

	$query_str = 'SELECT email FROM users WHERE id = ' . $user_id . ';';
	
	if ($result = $db->query($query_str)) {
		$row = $result->fetch_assoc();
		$hashed_email = hash_email($row['email']);
		echo '<img src="http://www.gravatar.com/avatar/' . $hashed_email . '"></img>';
	}
}

session_start();

?>