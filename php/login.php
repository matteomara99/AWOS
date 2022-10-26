<?php

	include 'connection_open.php';
	include 'sql\query.php';
	
?>

	<form action="login_check.php" method="post">

		<div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="uname" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<button type="submit">Login</button>
		</div>
		
	</form>

<?php

	include 'connection_close.php';
	
?>