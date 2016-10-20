<?php
		
		if(isset($_GET['edit'])){
			//connect to database
			$edit_member_id = $_GET['edit'];
			// select table 
			$select = "SELECT * FROM gamesplay WHERE member_id='$edit_member_id'";
			$run = mysqli_query($conn,$select);
			// get data for table
			$row=mysqli_fetch_array($run);
			
			$gamesplay_member_id = $row['member_id'];
			$gamesplay_firstname = $row['firstname'];
			$gamesplay_lastname = $row['lastname'];
			$gamesplay_chkMonopoly = $row['chkMonopoly'];
			$gamesplay_chkCluedo = $row['chkCluedo'];						
			$gamesplay_chkConnectFour = $row['chkConnectFour'];
			$gamesplay_chkOperation = $row['chkOperation'];
			$gamesplay_chkBattleship = $row['chkBattleship'];
			$gamesplay_chkScrabble = $row['chkScrabble'];
		}						
	?> 
	
<br/> 
<form2 method="post" action=""> 
		<input type="text" name="u_firstname" value="<?php echo $gamesplay_firstname; ?>"/><br/>
		<input type="text" name="u_lastname" value="<?php echo $gamesplay_lastname; ?>"/><br/>
		<input type="text" name="u_chkMonopoly" value="<?php echo $gamesplay_chkMonopoly; ?>"/><br/>
		<input type="text" name="u_chkCluedo" value="<?php echo $gamesplay_chkCluedo; ?>"/><br/>
		<input type="text" name="u_chkConnectFour" value="<?php echo $gamesplay_chkConnectFour; ?>"/><br/>
		<input type="text" name="u_chkOperation" value="<?php echo $gamesplay_chkOperation; ?>"/><br/>
		<input type="text" name="u_chkBattleship" value="<?php echo $gamesplay_chkBattleship; ?>"/><br/>
		<input type="text" name="u_chkScrabble" value="<?php echo $gamesplay_chkScrabble; ?>"/><br/>
		<input type="submit" name="update" value="Update Player"/><br/>
</form2>

<?php // update table gamesplay
				if(isset($_POST['update'])){
				
				$update_firstname = $_POST['u_firstname'];
				$update_lastname = $_POST['u_lastname'];
				$update_chkMonopoly = $_POST['u_chkMonopoly'];
				$update_chkCluedo = $_POST['u_chkCluedo'];
				$update_chkConnectFour = $_POST['u_chkConnectFour'];
				$update_chkOperation = $_POST['u_chkOperation'];
				$update_chkBattleship = $_POST['u_chkBattleship'];
				$update_chkScrabble = $_POST['u_chkScrabble'];

				$update = "UPDATE gamesplay SET firstname='$update_firstname',lastname='$update_lastname',
				chkMonopoly='$update_chkMonopoly', chkCluedo='$update_chkCluedo', chkConnectFour='$update_chkConnectFour', 
				chkOperation='$update_chkOperation', chkBattleship='$update_chkBattleship', chkScrabble='$update_chkScrabble' 
				WHERE member_id='$edit_member_id'";	
				
				$update_run = mysqli_query($conn,$update);
				
				if($update_run){
					
					echo "<h3>Data has been updated, Thanks!</h3>";
				}
			}			

		?>