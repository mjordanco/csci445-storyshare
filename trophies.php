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
			background-color: #8A0000;
			color: white;
		}
		#storybox {
			margin-top: 10px;
			margin-left: 25%;
		}
		#sName {
			margin-top: 10px;
			background-color: #8A0000;
			float: left;
			text-align: left;
			font-size: 25px;
			color: white;
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
		$day = date('w');
		$startweek = date('Y-m-d', strtotime('-'.$day.' days'));
		$stopweek = date('Y-m-d', strtotime('+'.(6-$day).' days'));
		echo "week start: ".$startweek."    end week: ". $stopweek;
		display_prompts_trophies($startweek, $stopweek);
	?>
</section>	

<div id="sName">
Stories:
</div>
<section id="storybox">
	<?php 
		$day = date('w');
		$startweek = date('Y-m-d', strtotime('-'.$day.' days'));
		$stopweek = date('Y-m-d', strtotime('+'.(6-$day).' days'));
		display_stories_trophies($startweek, $stopweek);
	?>
</section>	

<div id="sName">
Past Prompts:
</div>
<section id="storybox">
	<?php 
		$startweek = "2013-11-17";
		$stopweek = "2013-12-01";
		display_stories_trophies($startweek, $stopweek);
	?>
</section>	
</body>
</html>