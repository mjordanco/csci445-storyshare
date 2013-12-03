<head>
	<?php
		include_once('phplibs.php');
	?>
	<style type="text/css">
		#submit_box {
			width:75%;
			background-color: #8A0000;

			border-style: solid;
			border-width: 1px;

			padding: 20px;
		}
	</style>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>   
	<?php
		print_header("");
	?>

	<section id="submit_box">
		<?php
			$name = $_POST['name'];
			$genre = $_POST['genre'];
			$rating = $_POST['rating'];
			$story = $_POST['story'];
            $safe_story = addslashes($story);

            $prompt_id = $_POST['prompt_id'];
            $user_id = $_SESSION['user_id'];
	        $points = 0;

			if ($name == "" || $genre == "" || $rating == "" || $story == "") {
				echo 'All fields must be filled out to submit a story! Go back and try again!';
			}

			submit_story($name, $genre, $rating, $safe_story, $prompt_id, $user_id, $points);
		?>
	</section>
</body>
</html>