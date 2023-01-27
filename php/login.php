<?php

	include "connection_open.php";
	include "sql\query.php";
	
?>

	<form action="login_check.php" method="post">

		<div>
			<div>
				<img src="https://cdn-web.enav.it//content/2021-04/Group_0.svg" width="300px">
			</div>
			<div class="container">
				<label for="username"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>

				<button type="submit">Login</button>
			</div>
		</div>
		
	</form>

<?php

	include "connection_close.php";
	
?>