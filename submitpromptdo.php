<html>
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
			$genre = $_POST['genre'];
			$prompt = $_POST['prompt'];
            $safe_prompt = addslashes($prompt);

			$points = 0;
			$user_id = $_SESSION['user_id'];

			if ($name == "" || $genre == "" || $prompt == "") {
				echo 'All fields must be filled out to submit a prompt! Go back and try again!';
			}

			submit_prompt($name, $genre, $safe_prompt, $points, $user_id);

			header('Location: ./');

		?>
	</section>
</body>
</html>