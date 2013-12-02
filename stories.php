<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
	
<link rel="stylesheet" type="text/css" href="view_stories_prompts.css">
<style type="text/css">
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
		print_header("stories");
	?>
	
	<div class="profile_img">
		<img src="user_profile_pic_placeholder.png" alt="User profile picture">
	</div>
	
     <div class="sidebar" id="first"><a href="stories.php?sortGenre=View All">VIEW ALL</a></div>
	<div class="sidebar" id="second"><a href="stories.php?sortGenre=Action">ACTION</a></div>
	<div class="sidebar" id="third"><a href="stories.php?sortGenre=Adventure">ADVENTURE</a></div>
	<div class="sidebar" id="fourth"><a href="stories.php?sortGenre=Comedy">COMEDY</a></div>
	<div class="sidebar" id="fifth"><a href="stories.php?sortGenre=Drama">DRAMA</a></div>
    <div class="sidebar" id="sixth"><a href="stories.php?sortGenre=Fantasy">FANTASY</a></div>
	<div class="sidebar" id="seventh"><a href="stories.php?sortGenre=History">HISTORY</a></div>
	<div class="sidebar" id="eigth"><a href="stories.php?sortGenre=Horror">HORROR</a></div>
	<div class="sidebar" id="ninth"><a href="stories.php?sortGenre=Romance">ROMANCE</a></div>
	<div class="sidebar" id="tenth"><a href="stories.php?sortGenre=Sci-Fi">SCI-FI</a></div>
    <div class="sidebar" id="eleventh"><a href="stories.php?sortGenre=Other">OTHER</a></div>
	
	<div id="center">
        <?php
            $sortGenre = htmlspecialchars($_GET['sortGenre']);
            display_table("stories", "story", $sortGenre);
            /* I will be working on displaying full story after clicking table cell*/
        ?>
		
	</div>
	</div>
	
</body>
</html>