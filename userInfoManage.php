<?php
include "./dbConfig.php";
echo "Manage your personal Information";
echo "<br /><hr /><br />";

$dbSucceed = false;
$dbConnected = mysql_connect($db['hostname'], $db['username'], $db['password']);
if ($dbConnected) {
	$dbSelected = mysql_select_db($db['database'], $dbConnected);
	if($dbSelected) {
		$dbSucceed = true;
	}
	else {
		echo "FAILed to select db!<br />";	
	}
}
else {
	echo "FAILed to connected to db server!";
	exit;	
}

if ($dbSucceed) {		
				$username = $_GET['username'];
				
				// echo "username: $username<br/ >";
				$query = 'SELECT * FROM ';
				$query .= $db['tableUserInfo'];
				$query .= ' WHERE ';
				$query .= 'userName = ';
				$query .= "'$username'";
				
//				echo $query.'<br />';
				
				if ($result = mysql_query("$query")) {
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					$email = $row['eMail'];
					$password = $row['password'];
					$birthday = $row['birthday'];
					$telephone = $row['telephone'];
					
					// Form a table
					echo '<form action = "userInfoUpdate.php" method = "post">';
					echo '<table>';
						echo '<tr>';
								echo '<td>User name</td>';
								echo '<td>';
									echo '<input type = "text" name = "username" value = '.$username.' /> <br />';
								echo '</td>'; 
						echo '</tr>';			
						
						echo '<tr>';				
								echo '<td>Password</td>';
								echo '<td>';
									echo '<input type = "text" name = "password" value = '.$password.' /> <br />';	
								echo '</td>';
						echo '</tr>';				
					
						echo '<tr>';			
								echo '<td>Email</td>';
								echo '<td>';				
									echo '<input type = "text" name = "email" value = '.$email.' /> <br />';
								echo '</td>';
						echo '</tr>';
						
						echo '<tr>';
						echo '<td>Birthday</td>';
						echo '<td>';
							echo '<input type = "text" name = "birthday" value = '.$birthday.' /> <br />';
						echo '</td>';
						echo '</tr>';
						
					echo '<tr>';
						echo '<td>Telephone</td>';
						echo '<td>';	
							echo '<input type = "text" name = "telephone" value = '.$telephone.' /> <br />';
						echo '</td>';
					echo '</tr>';
					
					echo '<tr>';
						echo '<td></td>';
						echo '<td align="right"><input type="submit"  value="Save" /></td>';
					echo '</tr>';
					
					echo '</table>';
					echo '</form>';
					}
				else {
					echo "FAILed to get ".$username."'s personal information!";	
					}
}



?>