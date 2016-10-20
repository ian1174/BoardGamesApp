<?php
		
		if(isset($_GET['edit'])){
			
			$edit_weekday_id = $_GET['edit'];
			
			$select = "SELECT * FROM wkgames WHERE weekday_id='$edit_weekday_id'";
			$run = mysqli_query($conn,$select);
			
			$row=mysqli_fetch_array($run);				
						
			$wkgames_gametime = $row['gametime'];
			$wkgames_gamelocation = $row['gamelocation'];	
		}						
	?>
<br/>
<form2 method="post" action="">
		<input type="text" name="u_gametime" value="<?php echo $wkgames_gametime; ?>"/><br/>
		<input type="text" name="u_gamelocation" value="<?php echo $wkgames_gamelocation; ?>"/><br/>
		<input type="submit" name="update" value="Update Calender"/><br/>
</form2>

<?php
				if(isset($_POST['update'])){
				
				$update_gametime = $_POST['u_gametime'];
				$update_gamelocation = $_POST['u_gamelocation'];

				$update = "UPDATE wkgames SET gametime='$update_gametime',gamelocation='$update_gamelocation' 
				WHERE weekday_id='$edit_weekday_id'";	
				
				$update_run = mysqli_query($conn,$update);
				
				if($update_run){
					
					echo "<h3>Calender has been updated, Thanks!</h3>";
				}
			}			

		?>