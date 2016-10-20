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
		<!-- menu -->
		<div class="row">
			<div class="col-3 col-m-3 menu">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="Events.html">Weekly Calender</a></li>
					<li><a class="active" href="form3.html">Join</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="contact.html">Contact us</a></li>					
				</ul>
			</div>
			
			<h4>Thanks for joining our club! </h4>

				<?php // connect to database
					include 'config.php';
					mysqli_select_db($conn,$db_name);					
					
					// Gather data from form
					
					$member_id = $_POST['member_id'];
					$firstname = $_POST['firstname'];
					$lastname = $_POST['lastname'];
					$email = $_POST['email'];
					$phone = $_POST['phone'];					
					// insert data into table
					$sql = "INSERT INTO boardgames (member_id,firstname,lastname,email,phone) 
					VALUES ('$member_id','$firstname','$lastname','$email','$phone')"; 
					
					$query=mysqli_query($conn, $sql);
					// inform player that details saved or not. Display players saved info.
					if(!$query)
					{
						echo "Your membership not saved. Please try again.".mysqli_error($conn);
					}
					else
					{
						echo "<p>Thank your $firstname. Your membership has been saved.</p>";
						echo "<p>Information submitted for: $firstname $lastname </p>\n";						
						echo "<p>Email: $email</p>\n";
						echo "<p>Phone: $phone</p>\n";
					}
					mysqli_close($conn);
					
					
				?>

		</div>
	
		<div class="footer">
			<p><i>Board games aficionados</i></p><p>1970-2015</p>
		</div>
	</body>
</html>