<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">	
		<title>Board games aficionados</title>
		<link rel="stylesheet" type="text/css" href="style.css">	
	</head>
	<body>

		<div class="header">
			<h1>Board Games Aficionados</h1>
		</div>

		<div class="row"> 
			<div class="col-3 col-m-3 menu">
				<ul> 
					<li><a href="index.html">Home</a></li>
					<li><a href="events1.php">Weekly Calender</a></li>
					<li><a href="form.html">Join</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="contact.html">Contact us</a></li>	
					<li><a href="admin.php">Admin/List players</a></li>
					<li><a href="addplayers.php">Add/Delete players</a></li>					
					<li><a href="editplayer.php">List/Edit players</a></li>	
					<li><a class="active" href="events.php">Edit calender</a></li>	
					<li><a href="playerplay.php">Games played</a></li>
					<li><a href="addplayerplay.php">Add/Delete games played</a></li>
				</ul>
			</div>
			
			<div class="col-9 col-m-9" style="overflow-x:auto;">				
				<br>
				<br>			
				<table width="1000" border="2">
				
					<tr>
						<th>Weekday</th>
						<th>Time</th>
						<th>Location</th>	
						<th>Edit</th>
					</tr>
				
					<?php
						// connect to database
						include 'config.php';
						mysqli_select_db($conn,$db_name);
						// get table data and print for editing 
						$select = "SELECT * FROM wkgames";
						$run = mysqli_query($conn,$select);
						
						
						while($row=mysqli_fetch_array($run)){
							
							$wkgames_weekday_id = $row['weekday_id'];
							$wkgames_wkday = $row['wkday'];
							$wkgames_gametime = $row['gametime'];
							$wkgames_gamelocation = $row['gamelocation'];
					?>
					
					<tr> 
						<td><?php echo $wkgames_wkday; ?></td>
						<td><?php echo $wkgames_gametime; ?></td>
						<td><?php echo $wkgames_gamelocation; ?></td>						
						<td><a href="events.php?edit=<?php echo $wkgames_weekday_id; ?>">Edit</a></td>	
					<tr>
					<?php } ?>
		
				</table>
				
				<?php
					if(isset($_GET['edit'])){				
						include("editevents.php");
					}
				
				?>								
				</div>	
			
		</div>
			
			<div class="footer">
			<p><i>Board games aficionados</i></p><p>1970-2015</p>
			</div>
		</div>

	</body>
</html>					