<?php 
include './dbConfig.php';

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

if($dbSucceed) {
	
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$birthday = $_POST['birthday'];
	$telephone = $_POST['telephone'];
	
	$update = "UPDATE ".$db['tableUserInfo']." SET ";
	$update .= "userName = '".$username."', ";
	$update .= "password = '".$password."', ";
	$update .= "eMail = '".$email."', ";
	$update .= "birthday = '".$birthday."', ";
	$update .= "telephone = '".$telephone."' ";
	$update .= "WHERE userName = '".$username."' "; 
	
	echo $update.'<br />';
	
	$result = mysql_query($update);
	if($result) {
		// go back to user's personal page --> user.php
		}
	else {
		echo "Update FAILed!<br />";		
		}
	}

?>