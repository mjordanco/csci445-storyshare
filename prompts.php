<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
<link rel="stylesheet" type="text/css" href="view_stories_prompts.css">
<<<<<<< HEAD
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

    <div class="sidebar" id="first"><a href="prompts.php?sortGenre=View All">VIEW ALL</a></div>
	<div class="sidebar" id="second"><a href="prompts.php?sortGenre=Action">ACTION</a></div>
	<div class="sidebar" id="third"><a href="prompts.php?sortGenre=Adventure">ADVENTURE</a></div>
	<div class="sidebar" id="fourth"><a href="prompts.php?sortGenre=Comedy">COMEDY</a></div>
	<div class="sidebar" id="fifth"><a href="prompts.php?sortGenre=Drama">DRAMA</a></div>
    <div class="sidebar" id="sixth"><a href="prompts.php?sortGenre=Fantasy">FANTASY</a></div>
	<div class="sidebar" id="seventh"><a href="prompts.php?sortGenre=History">HISTORY</a></div>
	<div class="sidebar" id="eigth"><a href="prompts.php?sortGenre=Horror">HORROR</a></div>
	<div class="sidebar" id="ninth"><a href="prompts.php?sortGenre=Romance">ROMANCE</a></div>
	<div class="sidebar" id="tenth"><a href="prompts.php?sortGenre=Sci-Fi">SCI-FI</a></div>
    <div class="sidebar" id="eleventh"><a href="prompts.php?sortGenre=Other">OTHER</a></div>
	
	<div id="center">
        <?php
            $sortGenre = htmlspecialchars($_GET['sortGenre']);
            if ($sortGenre == null) {
                $sortGenre="View All";
            }
            display_table("prompts", "prompt", $sortGenre);
        ?>
>>>>>>> b5327607e6ce483f98213681ebf99689c81242d5
	
	</table>
	</div>
	
	</div>
	
	
</body>
</html>