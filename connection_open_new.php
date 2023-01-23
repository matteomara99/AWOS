<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="https://cdn-web.enav.it//content/favicon.ico" type="image/vnd.microsoft.icon">
		<link rel="stylesheet" href="../css/style.css">
		<title>TechnoSky AWOS</title>
	</head>
	
	<?php

		$servername="localhost";
		$username="root";
		$password="";
		$dbname="awos";


		$conn=new mysqli($servername,$username,$password,$dbname);

		if($conn->connect_error){
			die("connection error".$conn->connect_error);
		}else{
            /* connesso */
		}

	?>
	
	<body>