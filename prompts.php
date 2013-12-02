<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
<link rel="stylesheet" type="text/css" href="view_stories_prompts.css">
	<style type="text/css">
		table {
			padding: 10px;
		}
		li.left {
			background-color:#CCA300;
			float: left;
			width: 30%;
		}
		li.poin{
			background-color:#CCA300;
			float: left;
			width: 30%;
		}
		ul.dispP {
			list-style-type: none;
			height:20%;
			display: block;
		}
		ul.pBox {
			list-style-type: none;
			padding:2%;
			display: inline;
			width: 100%;
			height: 80%;
		}
		li.right{
			background-color:#CCA300;
			float: right;
			width: 70%;	
		}
		li.pright{
			background-color:#CCA300;
			float: right;
			width: 70%;	
		}
		td {
			background-color:#7A0000;
			width: 20%;
			height: 20%;
		}
		
		.leftF {
			float:left;
		}
		.rightF {
			float:right;
		}
</style>
</head>
<body>
	<?php
		print_header("prompts");
	?>
	
		<div class="profile_img">
		<img src="user_profile_pic_placeholder.png" alt="User profile picture">
	</div>
	
	<div class="sidebar" id="first"><a href="promptsChange.php">ACTION</a></div>
	<div class="sidebar" id="second"><a href="promptsChangeAd.php">ADVENTURE</a></div>
	<div class="sidebar" id="third"><a href="promptsChangeCom.php">COMEDY</a></div>
	<div class="sidebar" id="fourth"><a href="promptsChangeDra.php">DRAMA</a></div>
	<div class="sidebar" id="fifth"><a href="promptsChangeHis.php">HISTORY</a></div>
	<div class="sidebar" id="sixth"><a href="promptsChangeHorror">HORROR</a></div>
	<div class="sidebar" id="seventh"><a href="promptsChangeRom">ROMANCE</a></div>
	<div class="sidebar" id="eigth"><a href="addLink">SCI-FI</a></div>
	
	<div id="center">
		<h2 id="genreHeader">Current Genre: <?php  $link = $_SESSION['link']; echo $link; if($link ==""){$link = "action";}?> </h2>
		<table name= "pTable" border="1">
		<?php
			$link = $_SESSION['link'];
			if($link ==""){
			  $link = "action";
			  }
			get_prompts( $link);
		?>
	
	</table>
	</div>
	
	</div>
	
	
</body>
</html>