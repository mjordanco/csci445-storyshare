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
	</style>
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
                <option value="NA" selected> Select One</option>
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
				<option value="NA" selected> Select One</option>
				<option value="G">G</option>
                <option value="PG">PG</option>
				<option value="PG-13">PG-13</option>
				<option value="R">R</option>
			</select>
            <br>
            <br>
            
            <p>Prompt: Select the prompt that you based your story off of, or select 'No Prompt'</p>
            <?php
                $db = open_db(); 
                $query = "SELECT * FROM prompts";
                $result = $db->query($query);
                $num_results = $result->num_rows;

                echo "<select name='prompt_id' size='10' required>";
                for ($i=0; $i < $num_results; $i++) {
                    $row = $result->fetch_assoc();
                     echo "<option value=".$row['id'].">".$row['name']."</option>";
                }
                echo "<option value=null>No Prompt</option>";
                echo "</select>";
                echo "<br>";
         
            ?>
            
			<textarea id="submit_story" name="story" rows="40" columns="30" required></textarea><br>
			<button type="submit">Submit Story</button>
		</form>
	
	</section>
</body>
</html>