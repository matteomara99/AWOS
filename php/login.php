<?php
	include "connection_open.php";
	include "sql\query.php";
?>

	<form action="login_check.php" method="post">
		<div class="h-25">&nbsp</div>
		<div class="div-center h-50 cardLogin">
			<div class="w-100">&nbsp</div>
			<div class="d-flex w-100">	
				<div class="w-30">&nbsp</div>
				<div class="w-40" style="margin: auto;">
					<img class="w-100" src="https://cdn-web.enav.it//content/2021-04/Group_0.svg">
				</div>
				<div class="w-30">&nbsp</div>
			</div>
			<div class="w-100">&nbsp</div>
			<div class="container text-center">
				<input type="text" placeholder="Username" name="username" required>
				<div class="w-100">&nbsp</div>
				<input type="password" placeholder="Password" name="psw" required>
				<div class="w-100">&nbsp</div>
				<button class="btnBlue fs-15 w-30" type="submit">Login</button>
			</div>
			<div class="w-100">&nbsp</div>
		</div>
		<div class="h-25">&nbsp</div>
		<div class="div-bottom w-100 text-blue text-right fw-bold fs-10p">COPYRIGHT @ 2023</div>
	</form>

<?php
	include "connection_close.php";
?>