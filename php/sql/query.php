<?php

if(isset($_POST["uname"])){
    $login = "SELECT * FROM users WHERE username LIKE '" . $_POST['uname'] . "'";
}

$airports = "SELECT icaoCode, iataCode, name, city, elevation, typeAirport FROM airports";



$listAirports = "SELECT icaoCode, name, city, count(*) as numRwy, typeAirport FROM airports INNER JOIN runways ON airports.IcaoCode = runways.IcaoCode";

if(isset($_POST["icaoCode"])){
    $deleteAirport = "DELETE FROM airports WHERE icaoCode = '" . $_POST['icaoCode'] . "'";
	$logoAirport = "SELECT icaoCode, iataCode, name, city, elevation, typeAirport FROM airports WHERE icaoCode = '" . $_POST['icaoCode'] . "'";
}

if(isset($_POST["airport"])){
	$runway = "SELECT runwayId, runways.icaoCode, priRwyDir, priRwyId, priRwyElv, secRwyDir, secRwyId, secRwyElv, numberRwy, typeAirport FROM airports INNER JOIN runways ON airports.IcaoCode = runways.IcaoCode WHERE airports.IcaoCode LIKE '" . $_POST['airport'] . "' ORDER BY runways.numberRwy";
    $lastReports = "SELECT * FROM lastreports WHERE icaoCode = '" . $_POST['airport'] . "' ORDER BY date LIMIT 48";
}

?>