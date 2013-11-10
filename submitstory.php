<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">
		#box {
			margin-left: 15%;
		}
		#infoBox{
			width: 10%;
			margin-left: 10px;
		}
		
	</style>
</head>
<body>
	<?php
		print_header("submitstory");
	?>
	<section id="infobox">
		<?php
			
			echo '<h4>Genre: <h4>';
			echo '<h4>From Prompt: <h4>';
			
		?>
</section>

	<section id="box">
			<form method="post" action="submitstorydo.php">
			<input name="name" type="text" placeholder="Title*" /><br>
			<select name="rating" size="1">
			<option value="NA" selected> Select One</option>
			<option value="G">G </option>
			<option value="PG-13">PG-13</option>
			<option value="R">R</option>
			</select><br>
			<textarea name="story"></textarea><br>
			<button type="submit">Submit Story</button>
		</form>
	
	</section>
</body>
</html>