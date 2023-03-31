<?php
	include "connection_open.php";
	include "sql\query.php";
?>

	<form action="awos.php" method="POST">
		<div>
            <?php
                $result = $conn->query($airports);
                if ($result->num_rows > 0) {
					$i = 0;
                    while($row = $result->fetch_assoc()) {
            ?>			<div class="cardAirport d-flex" style="height:180px">
							<div class="w-15">
								<div class="w-100">&nbsp</div>
								<div class="" name="airport" value="<?php echo strtoupper($row["icaoCode"]) ?>">
									<span> <?php echo strtoupper($row["icaoCode"]) ?> </span>
									<br>
									<span> <?php echo ucfirst($row["city"] . " " . $row["name"]) ?> </span>
								</div>
								<div class="w-100">&nbsp</div>
								<div>
									<button name="airport" class="btnBlue" value="<?php echo strtoupper($row["icaoCode"]) ?>" width="100px" height="100px">
										<span class="text-center"> Seleziona </span>
									</button>
								</div>
								<div class="w-100">&nbsp</div>
							</div>
							<div class="w-40">
								<div class="w-100">&nbsp</div>
								<div>
									<?php
										if($row['typeAirport'] == 0){
											?> <div style="width:80px;" class="typeCiv text-center">Civil</div> <?php
										}else{
											?> <div style="width:80px;" class="typeMil text-center">Military</div> <?php
										}
									?>
								</div>
								<div class="w-100">&nbsp</div>
								<div>
									<?php
										if($row['atis'] == 0){
											?> <div class="atisOff text-center">ATIS</div> <?php
										}else{
											?> <div class="atisOn text-center">ATIS</div> <?php
										}
									?>
								</div>
								<div class="w-100">&nbsp</div>
							</div>
							<div class="w-5">&nbsp</div>
							<div class="w-40">
								<img src="..\images\airport\<?php echo $row["icaoCode"] ?>.jpg" class="w-100 h-100">
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