<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
	<style type="text/css">
		#promptbox {
			margin-top: 10px;
			margin-left: 25%;
		}
		#pName {
			margin-top: 10px;
			float: left;
			text-align: left;
			font-size: 25px;
		}
		#storybox {
			margin-top: 10px;
			margin-left: 25%;
		}
		#sName {
			margin-top: 10px;
			float: left;
			text-align: left;
			font-size: 25px;
		}
	</style>
</head>
<body>
	<?php
		print_header("trophies");
	?>
	<br>
	<br>
	<br>
<div id="pName">
Prompts:
</div>
<section id="promptbox">
	<?php 
		$startweek = "2013-11-18";
		$stopweek = "2013-12-01";
		display_prompts_trophies($startweek, $stopweek);
	?>
</section>	

<div id="sName">
Stories:
</div>
<section id="storybox">
	
</section>	
</body>
</html>