<html>
<head>
	<?php
	require_once('phplibs.php');
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">
		#signinbox {
			float: left;
			width: 10%;
			margin-left: 10px;
		}
		#box {
			margin-left: 20%;
		}
		#box2 {
			margin-left: 20%;
		}
		#submittedText {
			width: 30%;
			padding: 15px;
			height: 150px;
		}
		#submittedText2 {
			width: 30%;
			padding: 15px;
			height: 150px;
		}
		select{
				padding: 15px;
				height: 135px !important;
				width: 95% !important;
		}
	</style>
</head>
<body>
	<?php
	$page = "";
	if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $_GET['user_id']) {
		$page = "yourprofile";
	}
	print_header($page);
	?>
	
	<br>
	<br>
<section id="signinbox">
		<?php
			$user_id = $_GET['user_id'];

			$db = open_db();

			$query = 'SELECT * FROM users WHERE id = ' . $user_id;
			$result = $db->query($query);

			$row = mysqli_fetch_array($result);

			echo '<h2>Username: ' . $row['username'] . '</h2>';
			echo '<h3>' . $row['firstname'] . ' ' . $row['lastname'] . '</h3>';
			user_stats($user_id);
		?>
</section>
<section id="box">
<div id="submittedText">
			<?php
			echo "<form action='trophies.php?user_id=\"$user_id\"' method='POST'>";
			display_user_prompts_drop($user_id);
			?>
</form>
				
</div>
</section>
<section id="box2">
<div id="submittedText2">
			<?php
			echo "<form action='trophies.php?user_id=\"$user_id\"' method='POST'>";
			display_user_stories_drop($user_id);
			echo "</form>";
			?>
				
</div>
</section>

</body>
</html>