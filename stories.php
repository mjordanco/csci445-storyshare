<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
	
<style>
	#center {
		margin-left: 200px;
		height: 700px;
		background: white;
		border: 1px solid black;
		border-radius: 5px;
	}	
	
	#profile_img {
		margin-top: 70px;
		margin-left: 50px;
		width: 80px;
		height: 80px;
		border: 5px solid pink;
		border-radius: 5px;
	}
	
	.sidebar {
		text-align: center;
		font-family: "Times New Roman", Times, serif;
		font-size: 12pt;
	
		border-radius:15px 15px 15px 15px;
		border:2px solid black;
		box-shadow:4px 13px 13px #000000;
	
		float: left;
		position: fixed;
		margin: 0 0 -20px;
		background-color: #CCFFFF;
		opacity: .9;
		width: 175px;
		height: 40px;
		line-height: 40px;
	}
	#first {
	}
	#second {
		margin: 45px 0 45px 0 ;
	}
	#third {
		margin: 90px 0 90px 0;
	}
	#fourth {
		margin: 135px 0 135px 0;
	}
	#fifth {
		margin: 180px 0 180px 0;	
	}
	#sixth {
		margin: 225px 0 225px 0;
	}
	#seventh {
		margin: 270px 0 270px 0;
	}
	#eigth {
		margin: 455px 0 455px 0;
	}
	a:link, a:visited {
		text-decoration: none;
		color: black;
	}
	a:hover, a:active {
		text-decoration: none;
		color: cyan;
	}
	
	.storyBox {
		margin-top: 25px;
		margin-left: 50px;
		margin-right: 50px;
		border: 1px dashed black;
		border-radius: 10px;
		padding: 15px 15px 15px 15px;
	}
	
</style>
</head>
<body>
	<?php
		print_header("stories");
	?>
	
	<div id="profile_img">
		<img src="user_profile_pic_placeholder.png" alt="User profile picture">
	</div>
	
	<div class="sidebar" id="first"><a href="addLink">ACTION</a></div>
	<div class="sidebar" id="second"><a href="addLink">ADVENTURE</a></div>
	<div class="sidebar" id="third"><a href="addLink">COMEDY</a></div>
	<div class="sidebar" id="fourth"><a href="addLink">DRAMA</a></div>
	<div class="sidebar" id="fifth"><a href="addLink">HISTORY</a></div>
	<div class="sidebar" id="sixth"><a href="addLink">HORROR</a></div>
	<div class="sidebar" id="seventh"><a href="addLink">ROMANCE</a></div>
	<div class="sidebar" id="eigth"><a href="addLink">SCI-FI</a></div>
	
	<div id="center">
			<h2>Current Genre: Action</h2>

	</div>
	</div>
	
</body>
</html>