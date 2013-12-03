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
            $db = mysql_connect('localhost', 'team12', 'grapefruit');
            if (!$db) {
                echo "Could not connect!";
            }

            $vote = $_GET['vote'];
            $table = $_GET['table'];
            $id = $_GET['id'];
            $points = $_GET['points'];

            $updated_points = $points + 1;

            mysql_query("UPDATE $table SET points=$updated_points WHERE id=$id");

            echo "<p id='voteCast'>Your ".$vote." vote has been cast!</p>";
            
            echo "Vote: ".$vote;
            echo "<br>";
            echo "To: ".$table;
            echo "<br>";
            echo "With ID: ".$id;
            echo "<br>";
            echo "Prevous point value: ".$points;
            echo "<br>";
		?>
	</section>
</body>
</html>