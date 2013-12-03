<html>
<head>
	<?php
	require_once('phplibs.php');
	$user_id = $_GET['user_id'];
	
	
	
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">
		#signinbox {
			float: left;
			width: 10%;
			margin-left: 10px;
		}
		#box {
		overflow: hidden;
			margin-left: 20%;
		}
		#box2 {
		overflow: hidden;
			margin-left: 20%;
		}
		#submittedText {
			float:left;
			width: 30%;
			padding: 15px;
			height: 150px;
		}
		#submittedText2 {
			float: left;
			width: 30%;
			padding: 15px;
			height: 150px;
		}
		select{
				padding: 15px;
				height: 135px !important;
				width: 95% !important;
		}
		#displayP {
			float: right;
			width: 60%;
		}
		#displayS {
			float: right;
			width: 60%;
		}
		td.specialCell {
			background-color: #CC9922;
			 border: 1px solid #666633;
			 width: 25%;
			 min-width: 240px;
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
			

			$db = open_db();

			$query = 'SELECT * FROM users WHERE id = ' . $user_id;
			$result = $db->query($query);

			$row = mysqli_fetch_array($result);

			echo '<h2>Username: ' . $row['username'] . '</h2>';
			print_gravatar($user_id);
			echo '<h3>' . $row['firstname'] . ' ' . $row['lastname'] . '</h3>';
			user_stats($user_id);
		?>
</section>
<section id="box">
<div id="submittedText">
			<?php
			echo "<form action='profile.php?user_id=$user_id' method='POST'>";
			display_user_prompts_drop($user_id);
			echo "</form>";
			
			?>
				
</div>

<div id="displayP">
	<?php
	if(isset($_POST["prompts"]) && !empty($_POST["prompts"])){
				$name = $_POST['prompts'];
				display_prompts_user($user_id , $name);
				
			}
	?>
</div>
</section>
<section id="box2">
<div id="submittedText2">
			<?php
			echo "<form action='profile.php?user_id=$user_id' method='POST'>";
			display_user_stories_drop($user_id);
			echo "</form>";
			?>
				
</div>
<div id="displayS">
	<?php
	if(isset($_POST["stories"]) && !empty($_POST["stories"])){
				$name = $_POST['stories'];
				display_stories_user($user_id , $name);
				
			}
	?>
</div>
</section>

</body>
</html>