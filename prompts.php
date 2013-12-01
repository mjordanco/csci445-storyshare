<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
<link rel="stylesheet" type="text/css" href="view_stories_prompts.css">
<style type="text/css">
      
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
	
	</table>
	</div>
	
	</div>
	
	
</body>
</html>