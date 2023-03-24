<?php
	include "connection_open.php";
	include "sql\query.php";
	include "..\class\windGenerator.cls.php";
?>	
	<!--background image-->
	<style>
		body{
			background-image: url("../images/realtimerwy.png");
			background-repeat: no-repeat, repeat;
			background-color: #cccccc;
			background-size: contain;
		}
		
		.vertical-center {
		  margin: 0;
		  position: absolute;
		  top: 50%;
		  -ms-transform: translateY(-50%);
		  transform: translateY(-50%);
		}
	</style>
	
	<script src="../js/app.js"></script>
		
	<?php ?>
	
	<body style="font-size:15px; width:auto;">
		<div>
			<!-- Menu principale -->
			<?php include "menuTopAwos.php"; ?>
			
			<div class="d-flex" style="height: calc(100vh - 90px)">
				<!-- Menu sinistra -->
				<?php include "menuLeftAwos.php"; ?>
				
				<!-- Menu schede -->
				<div class="border-2sw w-82">
					<div class="tabs" style="margin-top:0.5%; margin-left:0.5%">
						<?php include "tabs\metarData.php"; ?>
						<?php include "tabs\localReportData.php"; ?>
						<?php include "tabs\sensorsData.php"; ?>
						<?php include "tabs\plot.php"; ?>
						<?php include "tabs\actualTimeDataRwy.php"; ?>
						<?php include "tabs\lastReports.php"; ?>
						<?php include "tabs\settings.php"; ?>

					</div>
				</div>
				
			</div>
		</div>
		
<?php
	include "connection_close.php";
?>