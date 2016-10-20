<?php
		
		if(isset($_GET['edit'])){
			
			$edit_member_id = $_GET['edit'];
			
			$select = "SELECT * FROM boardgames WHERE member_id='$edit_member_id'";
			$run = mysqli_query($conn,$select);
			
			$row=mysqli_fetch_array($run);				
			
			$boardgames_firstname = $row['firstname'];
			$boardgames_lastname = $row['lastname'];
			$boardgames_email = $row['email'];
			$boardgames_phone = $row['phone'];			
		}						
	?>
<br/>
<form2 method="post" action="">
		<input type="text" name="u_firstname" value="<?php echo $boardgames_firstname; ?>"/><br/>
		<input type="text" name="u_lastname" value="<?php echo $boardgames_lastname; ?>"/><br/>
		<input type="text" name="u_email" value="<?php echo $boardgames_email; ?>"/><br/>
		<input type="text" name="u_phone" value="<?php echo $boardgames_phone; ?>"/><br/>
		<input type="submit" name="update" value="Update Player"/><br/>
</form2>

<?php
				if(isset($_POST['update'])){
				
				$update_firstname = $_POST['u_firstname'];
				$update_lastname = $_POST['u_lastname'];
				$update_email = $_POST['u_email'];
				$update_phone = $_POST['u_phone'];

				$update = "UPDATE boardgames SET firstname='$update_firstname',lastname='$update_lastname',
				email='$update_email', phone='$update_phone' WHERE member_id='$edit_member_id'";	
				
				$update_run = mysqli_query($conn,$update);
				
				if($update_run){
					
					echo "<h3>Data has been updated, Thanks!</h3>";
				}
			}			

		?>