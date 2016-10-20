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
					<li><a href="editplayer.php">List/Edit players</a></li>	
					<li><a href="events.php">Edit calender</a></li>
					<li><a class="active" href="playerplay.php">Games played</a></li>
					<li><a href="addplayerplay.php">Add/Delete games played</a></li>
				</ul>
			</div>				
			<div class="col-9 col-m-9" style="overflow-x:auto;">				
				<br>
				<br>			
				<table width="1200" border="2">
				<br>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Monopoly</th>
						<th>Cluedo</th>
						<th>Connect Four</th>
						<th>Operation</th>
						<th>Battleship</th>
						<th>Scrabble</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				<?php
						
						include 'config.php';
						mysqli_select_db($conn,$db_name);
						
						$select = "SELECT * FROM gamesplay";
						$run = mysqli_query($conn,$select);
						
						// join member_id in table boardgames to gamesplay
						$select = "SELECT member_id FROM boardgames JOIN gamesplay USING (member_id)";
						
						// search gamesplay table for data and print out					
						while($row=mysqli_fetch_array($run)){
							
							$gamesplay_member_id = $row['member_id'];
							$gamesplay_firstname = $row['firstname'];
							$gamesplay_lastname = $row['lastname'];
							$gamesplay_chkMonopoly = $row['chkMonopoly'];
							$gamesplay_chkCluedo = $row['chkCluedo'];						
							$gamesplay_chkConnectFour = $row['chkConnectFour'];
							$gamesplay_chkOperation = $row['chkOperation'];
							$gamesplay_chkBattleship = $row['chkBattleship'];
							$gamesplay_chkScrabble = $row['chkScrabble'];
					?>
					
					<tr>
						<td><?php echo $gamesplay_firstname; ?></td>
						<td><?php echo $gamesplay_lastname; ?></td>
						<td><?php echo $gamesplay_chkMonopoly; ?></td>
						<td><?php echo $gamesplay_chkCluedo; ?></td>
						<td><?php echo $gamesplay_chkConnectFour; ?></td>
						<td><?php echo $gamesplay_chkOperation; ?></td>
						<td><?php echo $gamesplay_chkBattleship; ?></td>
						<td><?php echo $gamesplay_chkScrabble; ?></td>
						<td><a href="playerplay.php?edit=<?php echo $gamesplay_member_id; ?>">Edit</a></td>
						<td><a href="playerplay.php?delete=<?php echo $gamesplay_member_id; ?>">Delete</a></td>			
					<tr>
					<?php } ?>
		
				</table>
				
				<?php
					if(isset($_GET['edit'])){				
						include("editplayerplay.php");
					}
				
				?>
				
				
				<?php
				
					if(isset($_GET['delete'])){
						
						$delete_member_id = $_GET['delete'];
						
						$delete = "DELETE FROM gamesplay WHERE member_id='$delete_member_id'";
						
						$run_delete = mysqli_query($conn,$delete);
						
							if($run_delete){
								
								echo "<h3>Deleted Successful, Thanks!</h3>";
							}
					}
		
		
				?>	
				</table>
				</div>
			<br>		
			</div>
			<br>
			
			<div class="footer">
				<p><i>Board games aficionados</i></p><p>1970-2015</p>
			</div>
		</div>

	</body>
</html>						