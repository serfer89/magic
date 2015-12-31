<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
	<meta http-equiv="refresh" content="3; url=http://magicdecor.com.ua/admin.php" />

    <title>Админка</title>
<?php
include 'config.php';

	$login=mysqli_escape_string($mysqli, $_POST['login']);
	$sql="SELECT `login`, `pass` FROM `users` WHERE `login` LIKE '".$login."' ";
			$result=$mysqli->query($sql);


				if ($result->num_rows > 0) {
    // output data of each row
   		 while($row = $result->fetch_assoc()) {
		$login_bd=$row['login'];
		$pass_bd=$row['pass'];

		}//while

				if($login==$login_bd and md5($_POST['pass'])==$pass_bd)
		
		
		{
			session_start();
			$_SESSION['login']=$login;
			$mysqli->close();
			header("Location:/admin.php");
	}
	else {		echo "Неверная пара логин/пароль!";}
			}
else 
{
    echo "Неверная пара логин/пароль!";
	$mysqli->close();
}

?>
