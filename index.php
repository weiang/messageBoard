<?php 

echo '<form method="post", action="login.php">';
echo '<p align = "center">';
	echo 'User Name';
	echo '<input type="text" name="user" size="12"> <br>';
	echo 'Password';
	echo '<input type="text" name="password" size="12"> <br>';
echo '</p>';

echo '<p align = "center">';
	echo '<input type = "submit" name = "submit" value = "SignIn">';
	echo '<input type = "reset" name = "reset" value = "reset">';
	echo '<a href = "signup.html">SignUp</a>';
echo '</p>';	

echo "</form>"
?>