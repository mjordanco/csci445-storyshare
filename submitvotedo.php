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
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>   
	<?php
		print_header("");
	?>

	<section id="submit_box">
		<?php
            $db = mysqli_connect('localhost', 'team12', 'grapefruit');
            if (!$db) {
                echo "Could not connect!";
            }

            $vote = $_GET['vote'];
            $table = $_GET['table'];
            $name = $_GET['name'];
            $id = $_GET['id'];
            $points = $_GET['points'];

            if ($vote == "up") {
                $updated_points = $points + 1;
            } else if ($vote == "down") {
                $updated_points = $points - 1;
            }

            submit_vote($vote, $table, $name, $id, $updated_points);
		?>
	</section>
</body>
</html>