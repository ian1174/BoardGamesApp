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
					<li><a href="events1.php">Weekly calender</a></li>
					<li><a href="form.html">Join</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="contact.html">Contact us</a></li>	
					<li><a class="active" href="admin.php">Admin/List players</a></li>
					<li><a href="addplayers.php">Add/Delete players</a></li>					
					<li><a href="editplayer.php">List/Edit players</a></li>	
					<li><a href="events.php">Edit calender</a></li>
					<li><a href="playerplay.php">Games played</a></li>
					<li><a href="addplayerplay.php">Add/Delete games played</a></li>
				</ul>
			</div>			
			
			<div class="col-9 col-m-9" style="overflow-x:auto;" border="2">			
				<?php // connect to database, get data and print out. 
					include 'config.php';
					mysqli_select_db($conn,$db_name);				
					
					$sql = "SELECT * FROM boardgames";
					$query = mysqli_query($conn,$sql);							
						
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						echo "<br>";
						echo "<table><caption>List of members</caption><tr style=\"background-color: #dddddd;\"><th>Member ID</th><th>Name</th><th>Email</th><th>Phone number</th></tr>";
						 // output data of each row
						 while($row = $result->fetch_assoc()) {
							 echo "<tr><td>" . $row["member_id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone"]. "</td></tr>"; 
						 }
						 echo "</table>";
					} else {
						 echo "0 results";
					}
					
					$conn->close();			
					
				?>
				
			</div>	
			
		</div>
			
			<div class="footer">
			<p><i>Board games aficionados</i></p><p>1970-2015</p>
			</div>
		</div>

	</body>
</html>