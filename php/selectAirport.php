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
            ?>			<div class="cardAirport">
							<div class="w-100 text-center"name="airport" value="<?php echo strtoupper($row["icaoCode"]) ?>">
								<span> <?php echo strtoupper($row["icaoCode"]) . " - " . $row["city"] ?> </span>
							</div>
							<div class="w-100">&nbsp</div>
							<div>
								<img class="w-100" src="..\images\airport\<?php echo $row["icaoCode"] ?>.jpg">
							</div>
							<div class="w-100">&nbsp</div>
							<div class="d-flex">
								<div class="w-30">&nbsp</div>
								<div class="w-40">
									<button name="airport" class="btnBlue" value="<?php echo strtoupper($row["icaoCode"]) ?>" width="100px" height="100px">
										<span class="text-center"> Seleziona </span>
									</button>
								</div>
								<div class="w-30">&nbsp</div>
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