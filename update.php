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
					<li><a href="Events.html">Weekly Calender</a></li>
					<li><a href="form.html">Join</a></li>
					<li><a href="about.html">About us</a></li>
					<li><a href="contact.html">Contact us</a></li>	
					<li><a href="admin.php">Admin</a></li>
					<li><a href="addplayers.php">Add players</a></li>
					<li><a href="deleteplayers.php">Delete players</a></li>
					<li><a class="active" href="update.php">Update players</a></li>	
				</ul>
			</div>			
			
			<div class="col-9 col-m-9" style="overflow-x:auto;">				
				<br>
				<br>
				<?php 
					require_once 'config.php';
					$connt = new mysqli($db_hostname, $db_username, $db_password, $db_name);
					if ($connt->connect_error) die($connt->connect_error);
					
					if (isset($_POST['update']) && isset($_POST['member_id']))
				  {
					$member_id = get_post($connt, 'member_id');
					$query  = "UPDATE boardgames SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone = '$phone' WHERE member_id='$member_id' ";
					$result = $connt->query($query);
					if (!$result) echo "UPDATE failed: $query<br>" .
					  $connt->error . "<br><br>";
				  }

				  if (isset($_POST['member_id']) &&
					  isset($_POST['firstname']) &&
					  isset($_POST['lastname'])  &&
					  isset($_POST['email'])     &&
					  isset($_POST['phone']))
				  {
					$member_id   = get_post($connt, 'member_id');
					$firstname    = get_post($connt, 'firstname');
					$lastname = get_post($connt, 'lastname');
					$email     = get_post($connt, 'email');
					$phone     = get_post($connt, 'phone');
					$query    = "UPDATE INTO boardgames VALUES" .
					  "('$member_id', '$firstname', '$lastname', '$email', '$phone')";
					$result   = $connt->query($query);

					if (!$result) echo "UPDATE failed: $query<br>" .
					  $connt->error . "<br><br>";
				  }
					
  echo <<<_END
	<div class="col-9 col-m-9" id="form2">
		<form action="update.php" method="post" id="form2"><pre>			
    Member ID <input type="text" name="member_id" id="form2">
   First name <input type="text" name="firstname" id="form2">
    Last name <input type="text" name="lastname" id="form2">
Email address <input type="email" name="email" id="form2">
 Phone number <input type="tel" name="phone" id="form2">
<input type="submit" value="Update player">	
				
		</pre></form>
	</div>		
_END;

				  $query  = "SELECT * FROM boardgames";
				  $result = $connt->query($query);
				  if (!$result) die ("Database access failed: " . $connt->error);

				  $rows = $result->num_rows;
				  
				  for ($j = 0 ; $j < $rows ; ++$j)
				  {
					$result->data_seek($j);
					$row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <div class="col-9 col-m-9" id="form2">
	<pre>
Member id:     $row[0]
First name:    $row[1]
Last name:     $row[2]
Email address: $row[3]
Phone number:  $row[4]
	</pre>
  
  <form action="update.php" method="post" id="form2">
  <input type="hidden" name="delete" value="yes" id="form2">
  <input type="hidden" name="member_id" value="$row[0]" id="form2">
  <input type="submit" value="DELETE RECORD"></form>
  </div>
_END;
						  }
						  
						  $result->close();
						  $connt->close();
						  
						  function get_post($connt, $var)
						  {
							return $connt->real_escape_string($_POST[$var]);
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