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

			$name = $_POST['name'];
			$category = $_POST['genre'];
			$rating = $_POST['rating'];
			$story = $_POST['story'];
			$points = 0;
			$user_id = $_SESSION['user_id'];

			if ($name == "" || $category == "" || $story == "" || $rating == "") {
				echo 'All fields must be filled out to submit a story! Go back and try again!';
			}

			submit_story($name, $category, $rating, $story, $points, $user_id);

			header('Location: ./');
		
		?>
	</section>
</body>
</html>