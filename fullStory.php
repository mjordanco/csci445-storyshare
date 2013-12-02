<html>
<head>
	<?php
	require_once('phplibs.php');
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">

	</style>
</head>
<body>

<?php
print_header("index");
?>

<section class="featured">
    <?php
        $storyID = htmlspecialchars($_GET['storyNum']);
        displayStory($storyID);
    ?>
</section>


</body>
</html>