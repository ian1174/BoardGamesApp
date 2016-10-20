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
					<li><a class="active" href="events1.php">Weekly calender</a></li>
					<li><a href="form.html">Join</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="contact.html">Contact us</a></li>					
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
					</tr>
					
					<?php // display table for weekly games timetable
						
						include 'config.php';
						mysqli_select_db($conn,$db_name);
						
						$select = "SELECT * FROM wkgames";
						$run = mysqli_query($conn,$select);
						
						
						while($row=mysqli_fetch_array($run)){
							
							$wkgames_wkday = $row['wkday'];
							$wkgames_gametime = $row['gametime'];
							$wkgames_gamelocation = $row['gamelocation'];
					?>
					
					<tr>
						<td><?php echo $wkgames_wkday; ?></td>
						<td><?php echo $wkgames_gametime; ?></td>
						<td><?php echo $wkgames_gamelocation; ?></td>						
									
					<tr>
					<?php } ?>
		
				</table>			
				
			</div>	
			
		</div>
			
			<div class="footer">
			<p><i>Board games aficionados</i></p><p>1970-2015</p>
			</div>
		</div>

	</body>
</html>					