<head>
	<?php
		include_once('phplibs.php');
	?>
	<style type="text/css">
		#submit_box {
			width:75%;
			background-color: #8493CA;

			border-style: solid;
			border-width: 1px;

			padding: 20px;
		}
	</style>
</head>
<body>   
	<?php
		print_header("");
	?>

	<section id="submit_box">
		<?php
           
            $db = open_db();

			$title = $_POST['title'];
			$genre = $_POST['genre'];
			$rating = $_POST['rating'];
			$story = $_POST['story'];
			
            $prompt_id = $_SESSION['prompt_id'];
            $user_id = $_SESSION['user_id'];
	        $points = 0;
            $submit_date = date("Y-m-d");

			if ($title == "" || $genre == "" || $rating == "" || $story == "") {
				echo 'All fields must be filled out to submit a story! Go back and try again!';
			}

			submit_story($title, $genre, $rating, $story, $prompt_id, $user_id, $points, $submit_date);
            echo "Just called our submit story function";
			header('Location: ./');
		
		?>
	</section>
</body>
</html>