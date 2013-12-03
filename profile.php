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
			width: 200px;
			margin-left: 10px;
            position: absolute;
            color: white;
            font-size: large;
		}
		#box {
            float: center;
		    overflow: hidden;
			margin-left: 30%;
            width: 60%;
            font-size: medium;
		}
		#box2 {
            float: center;
		    overflow: hidden;
			margin-left: 30%;
            width: 60%;
            font-size: medium;
		}
		#submittedText {
			float: left;
			width: 300px;
			padding: 15px;
			height: 150px;
            font-size: medium;
		}
		#submittedText2 {
			float: left;
			width: 300px;
			padding: 15px;
			height: 150px;
            font-size: medium;
		}
		select{
            padding: 15px;
            height: 135px !important;
            width: 95% !important;
		}
		#displayP {
            margin: 20px 20px 20px 20px;
			float: right;
			width: 300px;
		}
		#displayS {
            margin: 20px 20px 20px 20px;
			float: right;
			width: 300px;
		}
		td.specialCell {
            margin: 20px 20px 20px 20px;
            padding: 10px 10px 10px 10px;
			background-color: #CC9922;
            border: 1px solid #666633;
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