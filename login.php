<?php 

include "./dbConfig.php";
$dbSuccess = false;
$dbConnected = mysql_connect($db['hostname'], $db['username'], $db['password']);

if ($dbConnected) {
	$dbSelected = mysql_select_db($db['database'], $dbConnected);	
	if ($dbSelected) {
		$dbSuccess = true;
	}
	else {
		echo "DB Selection FAILed";
	}
}	
else {
	echo "MySQL Connection FAILed";
}

if ($dbSuccess){
	$userName = $_POST['user'];
	$password = $_POST['password'];

	$query = "SELECT ";
	$query .= "userName, password ";
	$query .= "FROM ";
	$query .= "userInfo ";
	$query .= " WHERE ";
	$query .= " userName = '$userName'";
	
//	echo $query;
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	if ($num == 0) {
			echo $userName.' has not register yet!';			
		}
	else {
		if ($num >= 2) {
			echo $userName.'has multiple records!';
		}
		else {
			// Form user 
		echo 'Login succeed!';		
		echo "Welcome to messageBoard!<br>";
		echo "<a href = 'addMessage.php'>Add Message</a> <br>";
		echo "<a href = 'removeMessage.php'>Remove Message</a> <br>";
		echo "<a href = 'modifyMessage.php'>Modify Message</a> <br>";
		echo "<a href = "."userInfoManage.php?username=$userName ".">Setting</a> <br>";

		}
	}
	mysql_free_result($result);
}
?>