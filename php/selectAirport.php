<?php
	include "connection_open.php";
	include "sql\query.php";
?>

	<form action="awos.php" method="POST">
		<div class="d-flex">
		<?php
			$result = $conn->query($airports);
			if ($result->num_rows > 0) {
				$i = 0;
				while($row = $result->fetch_assoc()) {
		?>
					<div class="cardAirport">
						<img src="..\images\airport\<?php echo $row["icaoCode"] ?>.jpg" width="100%" height="80%">
						<br>
						<div>
							<span class="text-center fw-bold"> <?php echo strtoupper($row["icaoCode"]) ?> </span>
							<br>
							<span class="text-center fw-bold"> <?php echo $row["city"] ?> </span>
						</div>
					</div>
		<?php
				}
			}
		?>
		</div>
	</form>
<?php
	include "connection_close.php";
?>