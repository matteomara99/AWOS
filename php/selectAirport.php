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
						<button name="airport" value="<?php echo strtoupper($row["icaoCode"]) ?>" width="100px" height="100px">
							<span class="text-center"> <?php echo strtoupper($row["icaoCode"]) ?> </span>
							<!-- <img src="..\images\<?php echo $row["icaoCode"] ?>.jpg"> -->
						</button>

						<div name="airport" value="<?php echo strtoupper($row["icaoCode"]) ?>">
							<span class="text-center"> <?php echo strtoupper($row["icaoCode"]) . " - " . $row["city"] . "/" . $row["name"] ?> </span>
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