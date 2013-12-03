<html>
<head>
	<?php
		include_once('phplibs.php');

		$day = date('w');
		$startweek = date('Y-m-d', strtotime('-'.$day.' days'));
		$stopweek = date('Y-m-d', strtotime('+'.(6-$day).' days'));

		$weekfrom = array();
		$weekto = array();
	$dateSa = $startweek;
	$dateSo = $stopweek;
for($i =0; $i < 3; $i = $i+1)
{
    $dateSa = date('Y-m-d', strtotime($dateSa. ' - 7 days'));
	$dateSo = date('Y-m-d', strtotime($dateSo. ' - 7 days'));
    array_push($weekfrom,$dateSa);
    array_push($weekto,$dateSo);
   
}
$n = count($weekfrom);

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
			padding: 15px;
			border-radius: 20px;
			color: white;
		}
		#storybox {
			margin-top: 10px;
			margin-left: 25%;
		}
		#sName {
			margin-top: 10px;
			background-color: #8A0000;
			padding: 15px;
			float: left;
			border-radius: 20px;
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
		
		echo "week start: ".$startweek."    end week: ". $stopweek;
		display_prompts_trophies($startweek, $stopweek);
	?>
</section>	

<div id="sName">
Stories:
</div>
<section id="storybox">
	<?php 
		
		display_stories_trophies($startweek, $stopweek);
	?>
</section>	

<div id="sName">
Past Prompts:
<br>
<form action="trophies.php" method="POST">
<?php
               
                echo "<select name='week' size='4' id='week' onchange='this.form.submit()'>";
               for($i =0; $i < 3;  $i = $i+1) {
                    $row = $weekfrom[$i].":".$weekto[$i];
                     echo "<option value=".$row.">".$weekfrom[$i]." - ".$weekto[$i]."</option>";
                }
                echo "</select>";
                echo "<br>";
         
            ?>
</form>
</div>
<section id="storybox">
	<?php 
		if(isset($_POST["week"]) && !empty($_POST["week"])){
			$w =  $_POST['week'];
			$pieces = explode(":", $w);
			display_prompts_trophies($pieces[0], $pieces[1]);
		}
		else{
		$startweek = "2013-11-17";
			$stopweek = "2013-12-01";
			display_prompts_trophies($startweek, $stopweek);
			
		}
	?>
</section>	

<div id="sName">
Past Stories:
<br>
<form action="trophies.php" method="POST">
<?php
               
                echo "<select name='weekS' size='4' id='weekS' onchange='this.form.submit()'>";
               for($i =0; $i < 3;  $i = $i+1) {
                    $row = $weekfrom[$i].":".$weekto[$i];
                     echo "<option value=".$row.">".$weekfrom[$i]." - ".$weekto[$i]."</option>";
                }
                echo "</select>";
                echo "<br>";
         
            ?>
</form>
</div>
<section id="storybox">
	<?php 
		
		if(isset($_POST["weekS"]) && !empty($_POST["weekS"])){
			$w =  $_POST['weekS'];
			$pieces = explode(":", $w);
			display_stories_trophies($pieces[0], $pieces[1]);
		}
		else{
		$startweek = "2013-11-17";
			$stopweek = "2013-12-01";
			display_stories_trophies($startweek, $stopweek);
			
		}
	?>
</section>	



</body>
</html>