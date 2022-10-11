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
		
	<?php ?>
	
	<body style='font-size:15px;'>
		<div>
			<!-- Menu principale -->
			<div class='d-flex fw-bold bg-white' style='height:20px; width:100%; font-size:15px; padding-left:5px;'>AWOS MET Client</div>
			<div class='d-flex bg-white' style='height:20px; width:100%; font-size:10px;'>
				<div class='text-center' style='height:15px; width:35px;'>Login</div>
				<div class='text-center' style='height:15px; width:35px;'>Alarms</div>
				<div class='text-center' style='height:15px; width:35px;'>Sound</div>
				<div class='text-center' style='height:15px; width:35px;'>Help</div>
				<div class='text-center' style='height:15px; width:35px;'>Lifts</div>
				<div class='text-center' style='height:15px; width:35px;'>Exit</div>
			</div>
			
			<div style='height:50px; width:100%;' class='d-flex bg-white'>
				<div style='width:20%;'><img src='../images/load.gif' style='height:50px;'><img src='https://cdn-web.enav.it//content/2021-04/Group_0.svg' style='height:35px; margin:5px;'></div>
				<div class='fw-bold text-center' style='width:22%; font-size:20px; padding:10px;'>AWOS MET - <?php echo $_GET['icao'] ?></div>
				<div class='d-flex text-center' style='width:30%;'>
						<div style='width:17%;'>
						</div>
						<div style='width:25%;'>
							<div style='border:1px solid black; height:80%; margin:5%;'>Tec. Alarms</div>
						</div>
						<div style='width:16%;'>
						</div>
						<div style='width:25%;'>
							<div style='border:1px solid black; height:80%; margin:5%;'>Met. Alarms</div>
						</div>
						<div style='width:17%;'>
						</div>
					</div>
			</div>
			<!-- Menu principale -->
			
			<!-- Menu sinistra -->
			<div class='d-flex' style='height:535px;'>
				<div style='border:2px solid white; width:18%;'>
					<!-- Date -->
					<div class='border-white' style='width:90%; margin:5%;'>
						<div class='text-center fw-bold text-white' style='font-size:25px;'>
							<?php echo date("j-M-Y") ?>
						</div>
					</div>
					<!-- Hour -->
					<div class='border-white' style='width:90%; margin:5%;'>
						<div id="divTime" class='text-center fw-bold text-white' onload="time()" style='font-size:25px;'>
							<script src="../js/app.js"></script>
						</div>
					</div>
					<!-- Metar -->
					<div class='' style='width:90%; margin:5%; margin-top:10%;'>
						<div class='d-flex'>
							<button class='button bg-blue'>METAR</button>
							<div class='text-center border-white text-white fw-bold' style='margin-left:5%; width:32%;'>18' 10''</div>
							<div class='bg-blue' style='margin-left:5%; width:13%; border-radius:20px;'></div>
						</div>
					</div>
					<!-- Speci -->
					<div class='' style='width:90%; margin:5%; margin-top:10%;'>
						<div class='d-flex'>
							<button class='button bg-grey'>SPECI</button>
							<button class='button bg-blue' style='margin-left:5%;'>RETRJCOR</button>
						</div>
					</div>
					<!-- Metreport -->
					<div class='' style='width:90%; margin:5%; margin-top:5%;'>
						<div class='d-flex'>
							<button class='button bg-blue'>METREPORT</button>
							<div class='text-center border-white text-white fw-bold' style='margin-left:5%; width:32%;'>18' 10''</div>
							<div class='bg-blue' style='margin-left:5%; width:13%; border-radius:20px;'></div>
						</div>
					</div>
					<!-- Special -->
					<div class='' style='width:90%; margin:5%; margin-top:10%;'>
						<div class='d-flex'>
							<button class='button bg-grey'>SPECIAL</button>
							<button class='button bg-blue' style='margin-left:5%;'>RETRANSMIT</button>
						</div>
					</div>
					<!-- Synop -->
					<div class='' style='width:90%; margin:5%; margin-top:5%;'>
						<div class='d-flex'>
							<button class='button bg-blue'>SYNOP</button>
							<div class='text-center border-white text-white fw-bold' style='margin-left:5%; width:32%;'>AUTO</div>
							<div class='bg-blue text-center text-white fw-bold' style='margin-left:5%; width:13%; border-radius:20px;'>A</div>
						</div>
					</div>
					<!-- Syrep -->
					<div class='' style='width:90%; margin:5%; margin-top:5%;'>
						<div class='d-flex'>
							<button class='button bg-blue'>SYREP</button>
							<div class='text-center border-white text-white fw-bold' style='margin-left:5%; width:32%;'>AUTO</div>
							<div class='bg-blue text-center text-white fw-bold' style='margin-left:5%; width:13%; border-radius:20px;'>A</div>
						</div>
					</div>
					<!-- Qnh -->
					<div class='' style='width:90%; margin:5%; margin-top:5%;'>
						<div class='d-flex'>
							<button class='button bg-blue'>QNH</button>
							<div class='text-center border-white text-white fw-bold' style='margin-left:5%; width:32%;'>AUTO</div>
							<div class='bg-blue text-center text-white fw-bold' style='margin-left:5%; width:13%; border-radius:20px;'>A</div>
						</div>
					</div>
					<!-- Ta -->
					<div class='' style='width:90%; margin:5%; margin-top:5%;'>
						<div class='d-flex'>
							<button class='button bg-blue'>TA</button>
							<div class='text-center border-white text-white fw-bold' style='margin-left:5%; width:32%;'>AUTO</div>
							<div class='bg-blue text-center text-white fw-bold' style='margin-left:5%; width:13%; border-radius:20px;'>A</div>
						</div>
					</div>
					<!-- Pre -->
					<div class='' style='width:90%; margin:5%; margin-top:5%;'>
						<div class='d-flex'>
							<button class='button bg-blue'>PRE</button>
							<div class='text-center border-white text-white fw-bold' style='margin-left:5%; width:32%;'>AUTO</div>
							<div class='bg-blue text-center text-white fw-bold' style='margin-left:5%; width:13%; border-radius:20px;'>A</div>
						</div>
					</div>
				</div>
				<!-- Menu sinistra -->
				
				<!-- Menu schede -->
				<div style='border:2px solid white; width:82%;'>
					<div class='tabs' style='margin-top:0.5%; margin-left:0.5%'>
						<input type='radio' name='tabs' id='tabMetarData' checked='checked'>
						<label for='tabMetarData'>Metar Data</label>
						<div class='tab'>
							<h1>prova</h1>
						</div>
						<input type='radio' name='tabs' id='tabLocalReportData'>
						<label for='tabLocalReportData'>Local Report Data</label>
						<div class='tab'>
							<h1>prova2</h1>
						</div>
						<input type='radio' name='tabs' id='tabSensorsData'>
						<label for='tabSensorsData'>Sensors Data</label>
						<div class='tab'>
							<h1>prova3</h1>
						</div>
						<input type='radio' name='tabs' id='tabRealTimeDataRWY'>
						<label for='tabRealTimeDataRWY'>Real Time Data RWY
							<?php
								$result = $conn->query($runway);
								if ($result->num_rows > 0) {
									$i = 0;
									while($row = $result->fetch_assoc()) {
										echo $row['RunwayIdentifier'];
										if($i == 0){
											echo " / ";
											$i++;
										}											
									}
								}
							?>
						</label>
						<div class='tab'>
							<h1>prova4</h1>
						</div>
						<input type='radio' name='tabs' id='tabPlot'>
						<label for='tabPlot'>Plot</label>
						<div class='tab'>
							<h1>prova5</h1>
						</div>
						<input type='radio' name='tabs' id='tabLastReports'>
						<label for='tabLastReports'>Last Reports</label>
						<div class='tab'>
							<h1>prova6</h1>
						</div>
						<input type='radio' name='tabs' id='tabSettings'>
						<label for='tabSettings'>Settings</label>
						<div class='tab'>
							<h1>prova7</h1>
						</div>
					</div>
				</div>
				<!-- Menu schede -->
				
			</div>
		</div>
		
<?php
	include 'connection_close.php';
?>