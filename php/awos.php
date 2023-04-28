<?php
	include "connection_open.php";
	include "sql\query.php";
	include "..\class\windGenerator.cls.php";

	$result = $conn->query($runway);
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
			$icaoCode = $row['icaoCode'];
			$priRwyDir = $row['priRwyDir'];
			$priRwyId = $row['priRwyId'];
			$priRwyElv = $row['priRwyElv'];
			$secRwyDir = $row['secRwyDir'];
			$secRwyId = $row['secRwyId'];
			$secRwyElv = $row['secRwyElv'];
			$numberRwy = $row['numberRwy'];
            $rvrRwyPri = $row['rvrRwyPri'];
			$rvrRwyCen = $row['rvrRwyCen'];
			$rvrRwySec = $row['rvrRwySec'];
			$windPriRwy = $row['windPriRwy'];
			$windSecRwy = $row['windSecRwy'];
        }
    }

	$result = $conn->query($airports);
    if ($result->num_rows > 0) {
        $i = 0;
        while($row = $result->fetch_assoc()) {
			$atis = $row['atis'];
        }
    }
?>	
	<!--background image-->
	<style>
		.vertical-center {
			margin: 0;
			position: absolute;
			top: 50%;
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);
		}

		body{
			font-size:15px;
			width:auto;
			background-color: rgb(130, 155, 180);
		}
	</style>
	
	<script src="../js/app.js"></script>
	<script> let occupied = 0; </script>

	<div>
		<!-- Menu principale -->
		<?php include "menuTopAwos.php"; ?>
		
		<!-- 100% meno altezza menuTop -->
		<div class="d-flex" style="height: calc(100vh - 90px)">
			<!-- Menu sinistra -->
			<?php include "menuLeftAwos.php"; ?>
			
			<!-- Menu schede -->
			<div class="border-2sw w-82">
				<div class="tabs" style="margin:0.5%;">
					<?php include "tabs\metarData.php"; ?>
					<!--
					<?php include "tabs\localReportData.php"; ?>
					<?php include "tabs\sensorsData.php"; ?>
					<?php include "tabs\plot.php"; ?>
					<?php include "tabs\actualTimeDataRwy.php"; ?>
					-->
					<?php include "tabs\lastReports.php"; ?>
					<?php include "tabs\settings.php"; ?>
				</div>
			</div>
		</div>
	</div>
<?php
	include "connection_close.php";
?>