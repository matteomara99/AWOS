<?php

	include 'connection_open.php';
	include 'query.php';
	
	$login_user = $_POST['uname'];
	$login_psw = $_POST['psw'];
	$login = $login ."'".$login_user."'";
	$today = date('Y-m-d');
	
	$result = $conn->query($login);		
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			
			if (strcmp($login_psw, $row["password"]) !== 1) {
				$update = $conn->query("UPDATE users SET lastlogin='$today' WHERE username = '$login_user'") or die(mysql_error());
				if($login_user = 'admin') {
					header('Location: admin.php');
				} else {
					header('Location: selectAirport.php');
				}
			}else{
				echo "psw errata";
			}
			
		}
	}
	
	include 'connection_close.php';
	
?>