<html>
<head>
	<?php
	require_once('phplibs.php');
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">
        #story {
            background-color: white;
            border: 3px solid black;
            border-radius: 5px;
            margin: 50px 30px 10px 30px;
            padding: 25px 25px 25px 25px;
        }
        .forPre {
            font-size: medium;
            font-family: Times, serif;
        }
            
	</style>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>

<?php
print_header("index");
?>

<section class="featured">
    <?php
        $storyID = htmlspecialchars($_GET['storyNum']);
        echo "<div id='story'>";
            displayStory($storyID);
        echo "</div>";
    ?>
</section>


</body>
</html>