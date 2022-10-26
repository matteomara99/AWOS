<?php
	include 'connection_open.php';
	include 'query.php';
?>	
	<!--background image-->
	<style>
		body{
			background-image: url('../images/realtimerwy.png');
			background-repeat: no-repeat, repeat;
			background-color: #cccccc;
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
	
	<body style='font-size:15px;'>
		<div>
			<!-- Menu principale -->
			<?php include 'menuTopAwos.php'; ?>
			
			<div class='d-flex' style='height:535px;'>
				<!-- Menu sinistra -->
				<?php include 'menuLeftAwos.php'; ?>
				
				<!-- Menu schede -->
				<div style='border:2px solid white; width:82%;'>
					<div class='tabs' style='margin-top:0.5%; margin-left:0.5%'>

						<?php include 'metarData.php'; ?>
						<?php include 'localReportData.php'; ?>
						<?php include 'sensorsData.php'; ?>
						<?php include 'plot.php'; ?>
						<?php include 'realTimeDataRwy.php'; ?>
						<?php include 'lastReports.php'; ?>
						<?php include 'settings.php'; ?>

					</div>
				</div>
				
			</div>
		</div>
		
<?php
	include 'connection_close.php';
?>