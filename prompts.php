<html>
<head>
	<?php
		include_once('phplibs.php');
	?>
<link rel="stylesheet" type="text/css" href="view_stories_prompts.css">
	<style type="text/css">
        table {
            border-spacing: 0;
            table-layout: fixed;
            vertical-align: middle;
            font-size: large;
            font-family: "Times New Roman", Georgia, Palatino, serif;
            width: 80%;
            margin: auto;
            margin-top: 15px;
        }
        
        /*Sets the style for the entire table*/
        #names {
            border: 5px solid #666633;
            border-collapse: collapse;
            text-align: center;
        }
        
        /*Sets the style for the column labels*/
        #names th {
            background-color: #666633;
            color: white;
        }
        
        /*Sets border on all sides on our table data*/
        #names td {
            border: 2px solid #666633;
        } 
        
        /*Changes background for every odd numbered row*/
        #names tr:nth-of-type(odd) {
            background: #A3C266;
        }
        
        /*Styles the captions above*/
        caption {
            font-family: Verdana, Arial, Tahoma, sans-serif;
            font-weight: bold;
            padding-bottom: 5px;
        }
        
        /*Styles the tables header*/
        th {
            font-family: Verdana, Arial, Tahoma, sans-serif;
            font-size: medium;
        }
        
        /*Ensures padding around data*/
        td {
            padding: 100px 5px 100px 5px;
            text-align: center;
        }
		
</style>
</head>
<body>
	<?php
		print_header("prompts");
	?>
	
    <div class="profile_img">
		<img src="user_profile_pic_placeholder.png" alt="User profile picture">
	</div>
	
	<div class="sidebar" id="first"><a href="addLink">ACTION</a></div>
	<div class="sidebar" id="second"><a href="addLink">ADVENTURE</a></div>
	<div class="sidebar" id="third"><a href="addLink">COMEDY</a></div>
	<div class="sidebar" id="fourth"><a href="addLink">DRAMA</a></div>
    <div class="sidebar" id="fifth"><a href="addLink">FANTASY</a></div>
	<div class="sidebar" id="sixth"><a href="addLink">HISTORY</a></div>
	<div class="sidebar" id="seventh"><a href="addLink">HORROR</a></div>
	<div class="sidebar" id="eigth"><a href="addLink">ROMANCE</a></div>
	<div class="sidebar" id="ninth"><a href="addLink">SCI-FI</a></div>
    <div class="sidebar" id="tenth"><a href="addLink">OTHER</a></div>
	
	<div id="center">
		<h2 id="genreHeader">Current Genre: Action</h2>
        <?php
            $db = open_db(); 
            $query = "SELECT * FROM prompts";
            $result = $db->query($query);
            $num_results = $result->num_rows;

            echo "<table id='names'>";
            $column = 0;
            $entries = 0;
            for ($i=0; $i < $num_results; $i++) {
                if ($column == 0) {
                    echo "<tr>";
                }
                if ($column == 4) {
                    echo "</tr>";
                    $column = 0;
                }
                    
                $row = $result->fetch_assoc();
                echo "<td>".$row['name']."</td>";
                $column++;
                $entries++;
            }
    
            while ($entries < 20) {
                if ($column == 0) {
                    echo "<tr>";
                }
                if ($column == 4) {
                    echo "</tr>";
                    $column = 0;
                }
                
                echo "<td></td>";
                $column++;
                $entries++;
            }

            echo "</table>";
            echo "<br>";
        ?>
	
	</table>
	</div>
	
	</div>
	
	
</body>
</html>