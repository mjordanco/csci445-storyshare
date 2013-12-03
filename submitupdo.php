<head>
	<?php
		include_once('phplibs.php');
	?>
	<style type="text/css">
		#submit_box {
			width:75%;
			background-color: #8A0000;

			border-style: solid;
			border-width: 1px;

			padding: 20px;
		}
        #voteCast {
            font-size: large;
            color: white;
        }
	</style>
</head>
<body>   
	<?php
		print_header("");
	?>

	<section id="submit_box">
		<?php
            $vote = $_GET['vote'];
            echo "<p id='voteCast'>Your vote has been cast!</p>";
            echo $vote;


		?>
	</section>
</body>
</html>