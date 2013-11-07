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
		print_header("submitprompt");
	?>

	<section id="submit_box">
		<form method="post" action="submitpromptdo.php">
			<input name="name" type="text" placeholder="Prompt Name..." /><br>
			<input name="category" type="text" placeholder="Category..." /><br>
			<textarea name="prompt"></textarea><br>
			<button type="submit">Submit Prompt</button>
		</form>
	</section>
</body>
</html>