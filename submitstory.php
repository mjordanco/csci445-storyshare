<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
	<link rel="stylesheet" type="text/css" href="theme.css">
	<style type="text/css">
		#box {
			margin-left: 15%;
		}
		#infoBox {
			float: left;
			width: 10%;
			margin-left: 10px;
		}
        #submit_story {
            height: auto;
            width: 560px;
            resize: none;
            padding: 10px 10px 10px 10px;
            margin: 15px 15px 15px 15px;
        }
		form {
            display: block;
            padding : 5px;
		}
		input, button {
			margin-top: 10px;
		}
		textarea{
			margin-top: 10px;
			width: 74%;
			resize: none;
			height: 14%;
		}
		select {
            width: 30%;
            height: 30px;
            font-size: 20px;	
		}
        #php_select {
            height: 100px;
        }
        p {
            font-size: large;
            color: white;
        }
        button {
            font-size: large;
            border-radius: 1px;
        }
        textarea {
            font-size: large;
        }
	</style>
    <script type="text/javascript">
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }

    function loadPrompt() {
        if (getUrlVars()['prompt_id'] != php_select.value) {
            prompt_id = php_select.value;
            document.location.href = "submitstory.php?prompt_id=" + prompt_id.toString();
        }
    }
    </script>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
</head>
<body>
	<?php
		print_header("submitstory");
	?>
	<br>
	<br>
	
    <section id="box">
			
        <form method="post" action="submitstorydo.php">
			<input name="name" type="text" placeholder="Title*" required/><br>
			
			<p>Genre: Select the genre that best describes your story</p>
			<select name="genre" required>
                <option value="None" selected> Select One</option>
  				<option value="Action">Action</option>
  				<option value="Adventure">Adventure</option>
  				<option value="Comedy">Comedy</option>
  				<option value="Drama">Drama</option>
                <option value="Fantasy">Fantasy</option>
 				<option value="History">History</option>
  				<option value="Horror">Horror</option>
  				<option value="Romance">Romance</option>
  				<option value="Scifi">Sci-Fi</option>
                <option value="Other">Other</option>
			</select>
            <br>

            <p>Rating: Select an appropriate audience rating for your story</p>
			<select name="rating" size="1" required>
				<option value="None" selected> Select One</option>
				<option value="G">G</option>
                <option value="PG">PG</option>
				<option value="PG-13">PG-13</option>
				<option value="R">R</option>
			</select>
            <br>
            <br>
            
            <p>Prompt: Select the prompt that you based your story off of.</p>
            <?php
                $db = open_db(); 
                $query = "SELECT * FROM prompts";
                $result = $db->query($query);
                $num_results = $result->num_rows;

                echo "<select name='prompt_id' size='10' id='php_select' onchange='loadPrompt();' required>";
                for ($i=0; $i < $num_results; $i++) {
                    $row = $result->fetch_assoc();
                    if (isset($_GET['prompt_id'])) {
                        $selected = $_GET['prompt_id'] == $row['id'];
                        if ($selected) {
                            echo "<option value=".$row['id']." selected='selected'>".$row['name']."</option>";
                        } else {
                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                    }
                    } else {
                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                    }
                }
                echo "</select>";
                echo "<br>";
            ?>

            <?php
                if (isset($_GET['prompt_id'])) {
                    $prompt_id = $_GET['prompt_id'];
                    $db = open_db();
                    $query = 'SELECT * FROM prompts WHERE prompts.id = ' . $prompt_id . ';';
                    $result = $db->query($query);
                    $row = $result->fetch_assoc();

                    echo "<p><strong>Selected Prompt: ".$row['prompt']."</strong></p>";
                }
                ?>
            
			<textarea id="submit_story" name="story" rows="40" columns="30" required></textarea>
            <br>
            <br>
			<button type="submit">Submit Story</button>
		</form>
	
	</section>
</body>
</html>