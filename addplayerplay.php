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
					<li><a href="admin.php">Admin</a></li>
					<li><a href="addplayers.php">Add/Delete players</a></li>				
					<li><a href="editplayer.php">List/Edit players</a></li>	
					<li><a href="events.php">Edit calender</a></li>
					<li><a href="playerplay.php">Games played</a></li>
					<li><a class="active" href="addplayerplay.php">Add/Delete games played</a></li>
				</ul>
			</div>
			
			<div class="col-9 col-m-9" style="overflow-x:auto;">					
				<?php // connect to database
				  require_once 'config.php';
				  $connt = new mysqli($db_hostname, $db_username, $db_password, $db_name);
				  if ($connt->connect_error) die($connt->connect_error);
					// delete from database
				  if (isset($_POST['delete']) && isset($_POST['member_id']))
				  {
					$member_id = get_post($connt, 'member_id');
					$query  = "DELETE FROM gamesplay WHERE member_id='$member_id', firstname='$firstname', lastname='$lastname', 
					chkMonopoly='$chkMonopoly', chkCluedo='$chkCluedo', chkConnectFour='$chkConnectFour', 
					chkOperation='$chkOperation', chkBattleship='$chkBattleship', chkScrabble='$chkScrabble'";
					$result = $connt->query($query);
					if (!$result) echo "DELETE failed: $query<br>" .
					  $connt->error . "<br><br>";
				  }
					// get data from database
				  if (isset($_POST['member_id'])		&&
					  isset($_POST['firstname'])		&&
					  isset($_POST['lastname'])			&&
					  isset($_POST['chkMonopoly'])		&&
					  isset($_POST['chkCluedo'])		&&
					  isset($_POST['chkConnectFour'])	&&
					  isset($_POST['chkOperation'])    &&
					  isset($_POST['chkBattleship'])	&&
					  isset($_POST['chkScrabble']))
				  {
					$member_id		= get_post($connt, 'member_id');
					$firstname		= get_post($connt, 'firstname');
					$lastname		= get_post($connt, 'lastname');
					$chkMonopoly    = get_post($connt, 'chkMonopoly');
					$chkCluedo		= get_post($connt, 'chkCluedo');
					$chkConnectFour	= get_post($connt, 'chkConnectFour');
					$chkOperation	= get_post($connt, 'chkOperation');
					$chkBattleship  = get_post($connt, 'chkBattleship');
					$chkScrabble    = get_post($connt, 'chkScrabble');
					$query    = "INSERT INTO boardgames VALUES" . "('$member_id', '$firstname', 
					'$lastname', '$chkMonopoly', '$chkCluedo', '$chkConnectFour', '$chkOperation', 
					'$chkBattleship', '$chkScrabble')";
					$result   = $connt->query($query);

					if (!$result) echo "INSERT failed: $query<br>" .
					  $connt->error . "<br><br>";
 				  }	
 // add players boardgames played
 echo <<<_END
	<div class="col-9 col-m-9" id="form2">
		<form action="addplayerplay.php" method="post" id="form2"><pre>			
   Member ID <input type="text" name="member_id" id="form2">
  First name <input type="text" name="firstname" id="form2">
   Last name <input type="text" name="lastname" id="form2">
    Monopoly <input type="text" name="chkMonopoly" id="form2">
      Cluedo <input type="text" name="chkCluedo" id="form2">
Connect Four <input type="text" name="chkConnectFour" id="form2">
   Operation <input type="text" name="chkOperation" id="form2">
  Battleship <input type="text" name="chkBattleship" id="form2">
    Scrabble <input type="text" name="chkScrabble" id="form2">
             <input type="submit" value="Add player">	
				
		</pre></form>
	</div>		
_END;
				 
				  $query  = "SELECT * FROM gamesplay";
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
Monopoly:      $row[3]
Cluedo:        $row[4]
Connect Four:  $row[5]
Operation:     $row[6]
Battleship:    $row[7]
Scrabble:      $row[8]
	</pre>  
  <form action="addplayerplay.php" method="post" id="form2">
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
		

	</body>
</html>