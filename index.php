<html>
<head>
	<?php
	require_once('phplibs.php');
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">
		.featured {
            color: white;
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
    <script type="text/javascript">
        function readStory(storyID) {
            document.location.href = "fullStory.php?storyNum=" + storyID.toString();
        }
    </script>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>

<?php
print_header("index");
?>

<section class="featured">
    <?php
        displayFeatured("prompts", "Prompt", "prompt");
    ?>
</section>

<section class="featured">
    <?php
        displayFeatured("stories", "Story", "story");
    ?>
</section>
</body>
</html>