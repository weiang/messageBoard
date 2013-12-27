<?php

{ 		//	Secure Connection Script
		
		include "./dbConfig.php";
		$dbSuccess = false;
		$dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db($db['database'],$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} else {
				echo "DB Selection FAILed";
			}
		} else {
				echo "MySQL Connection FAILed";
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$birthday = $_POST['birthday'];
	$telephone = $_POST['telephone'];

	$query = 'SELECT ';
	$query .= 'userName, eMail ';
	$query .= 'FROM ';
	$query .= $db['tableUserInfo'].' ';
//	$query .= ' WHERE ';
//	$query .= 'userName = $username ';
//	$query .= 'or eMail = $email ';

	echo "$query <br>";

	$result = mysql_query($query);

	$alreadyExist = false;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		if ($row['userName'] == $username) {
			$alreadyExist = true;
			echo "$username has already signed up!";
			break;
		}
		if ($row['eMail'] == $email) {
			$alreadyExist = true;
			echo "$email has already been used to signed up!";
			break;
		}
	}
	mysql_free_result($result);	
	if ($alreadyExist == false) {
		$query = "INSERT INTO ";
		$query .= $db['tableUserInfo'];
		$query .= '(';
	//	$query .= "\"userName\", \"password\", \"eMail\", \"birthday\", \"telephone\" ";
		$query .= 'userName, password, eMail, birthday, telephone';
		$query .= ')';
		$query .= "VALUES";
		$query .= '(';
		$query .= "\"$username\", \"$password\", \"$email\", \"$birthday\", \"$telephone\"";
	//	$query .= "$username, $password, $email, $birthday, $telephone ";
		$query .= ')';

	//	$query = "INSERT INTO userInfo (userName, password, eMail, birthday, telephone)VALUES(\"$username\", \"$password\", \"$email\", \"$birthday\", \"$telephone\")";
		echo $query.'<br>';
		$result = mysql_query($query); 
		echo "Sing Up SUCCEED!";	
	//	mysql_free_result($result);
	}
	else {
		echo "Sign Up FAILed!";
	}
}
?>