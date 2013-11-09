<html>
<head>
	<?php
	require_once('phplibs.php');
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">
		#signinbox {
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
			
			padding: 15px;
			height: 150px;
		}
		#submittedText2 {
			
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

<section id="signinbox">
		<?php
			$user_id = $_GET['user_id'];

			$db = open_db();

			$query = 'SELECT * FROM users WHERE id = ' . $user_id;
			$result = $db->query($query);

			$row = mysqli_fetch_array($result);

			echo '<h2>Username: ' . $row['username'] . '</h2>';
			echo '<h3>' . $row['firstname'] . ' ' . $row['lastname'] . '</h3>';
			echo '<h4>Total Stories: <h4>';
			echo '<h4>Total Prompts: <h4>';
			echo '<h4>Total Trophies: <h4>';
			echo '<h4>Total points: <h4>';
		?>
</section>
<section id="box">
<div id="submittedText">
		
			<select name="listbox" size="3">
			<option value="Option 1" selected>Prompt 1</option>
			<option value="Option 2">Prompt 2</option>
			<option value="Option 3">Prompt 3</option>
			</select>
				
</div>
</section>
<section id="box2">
<div id="submittedText2">
		
			<select name="listbox2" size="3">
			<option value="Option 1" selected>Story 1</option>
			<option value="Option 2">Story 2</option>
			<option value="Option 3">Story 3</option>
			</select>
				
</div>
</section>

</body>
</html>