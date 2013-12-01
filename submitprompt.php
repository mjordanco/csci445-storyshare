<html>
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
		select {
				width: 30%;
				height: 30px;
				font-size: 20px;	
		}	
        button {
            font-size: large;
            border-radius: 1px;
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
			<select name="category">
  				 <option value="Noe" selected> Select One</option>
  				<option value="Action">Action</option>
  				<option value="Adventure">Adventure</option>
  				<option value="Comedy">Comedy</option>
  				<option value="Drama">Drama</option>
                <option value="Fantasy">Fantasy</option>
 				<option value="History">History</option>
  				<option value="Horror">Horror</option>
  				<option value="Romance">Romance</option>
  				<option value="Scifi">Sci-Fi</option>
                <option value="Other">Other</option>
			</select> <br>
			<textarea name="prompt" required maxlength="250"></textarea><br>
			<button type="submit">Submit Prompt</button>
		</form>
	</section>
</body>
</html>