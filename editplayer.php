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
					<li><a href="events.php">Weekly Calender</a></li>
					<li><a href="form.html">Join</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="contact.html">Contact us</a></li>	
					<li><a href="admin.php">Admin/List players</a></li>
					<li><a href="addplayers.php">Add/Delete players</a></li>					
					<li><a class="active" href="editplayer.php">List/Edit players</a></li>	
					<li><a href="events.php">Edit calender</a></li>
					<li><a href="playerplay.php">Games played</a></li>
					<li><a href="addplayerplay.php">Add/Delete games played</a></li>
				</ul>
			</div>			
			
			<div class="col-9 col-m-9" style="overflow-x:auto;">				
				<br>
				<br>			
				<table width="500" border="2">
				
					<tr>
						<th>Member ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				
					<?php
						// connect to database	
						include 'config.php';
						mysqli_select_db($conn,$db_name);
						// connect to table
						$select = "SELECT * FROM boardgames";
						$run = mysqli_query($conn,$select);
						
						// get data for table then print out table						
						while($row=mysqli_fetch_array($run)){
							
							$boardgames_member_id = $row['member_id'];
							$boardgames_firstname = $row['firstname'];
							$boardgames_lastname = $row['lastname'];
							$boardgames_email = $row['email'];
							$boardgames_phone = $row['phone'];						
							
					?>

					<tr>
						<td><?php echo $boardgames_member_id; ?></td>
						<td><?php echo $boardgames_firstname; ?></td>
						<td><?php echo $boardgames_lastname; ?></td>
						<td><?php echo $boardgames_email; ?></td>
						<td><?php echo $boardgames_phone; ?></td>	
						<td><a href="editplayer.php?edit=<?php echo $boardgames_member_id; ?>">Edit</a></td>
						<td><a href="editplayer.php?delete=<?php echo $boardgames_member_id; ?>">Delete</a></td>			
					<tr>
					<?php } ?>
		
				</table>
		
				<?php
					if(isset($_GET['edit'])){				
						include("edit.php");
					}
				
				?>
				
				
				<?php
				
					if(isset($_GET['delete'])){
						
						$delete_member_id = $_GET['delete'];
						
						$delete = "DELETE FROM boardgames WHERE member_id='$delete_member_id'";
						
						$run_delete = mysqli_query($conn,$delete);
						
							if($run_delete){
								
								echo "<h3>Deleted Successful, Thanks!</h3>";
							}
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