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
	
    <div class="sidebar" id="first"><a href="addLink">VIEW ALL</a></div>
	<div class="sidebar" id="second"><a href="addLink">ACTION</a></div>
	<div class="sidebar" id="third"><a href="addLink">ADVENTURE</a></div>
	<div class="sidebar" id="fourth"><a href="addLink">COMEDY</a></div>
	<div class="sidebar" id="fifth"><a href="addLink">DRAMA</a></div>
    <div class="sidebar" id="sixth"><a href="addLink">FANTASY</a></div>
	<div class="sidebar" id="seventh"><a href="addLink">HISTORY</a></div>
	<div class="sidebar" id="eigth"><a href="addLink">HORROR</a></div>
	<div class="sidebar" id="ninth"><a href="addLink">ROMANCE</a></div>
	<div class="sidebar" id="tenth"><a href="addLink">SCI-FI</a></div>
    <div class="sidebar" id="eleventh"><a href="addLink">OTHER</a></div>
	
	<div id="center">
        <?php
            display_table("prompts", "prompt", "View All");
        ?>
	
	</table>
	</div>
	
	</div>
	
	
</body>
</html>