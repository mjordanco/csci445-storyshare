<html>
<head>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">
		.featured {
		}

		.featured .featured_bottom {
			margin-top: 40px;
		}

		.featured h3 {
			display: inline;
		}

		.featured button {
			float: right;
		}
	</style>
</head>
<body>
<header>
	<div id="title">
		<h1>StoryShare</h1><br>
		<h2>A place to let your imagination run wild!</h2>
	</div>
	<ul id="menu">
		<li class="selected">
			<a href="./">Home</a>
		</li>
		<li>
			<a href="./">All Prompts</a>
		</li>
		<li>
			<a href="./">All Stories</a>
		</li>
		<li>
			<a href="./">Weekly Trophies</a>
		</li>
		<?php
			session_start();
			if (!isset($_SESSION['user_id'])) {
				echo '<li class="signin">
					<a href="./signin.html">Sign In</a>
					</li>';
			} else {
				echo '<li class="signin">
					<a href="./signout.php">Sign Out</a>
					</li>';
				echo '<li class="signin">
					<a href="./profile.php?user_id=' . $_SESSION['user_id'] . '">Your Profile</a>
					</li>';
			}
		?>
		
	</ul>
</header>

<section class="featured">
	<h1>Featured Prompt: Titletitletitle</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed commodo metus, in gravida felis. Sed porttitor, ipsum eu semper dignissim, neque lorem lacinia dui, eget sagittis mauris sem quis ante. Etiam bibendum justo at risus aliquam feugiat. Sed imperdiet lorem at malesuada mollis. Sed sed neque in velit aliquet rutrum. Suspendisse hendrerit, leo vitae suscipit aliquet, nunc justo ornare mauris, nec ultricies diam neque dictum sem. Pellentesque feugiat tempor orci et porta. Sed vestibulum arcu vitae mi faucibus pretium. Mauris sed lacus eget dui consequat rhoncus ac et lorem. Aenean eu odio velit. Quisque gravida dictum semper. Duis porttitor orci dui, in rutrum nisi egestas venenatis.</p>
	<div class="featured_bottom">
		<h3>Submitted by Matthew Jordan</h3>
		<a href="./"><button type="button">Finish The Story...</button></a>
	</div>
</section>

<section class="featured">
	<h1>Featured Story: Titletitletitle</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed commodo metus, in gravida felis. Sed porttitor, ipsum eu semper dignissim, neque lorem lacinia dui, eget sagittis mauris sem quis ante. Etiam bibendum justo at risus aliquam feugiat. Sed imperdiet lorem at malesuada mollis. Sed sed neque in velit aliquet rutrum. Suspendisse hendrerit, leo vitae suscipit aliquet, nunc justo ornare mauris, nec ultricies diam neque dictum sem. Pellentesque feugiat tempor orci et porta. Sed vestibulum arcu vitae mi faucibus pretium. Mauris sed lacus eget dui consequat rhoncus ac et lorem. Aenean eu odio velit. Quisque gravida dictum semper. Duis porttitor orci dui, in rutrum nisi egestas venenatis.</p>
	<div class="featured_bottom">
		<h3>Submitted by Matthew Jordan</h3>
		<a href="./"><button type="button">Read the rest...</button></a>
	</div>
</section>
</body>
</html>