<?php
	include "connection_open.php";
	include "sql\query.php";
?>

    <body>
        <form action="awos.php" method="POST">
			<div class="d-flex">
            <?php
                $result = $conn->query($airports);
                if ($result->num_rows > 0) {
					$i = 0;
                    while($row = $result->fetch_assoc()) {
            ?>
						<div>
							<div>
								<?php echo strtoupper($row['IcaoCode']) ?>
							</div>
							<div>
								<img src="..\images\<?php echo $row['icaoCode'] ?>.jpg">
							</div>
						</div>
			<?php
					}
                }
            ?>
			</div>
        </form>
    </body>

<?php
	include 'connection_close.php';
?>