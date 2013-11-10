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
		form {
				margin-left: 22%;
				display: block;
				padding : 5px;
		}
		input, button {
			margin-top: 10px;
		}
		textarea{
			margin-top: 10px;
			width: 74%;
			resize: none;
			height: 14%;
		}
		
		
	</style>
</head>
<body>
	<?php
		print_header("submitprompt");
	?>

	<section id="submit_box">
		<form method="post" action="submitpromptdo.php">
			<input name="name" type="text" placeholder="Prompt Name..." required/><br>
			<input name="category" type="text" placeholder="Category..." required/><br>
			<textarea name="prompt" required maxlength="250"></textarea><br>
			<button type="submit">Submit Prompt</button>
		</form>
	</section>
</body>
</html>